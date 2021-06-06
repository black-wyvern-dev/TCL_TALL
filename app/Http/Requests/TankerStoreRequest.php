<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TankerStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fleet_num' => ['required', 'max:255', 'string'],
            'make' => ['required', 'max:255', 'string'],
            'equipment' => ['required', 'max:255', 'string'],
            'replacement_value' => ['required', 'numeric'],            
            'chassis_num' => ['required', 'max:255', 'string'],
            'serial_num' => ['required', 'max:255', 'string'],
            'tank_type' => ['required', 'max:255', 'string'],
            'sector' => ['required', 'max:255', 'string'],
            'type' => [
                'required',
                'in:Rigid,Non-Rigid,Milk,Food,Vacuum,Waste,Petrol',
            ],
        ];
    }
}
