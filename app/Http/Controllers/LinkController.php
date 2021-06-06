<?php

namespace App\Http\Controllers;

use App\Models\Tanker;
use App\Models\Hire;
use App\Models\Company;
use Brian2694\Toastr\Facades\Toastr;

class LinkController extends Controller
{

    public function showTanker($fleet_num)
    {   
        $tanker = Tanker::where('fleet_num', '=', $fleet_num)->firstOrFail();
        
        if($tanker->usage == 0)
        {
            Toastr::error('No bookings found for this tanker','Warning');
            return redirect()->route('home');
        }

        $tankerid = $tanker->id;
        $hire = Hire::where('tanker_id', '=', $tankerid)->firstOrFail();
        // $this->authorize('update', $hire);
        
        $companies = Company::all();
        $tankers = Tanker::all();        

        return view('app.hires.edit', compact('hire', 'companies', 'tankers'));
    }

}
