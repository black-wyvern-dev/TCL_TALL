<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckListFood extends Model
{
    use Searchable;
    use HasFactory;

    protected $fillable = [
        'uuid',
        'checklist_type',
        'status',

        'cladding_panels',
        'ladder_handrail',
        'side_guards',
        'rear_bumper',
        'wings_stays',
        'dipstick',
        'lights',
        'chassis',
        'valve_operation',
        'compartment_internal',
        'landingLegs_operation', 
        'dischargePump_operation',       

        'vehicle_check_note',
        'note_1',
        'ns_1',
        'os_1',
        'note_2',
        'ns_2',
        'os_2',
        'note_3',
        'ns_3',
        'os_3',

        'ext_splat_right',
        'ext_splat_left',
        'ext_splat_rear',
        'ext_splat_front',
        'int_splat',

        'int_video',                
        'ext_video',

        'cleaning_status',
        'cleaning_check',

        'hirer_name',
        'hirer_position',
        'hirer_signature',
        'hirer_behalf',
        'hirer_sign_date',
        'tcl_name',
        'tcl_position',
        'tcl_signature',
        'tcl_behalf',
        'tcl_sign_date',
        'hire_id',
        'supervisor_signature',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'check_list_foods';

    protected $casts = [

        'cladding_panels'=> 'boolean',
        'ladder_handrail'=> 'boolean',
        'side_guards'=> 'boolean',
        'rear_bumper'=> 'boolean',
        'wings_stays'=> 'boolean',
        'dipstick'=> 'boolean',
        'lights'=> 'boolean',
        'chassis'=> 'boolean',
        'valve_operation'=> 'boolean',
        'compartment_internal'=> 'boolean',
        'landingLegs_operation'=> 'boolean',
        'dischargePump_operation' => 'boolean',

        'hirer_sign_date' => 'datetime',
        'tcl_sign_date' => 'datetime',
    ];

    public function hire()
    {
        return $this->belongsTo(Hire::class);
    }
}
