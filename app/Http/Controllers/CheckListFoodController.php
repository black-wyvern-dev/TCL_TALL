<?php

namespace App\Http\Controllers;

use App\Models\Hire;
use App\Models\Tanker;
use App\Models\CheckListFood;
use App\Http\Requests\CheckListFoodStoreRequest;
use App\Http\Requests\CheckListFoodUpdateRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Datetime;
use Illuminate\Http\Request;
use Response;

class CheckListFoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', CheckListFood::class);

        $search = $request->get('search', '');

        $checkListFoods = CheckListFood::search($search)
            ->latest()
            ->paginate(20);

        return view(
            'app.check_list_foods.index',
            compact('checkListFoods', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', CheckListFood::class);
        $hire_id = $request->hire_id;
        $hire = Hire::find($hire_id);
        $check_type = $request->check_list_type;
        session(['hire_id' => $hire_id]);
        session(['check_type' => $check_type]);
        return view('app.check_list_foods.create', compact('hire', 'check_type'));
    }

    public function validateCheckboxes($request, $validated) {
        $validated['cladding_panels'] = isset($request->cladding_panels) ? $request->cladding_panels == 'on' ? true : false : false;
        $validated['ladder_handrail'] = isset($request->ladder_handrail) ? $request->ladder_handrail == 'on' ? true : false : false;
        $validated['side_guards'] = isset($request->side_guards) ? $request->side_guards == 'on' ? true : false : false;
        $validated['rear_bumper'] = isset($request->rear_bumper) ? $request->rear_bumper == 'on' ? true : false : false;
        $validated['wings_stays'] = isset($request->wings_stays) ? $request->wings_stays == 'on' ? true : false : false;
        $validated['dipstick'] = isset($request->dipstick) ? $request->dipstick == 'on' ? true : false : false;
        $validated['lights'] = isset($request->lights) ? $request->lights == 'on' ? true : false : false;
        $validated['chassis'] = isset($request->chassis) ? $request->chassis == 'on' ? true : false : false;
        $validated['valve_operation'] = isset($request->valve_operation) ? $request->valve_operation == 'on' ? true : false : false;
        $validated['compartment_internal'] = isset($request->compartment_internal) ? $request->compartment_internal == 'on' ? true : false : false;
        $validated['landingLegs_operation'] = isset($request->landingLegs_operation) ? $request->landingLegs_operation == 'on' ? true : false : false;
        $validated['dischargePump_operation'] = isset($request->dischargePump_operation) ? $request->dischargePump_operation == 'on' ? true : false : false;

        $validated['cleaning_check'] = isset($request->cleaning_check) ? $request->cleaning_check == 'on' ? true : false : false;
        return $validated;
    }

    public function sendMail($checkList) {
        $details = [
            'hirer_name' => $checkList->hirer_name,
            'link_url' => route('checklist_food_link', ['uuid' => $checkList->uuid])
        ];
        $email_address = $checkList->hire->company->email;
        \Mail::to($email_address)->send(new \App\Mail\SendCheckListNrMail($details));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckListFoodStoreRequest $request)
    {
        $this->authorize('create', CheckListFood::class);
        $validated = $request->validated();

        $validated = $this->validateCheckboxes($request, $validated);
        $validated['uuid'] = Str::uuid();
        $validated['hire_id'] = session('hire_id');

        
        if($request->hasFile('cleaning_status')) {            
            $image = $request->file('cleaning_status');            
            $date = new DateTime();
            $new_image_name = $date->getTimestamp();                                    
            $file_name = $new_image_name.'.'.$image->guessExtension();                        
            $path = $image->storeAs(
                'public/uploads/cleaning_status', $file_name
            );                
            $url = 'uploads/cleaning_status/'.$file_name;            
            $validated['cleaning_status'] = $url;
        }

        $checkListFood = CheckListFood::create($validated);
        $checkListFood->supervisor_signature = $request->supervisor_signature;
        $checkListFood->save();
        $hire = null;
        if($request->hirer_signature != "/img/sign.png" && $request->tcl_signature != "/img/sign.png" ) {
            $checkListFood->status = "signed";
            $checkListFood->update($validated);
            $hire = Hire::find($checkListFood->hire_id);
            if($checkListFood->checklist_type == "On") {
                $hire->status = "onHire";
            }
            if($checkListFood->checklist_type == "Off") {
                $hire->status = "offHire";
                
                $tanker = Tanker::find($hire->tanker_id);
                $tanker->usage = false;
                $tanker->save();
            }
            $hire->save();                    
            
            $this->sendMail($checkListFood);

            return redirect()->route('hires.index')->withSuccess(__('crud.common.created'));
        }
        
        if(!$hire)
        {
            $hire_id = session('hire_id');
            $hire = Hire::find($hire_id);
        }
        $tanker = $hire->tanker;
        $tanker->ext_splat_left = $request->ext_splat_left;
        $tanker->ext_splat_front = $request->ext_splat_front;
        $tanker->ext_splat_rear = $request->ext_splat_rear;
        $tanker->ext_splat_right = $request->ext_splat_right;
        $tanker->int_splat = $request->int_splat;
        $tanker->save();

        return redirect()
        ->route('check-list-foods.edit', $checkListFood)
        ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CheckListFood $checkListFood)
    {
        $this->authorize('view', $checkListFood);

        return view('app.check_list_foods.show', compact('checkListFood'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $checkListFood = CheckListFood::find($id);
        $this->authorize('update', $checkListFood);
        $hires = Hire::pluck('start_date', 'id');
                
        $check_type = $checkListFood->checklist_type;        
        $hire = $checkListFood->hire;
        return view(
            'app.check_list_foods.edit',
            compact('checkListFood', 'hire', 'check_type')
        ); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(
        CheckListFoodUpdateRequest $request,
        $id
    ) {    
        $checkListFood = CheckListFood::find($id);
        $this->authorize('update', $checkListFood);
        $checkListFood->supervisor_signature = $request->supervisor_signature;
        $checkListFood->save();
        $validated = $request->validated();
        $validated = $this->validateCheckboxes($request, $validated);


        if($request->hasFile('cleaning_status')) {
            if($checkListFood->cleaning_status != '') {
                $file = 'public/' . $checkListFood->cleaning_status;
                if(Storage::exists($file)) {                    
                        Storage::delete($file);                    
                }
            }
            $image = $request->file('cleaning_status');            
            $date = new DateTime();
            $new_image_name = $date->getTimestamp();                                    
            $file_name = $new_image_name.'.'.$image->guessExtension();                        
            $path = $image->storeAs(
                'public/uploads/cleaning_status', $file_name
            );                
            $url = 'uploads/cleaning_status/'.$file_name;            
            $validated['cleaning_status'] = $url;
        } 

        
        $hire = Hire::find($checkListFood->hire_id);              
        if($request->hirer_signature != "/img/sign.png" && $request->tcl_signature != "/img/sign.png" ) {
            $checkListFood->status = "signed";
            $checkListFood->update($validated);                        
            if($checkListFood->checklist_type == "On" && $hire->status == 'signed') {
                $hire->status = "onHire";
            }
            if($checkListFood->checklist_type == "Off") {
                $hire->status = "offHire";

                $tanker = Tanker::find($hire->tanker_id);
                $tanker->usage = false;
                $tanker->save();
            }            
            $hire->save();
            $this->sendMail($checkListFood);
            return redirect()->route('hires.index')->withSuccess(__('crud.common.created'));
        }
        $checkListFood->update($validated);  
        
        $tanker = $hire->tanker;
        $tanker->ext_splat_left = $request->ext_splat_left;
        $tanker->ext_splat_front = $request->ext_splat_front;
        $tanker->ext_splat_rear = $request->ext_splat_rear;
        $tanker->ext_splat_right = $request->ext_splat_right;
        $tanker->int_splat = $request->int_splat;
        $tanker->save();
        
        return redirect()
            ->route('check-list-foods.edit', $checkListFood)
            ->withSuccess(__('crud.common.saved')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, CheckListFood $checkListFood)
    {
        $this->authorize('delete', $checkListFood);

        $checkListFood->delete();

        return redirect()
            ->route('check-list-foods.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
