<?php

namespace App\Http\Controllers;

use App\Models\Hire;
use App\Http\Requests\HireSigningRequest;
use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;
use App\Models\Tanker;
use App\Models\Company;
use Brian2694\Toastr\Facades\Toastr;


use App\Models\CheckListNr;
use App\Models\CheckListRigid;
use App\Models\CheckListMilk;
use App\Models\CheckListFood;
use App\Models\CheckListVacuum;
use App\Models\CheckListWaste;
use App\Models\CheckListPetrol;

class ContractController extends Controller
{
    public function customerSign($uuid) {
        $hire = Hire::where('uuid', '=', $uuid)->firstOrFail();
        $companies = Company::pluck('company', 'id');
        $tankers = Tanker::pluck('fleet_num', 'id');

        return view('app.contracts.contract', compact('companies', 'tankers','hire'));
    }

    public function store(HireSigningRequest $request, Hire $hire) {
        $validated = $request->validated(); 
        if($request->hirer_signature == "/img/sign.png") {
            Toastr::error('Sorry. You did not sign. Please sign first','Error');
             return redirect()->back();
        }
        $hire->status = "signed";                
        $hire->update($validated);
        return redirect('home');
    }

    public function checklistNr($uuid) {
        
        $checkListNr = CheckListNr::where('uuid', $uuid)->get()->first();
        
        $hires = Hire::pluck('start_date', 'id');
                
        $check_type = $checkListNr->checklist_type;        
        $hire = $checkListNr->hire;
        
        $url_link = true;
        return view('app.check_list_n_rs.edit', compact('checkListNr', 'hire', 'check_type', 'url_link'));
    }

    public function checklistRigid($uuid) {
        $checkLigidRigid = CheckListNr::where('uuid', $uuid)->get()->first();

        $hires = Hire::pluck('start_date', 'id');

        $hire_id = session('hire_id');
        $check_type = session('check_type');
        $hire = Hire::find($hire_id);
        $url_link = true;
        return view('app.check_list_rigids.edit', compact('checkLigidRigid', 'hire', 'check_type', 'url_link'));
    }

    public function checklistMilk($uuid) {
        
        $checkListMilk = CheckListMilk::where('uuid', $uuid)->get()->first();
        
        $hires = Hire::pluck('start_date', 'id');
                
        $check_type = $checkListMilk->checklist_type;        
        $hire = $checkListMilk->hire;
        
        $url_link = true;
        return view('app.check_list_milks.edit', compact('checkListMilk', 'hire', 'check_type', 'url_link'));
    }

    public function checklistFood($uuid) {
        
        $checkListFood = CheckListFood::where('uuid', $uuid)->get()->first();
        
        $hires = Hire::pluck('start_date', 'id');
                
        $check_type = $checkListFood->checklist_type;        
        $hire = $checkListFood->hire;
        
        $url_link = true;
        return view('app.check_list_foods.edit', compact('checkListFood', 'hire', 'check_type', 'url_link'));
    }

    public function checklistVacuum($uuid) {
        
        $checkListVacuum = CheckListVacuum::where('uuid', $uuid)->get()->first();
        
        $hires = Hire::pluck('start_date', 'id');
                
        $check_type = $checkListVacuum->checklist_type;        
        $hire = $checkListVacuum->hire;
        
        $url_link = true;
        return view('app.check_list_vacuums.edit', compact('checkListVacuum', 'hire', 'check_type', 'url_link'));
    }

    public function checklistWaste($uuid) {
        
        $checkListWaste = CheckListWaste::where('uuid', $uuid)->get()->first();
        
        $hires = Hire::pluck('start_date', 'id');
                
        $check_type = $checkListWaste->checklist_type;        
        $hire = $checkListWaste->hire;
        
        $url_link = true;
        return view('app.check_list_wastes.edit', compact('checkListWaste', 'hire', 'check_type', 'url_link'));
    }

    public function checklistPetrol($uuid) {
        
        $checkListPetrol = CheckListPetrol::where('uuid', $uuid)->get()->first();
        
        $hires = Hire::pluck('start_date', 'id');
                
        $check_type = $checkListPetrol->checklist_type;        
        $hire = $checkListPetrol->hire;
        
        $url_link = true;
        return view('app.check_list_petrols.edit', compact('checkListPetrol', 'hire', 'check_type', 'url_link'));
    }
   
}
