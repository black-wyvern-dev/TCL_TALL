<?php

namespace App\Http\Controllers;

use App\Models\Hire;
use App\Models\Tanker;
use App\Models\CheckListPetrol;
use App\Http\Requests\CheckListPetrolStoreRequest;
use App\Http\Requests\CheckListPetrolUpdateRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Datetime;
use Illuminate\Http\Request;
use Response;

class CheckListPetrolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', CheckListPetrol::class);

        $search = $request->get('search', '');

        $checkListPetrols = CheckListPetrol::search($search)
            ->latest()
            ->paginate(20);

        return view(
            'app.check_list_petrols.index',
            compact('checkListPetrols', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', CheckListPetrol::class);
        $hire_id = $request->hire_id;
        $hire = Hire::find($hire_id);
        $check_type = $request->check_list_type;
        session(['hire_id' => $hire_id]);
        session(['check_type' => $check_type]);
        return view('app.check_list_petrols.create', compact('hire', 'check_type'));
    }

    public function validateCheckboxes($request, $validated) {
        $validated['cladding_panels'] = isset($request->cladding_panels) ? $request->cladding_panels == 'on' ? true : false : false;
        $validated['ladder_handrail'] = isset($request->ladder_handrail) ? $request->ladder_handrail == 'on' ? true : false : false;
        $validated['side_guards'] = isset($request->side_guards) ? $request->side_guards == 'on' ? true : false : false;
        $validated['rear_bumper'] = isset($request->rear_bumper) ? $request->rear_bumper == 'on' ? true : false : false;
        $validated['wings_stays'] = isset($request->wings_stays) ? $request->wings_stays == 'on' ? true : false : false;
        $validated['dipstick'] = isset($request->dipstick) ? $request->dipstick == 'on' ? true : false : false;
        $validated['lights'] = isset($request->lights) ? $request->lights == 'on' ? true : false : false;
        $validated['fire_extinguisher'] = isset($request->fire_extinguisher) ? $request->fire_extinguisher == 'on' ? true : false : false;
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
            'link_url' => route('checklist_petrol_link', ['uuid' => $checkList->uuid])
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
    public function store(CheckListPetrolStoreRequest $request)
    {
        $this->authorize('create', CheckListPetrol::class);
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

        $checkListPetrol = CheckListPetrol::create($validated);
        $checkListPetrol->supervisor_signature = $request->supervisor_signature;
        $checkListPetrol->save();
        $hire = null;
        if($request->hirer_signature != "/img/sign.png" && $request->tcl_signature != "/img/sign.png" ) {
            $checkListPetrol->status = "signed";
            $checkListPetrol->update($validated);
            $hire = Hire::find($checkListPetrol->hire_id);
            if($checkListPetrol->checklist_type == "On") {
                $hire->status = "onHire";
            }
            if($checkListPetrol->checklist_type == "Off") {
                $hire->status = "offHire";
                
                $tanker = Tanker::find($hire->tanker_id);
                $tanker->usage = false;
                $tanker->save();
            }
            $hire->save();                    
            
            $this->sendMail($checkListPetrol);

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
        ->route('check-list-petrols.edit', $checkListPetrol)
        ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CheckListPetrol $checkListPetrol)
    {
        $this->authorize('view', $checkListPetrol);

        return view('app.check_list_petrols.show', compact('checkListPetrol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $checkListPetrol = CheckListPetrol::find($id);
        $this->authorize('update', $checkListPetrol);
        $hires = Hire::pluck('start_date', 'id');
                
        $check_type = $checkListPetrol->checklist_type;        
        $hire = $checkListPetrol->hire;
        return view(
            'app.check_list_petrols.edit',
            compact('checkListPetrol', 'hire', 'check_type')
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
        CheckListPetrolUpdateRequest $request,
        $id
    ) { 
        $checkListPetrol = CheckListPetrol::find($id);
        $this->authorize('update', $checkListPetrol);
        $checkListPetrol->supervisor_signature = $request->supervisor_signature;
        $checkListPetrol->save();
        $validated = $request->validated();
        $validated = $this->validateCheckboxes($request, $validated);


        if($request->hasFile('cleaning_status')) {
            if($checkListPetrol->cleaning_status != '') {
                $file = 'public/' . $checkListPetrol->cleaning_status;
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

        
        $hire = Hire::find($checkListPetrol->hire_id);              
        if($request->hirer_signature != "/img/sign.png" && $request->tcl_signature != "/img/sign.png" ) {
            $checkListPetrol->status = "signed";
            $checkListPetrol->update($validated);                        
            if($checkListPetrol->checklist_type == "On" && $hire->status == 'signed') {
                $hire->status = "onHire";
            }
            if($checkListPetrol->checklist_type == "Off") {
                $hire->status = "offHire";

                $tanker = Tanker::find($hire->tanker_id);
                $tanker->usage = false;
                $tanker->save();
            }            
            $hire->save();
            $this->sendMail($checkListPetrol);
            return redirect()->route('hires.index')->withSuccess(__('crud.common.created'));
        }
        $checkListPetrol->update($validated);      
        
        $tanker = $hire->tanker;
        $tanker->ext_splat_left = $request->ext_splat_left;
        $tanker->ext_splat_front = $request->ext_splat_front;
        $tanker->ext_splat_rear = $request->ext_splat_rear;
        $tanker->ext_splat_right = $request->ext_splat_right;
        $tanker->int_splat = $request->int_splat;
        $tanker->save();
        
        return redirect()
            ->route('check-list-petrols.edit', $checkListPetrol)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', $checkListPetrol);

        $checkListPetrol->delete();

        return redirect()
            ->route('check-list-petrols.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
