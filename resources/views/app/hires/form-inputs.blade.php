@php $editing = isset($hire);
    if($editing)
        $doc_urls = explode(";", $hire->attached_doc);
    else
        $hire = null;
@endphp
@section('styles')
<link rel="stylesheet" href="{{ asset('css/scroll_down.css') }}"> 
@endsection
<div class="mb-10 rounded-lg bg-white overflow-hidden shadow">
    <h2 class="sr-only" id="profile-overview-title">Hire Contract</h2>
    <div class="bg-white p-6 relative">
    <div class="sm:flex sm:items-center sm:justify-between">
        <div class="sm:flex sm:space-x-5">
            <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
                <p class="text-sm font-medium text-gray-600">TCL Tankers</p>
                <p class="text-xl font-bold text-gray-900 sm:text-2xl">Hire Contract</p>
                <p class="text-sm font-medium text-gray-400">To be completed by TCL and customer.</p>
            </div>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600 font-bold absolute top-3 right-16">Signature</p>
            <svg class="arrows down cursor-pointer">            
                <path class="a1" d="M0 0 L20 25 L40 0"></path>
                <path class="a2" d="M0 20 L20 45 L40 20"></path>
                <path class="a3" d="M0 40 L20 65 L40 40"></path>
            </svg>
        </div>
    </div>
    </div>
</div>
<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Hiring Company</h3>
        <p class="mt-1 text-sm text-gray-600">
            Select the custom from the company dropdown.
        </p>
        </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">


            <div class="grid grid-cols-6 gap-6 pb-6">
                <div class="col-span-6 sm:col-span-3">
                    <div class="">
                        <label for="contact" class="block text-sm font-medium text-gray-700">Contact</label>
                        <x-inputs.text
                            name="contact"
                            list="contact_list"
                            id="contact"
                            value="{{ old('contact', ($editing ? $hire->company->contact : '')) }}"
                            maxlength="255"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"                            
                            required
                        ></x-inputs.text>
                        <datalist id="contact_list">
                            @forelse ($companies as $company)
                                <option value="{{ $company->contact }}"></option>
                            @empty
                                <option value = "there is no data"></option>
                            @endforelse
                        </datalist>
                    </div>
                    <div class="mt-6">
                        <label for="company_id" class="block text-sm font-medium text-gray-700">Company</label>
                        <x-inputs.text
                            name="company_id"
                            id="company_id"
                            value="{{ old('company_id', ($editing ? $hire->company->company : '')) }}"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md h-auto py-2"
                            readonly
                            required
                        ></x-inputs.text>
                    </div>
                    <div class="mt-6">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <x-inputs.text
                            name="email"
                            id="email"
                            value="{{ old('email', ($editing ? $hire->company->email : '')) }}"
                            maxlength="255"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                            readonly
                        ></x-inputs.text>
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <div class="">
                        <label for="order_num" class="block text-sm font-medium text-gray-700">Order Number</label>
                        <x-inputs.text
                            name="order_num"
                            id="order_num"
                            value="{{ old('order_num', ($editing ? $hire->order_num : '')) }}"
                            maxlength="255"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"                            
                        ></x-inputs.text>
                    </div>
                    <div class="mt-6">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <x-inputs.text
                            name="phone"
                            id="phone"
                            value="{{ old('phone', ($editing ? $hire->company->phone : '')) }}"
                            maxlength="255"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                            readonly
                        ></x-inputs.text>
                    </div>
                    <div class="mt-6">
                        <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile Number</label>
                        <x-inputs.text
                            name="mobile"
                            id="mobile"
                            value="{{ old('mobile', ($editing ? $hire->company->mobile : '')) }}"
                            maxlength="255"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                            readonly
                        ></x-inputs.text>
                    </div>
                </div>
                <div class="col-span-6 sm:col-span-6">
                    <div class="">
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <x-inputs.text
                            name="address"
                            id="address"
                            value="{{ old('address', ($editing ? $hire->company->address : '')) }}"
                            maxlength="255"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                            readonly
                        ></x-inputs.text>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
    <div class="border-t border-gray-200"></div>
    </div>
</div>

<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Equipment Details</h3>
        <p class="mt-1 text-sm text-gray-600">
            Select the Tanker from the Tanker dropdown.
        </p>
        </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="grid grid-cols-6 gap-6 pb-6">
                    <div class="col-span-6 sm:col-span-3">
                        <div class="">
                            <label for="tanker_id" class="block text-sm font-medium text-gray-700">Tanker</label>
                            <x-inputs.select
                                name="tanker_id"
                                id="tanker_id"
                                required
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2">                                
                                <option readonly >Please select the Tanker</option>
                                @foreach($tankers as $tanker)                               
                                <option value="{{ $tanker->id }}" {{old('tanker_id', ($editing ? $hire->tanker->id : '')) == $tanker->id ? 'selected' : ''}} >{{ $tanker->fleet_num }}</option>
                                @endforeach
                            </x-inputs.select>
                        </div>
                        <div class="mt-6">
                            <label for="equipment" class="block text-sm font-medium text-gray-700">Equipment</label>
                            <x-inputs.text
                                name="equipment"
                                id="equipment"
                                value="{{ old('equipment', ($editing ? $hire->tanker->equipment : '')) }}"
                                maxlength="255"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                readonly
                            ></x-inputs.text>
                        </div>
                        <div class="mt-6">
                            <label for="make" class="block text-sm font-medium text-gray-700">Make</label>
                            <x-inputs.text
                                name="make"
                                id="make"
                                value="{{ old('make', ($editing ? $hire->tanker->make : '')) }}"
                                maxlength="255"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                readonly
                            ></x-inputs.text>
                        </div>
                        <div class="mt-6">
                            <label for="chassis" class="block text-sm font-medium text-gray-700">Chassis Number</label>
                            <x-inputs.text
                                name="chassis"
                                id="chassis"
                                value="{{ old('chassis', ($editing ? $hire->tanker->chassis_num : '')) }}"
                                maxlength="255"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                readonly
                            ></x-inputs.text>
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <div class="">
                            <label for="mot_expiry" class="block text-sm font-medium text-gray-700">MOTOR Expiry Date</label>
                            <input
                                name="mot_expiry"
                                id="mot_expiry"
                                type="date"
                                value="{{ old('mot_expiry', ($editing ? $hire->mot_expiry : '')) }}"
                                maxlength="255"
                                required
                                class="form-date mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                            ></input>
                        </div>
                        <div class="mt-6">
                            <label for="adr_expiry" class="block text-sm font-medium text-gray-700">ADR Expiry Date</label>
                            <input
                                name="adr_expiry"
                                type="date"
                                id="adr_expiry"
                                value="{{ old('adr_expiry', ($editing ? $hire->adr_expiry : '')) }}"
                                maxlength="255"
                                required
                                class="form-date mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                            ></input>
                        </div>
                        <div class="mt-6">
                            <label for="service_interval" class="block text-sm font-medium text-gray-700">Service Interval (weeks)</label>
                            <datalist id="interval-list">                                
                                <option value="6"></option>
                                <option value="7"></option>
                                <option value="8"></option>                               
                            </datalist>
                            <input 
                                name="service_interval" 
                                class="w-full mt-1" 
                                value="{{old('service_interval', ($editing ? $hire->service_interval : ''))}}"
                                type="range" 
                                min="6" 
                                max="8" 
                                step="1" 
                                list="interval-list" 
                                tooltip bind:value
                                required/>
                            <div class="grid grid-cols-3 w-full">
                                <label>6</label>
                                <label class="text-center">7</label>
                                <label class="text-right">8</label>
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="discharge_pump" class="block text-sm font-medium text-gray-700">Discharge Pump Fitted</label>
                            <div class="mt-2">
                                <div>
                                    <label class="inline-flex items-center">
                                    <input
                                        name="discharge_pump"
                                        id="discharge_pump_f"
                                        type="radio"
                                        class="form-radio"
                                        checked
                                        value="0"
                                        {{ $editing ? $hire->discharge_pump == 0 ? 'checked' : '' : 'checked' }}
                                        >
                                    <span class="ml-2">No</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                    <input
                                        name="discharge_pump"
                                        id="discharge_pump_t"
                                        type="radio"
                                        class="form-radio"
                                        value="1"
                                        {{ $editing ? $hire->discharge_pump == 1 ? 'checked' : '' : '' }}
                                        readonly>
                                    <span class="ml-2">Yes</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
    <div class="border-t border-gray-200"></div>
    </div>
</div>


<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Hire Details</h3>
            <p class="mt-1 text-sm text-gray-600">
                Charging details for this hire.
            </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-6 gap-6 pb-6">
                        <div class="col-span-6 sm:col-span-3">                            
                            <div class="">
                                <label for="contract_num" class="block text-sm font-medium text-gray-700">Hire Contract Number</label>
                                <x-inputs.text
                                    name="contract_num"
                                    id="contract_num"
                                    value="{{ old('contract_num', ($editing ? $hire->contract_num : '')) }}"
                                    maxlength="255"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                    required
                                ></x-inputs.text>
                            </div>
                            <div class="mt-6">
                                <label for="start_date" class="block text-sm font-medium text-gray-700">Hire Start Date</label>
                                <input
                                    name="start_date"
                                    type="date"
                                    max="255"
                                    class="form-date mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                    value="{{ old('start_date', ($editing ? optional($hire->start_date)->format('Y-m-d') : '')) }}"
                                    required
                                ></input>
                            </div>
                            <div class="mt-6">
                                <label for="end_date" class="block text-sm font-medium text-gray-700">Hire End Date</label>
                                <input
                                    name="end_date"
                                    type="date"
                                    value="{{ old('end_date', ($editing ? optional($hire->end_date)->format('Y-m-d') : '')) }}"
                                    max="255"
                                    class="form-date mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                ></input>
                            </div>
                            <div class="mt-6">
                                <label for="deposit" class="block text-sm font-medium text-gray-700">Deposit Month</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">
                                        £
                                        </span>
                                    </div>
                                    <x-inputs.text
                                        name="deposit"
                                        id="deposit"
                                        type="text"
                                        class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md py-2"
                                        placeholder="0000.00"
                                        value="{{ old('deposit', ($editing ? $hire->deposit : '' )) }}"
                                        aria-describedby="price-currency"
                                    ></x-inputs.text>
                                    </div>
                            </div>

                            <div class="mt-6">
                                <span class="block text-sm font-medium text-gray-700">Hire Type</span>
                                <div class="mt-1">                                                                    
                                    <x-inputs.select
                                        name="hire_type"
                                        id="hire_type"
                                        required
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2">                                
                                        <option value="Weekly" {{ $editing ? $hire->hire_type == "Weekly" ? 'selected' : '' : ''}}>Weekly</option>
                                        <option value="Monthly" {{ $editing ? $hire->hire_type == "Monthly" ? 'selected' : '' : ''}}>Monthly</option>
                                        <option value="3 Months +" {{ $editing ? $hire->hire_type == "3 Months +" ? 'selected' : '' : ''}}>3 Months +</option>
                                        <option value="6 Months +" {{ $editing ? $hire->hire_type == "6 Months +" ? 'selected' : '' : ''}}>6 Months +</option>
                                        <option value="12 Months +" {{ $editing ? $hire->hire_type == "12 Months +" ? 'selected' : '' : ''}}>12 Months +</option>
                                    </x-inputs.select>
                                </div>
                            </div>
                            <div class="mt-6">
                                <label for="hire_rate" class="block text-sm font-medium text-gray-700">Hire Rate</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">
                                        £
                                        </span>
                                    </div>
                                    <x-inputs.text
                                        name="hire_rate"
                                        value="{{ old('hire_rate', ($editing ? $hire->hire_rate : '')) }}"
                                        maxlength="255"
                                        placeholder="Card Expiration Date"
                                        class="focus:ring-indigo-500 focus:border-indigo-500 block py-2 w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0000.00" aria-describedby="price-currency"
                                        required
                                    ></x-inputs.text>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm" id="price-currency">
                                        + VAT
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6">
                                <label for="monthly_rate" class="block text-sm font-medium text-gray-700">Monthly Rate</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">
                                        £
                                        </span>
                                    </div>
                                    <x-inputs.text
                                        name="monthly_rate"
                                        value="{{ old('monthly_rate', ($editing ? $hire->monthly_rate : '')) }}"
                                        maxlength="255"
                                        placeholder="Card Expiration Date"
                                        class="focus:ring-indigo-500 focus:border-indigo-500 block py-2 w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0000.00" aria-describedby="price-currency"
                                        required
                                    ></x-inputs.text>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm" id="price-currency">
                                        + VAT
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-8">
                                <label for="charge" class="block text-sm font-medium text-gray-700">Delivery</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">
                                        £
                                        </span>
                                    </div>
                                    <x-inputs.text
                                        name="charge"
                                        value="{{ old('charge', ($editing ? $hire->charge : '')) }}"
                                        maxlength="255"
                                        placeholder="Card Expiration Date"
                                        class="focus:ring-indigo-500 focus:border-indigo-500 block py-2 w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0000.00" aria-describedby="price-currency"
                                    ></x-inputs.text>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm" id="price-currency">
                                        + VAT
                                        </span>
                                    </div>
                                </div>
                            </div>                                                       
                            <div class="mt-8">
                                <span class="block text-sm font-medium text-gray-700">Maintenance</span>
                                <div class="mt-2">
                                    <div>
                                        <label class="inline-flex items-center">
                                            <input type="radio"
                                                class="form-radio"
                                                name="maintenance_included"
                                                id="maintenance_included_f"
                                                value="0"
                                                {{ $editing ? $hire->maintenance_included == "0" ? 'checked' : '' : '' }}
                                                checked>
                                            <span class="ml-2">None</span>
                                        </label>
                                    </div>
                                    <div>
                                        <label class="inline-flex items-center">
                                            <input type="radio"
                                                class="form-radio"
                                                name="maintenance_included"
                                                id="maintenance_included_t"
                                                {{ $editing ? $hire->maintenance_included == "1" ? 'checked' : '' : '' }}
                                                value="1"
                                            >
                                            <span class="ml-2">Maintenance Included</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-6 sm:col-span-3"> 
                            <div class="">
                                <label for="collection_charge" class="block text-sm font-medium text-gray-700">Collection</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">
                                        £
                                        </span>
                                    </div>
                                    <x-inputs.text
                                        name="collection_charge"
                                        value="{{ old('collection_charge', ($editing ? $hire->collection_charge : '')) }}"
                                        maxlength="255"
                                        placeholder="Card Expiration Date"
                                        class="focus:ring-indigo-500 focus:border-indigo-500 block py-2 w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0000.00" aria-describedby="price-currency"
                                    ></x-inputs.text>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm" id="price-currency">
                                        + VAT
                                        </span>
                                    </div>
                                </div>
                            </div>                            
                            <div class="mt-6">
                                <label for="water_fill_charge" class="block text-sm font-medium text-gray-700">Water Fill</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">
                                        £
                                        </span>
                                    </div>
                                    <x-inputs.text
                                        name="water_fill_charge"
                                        value="{{ old('water_fill_charge', ($editing ? $hire->water_fill_charge : '')) }}"
                                        maxlength="255"
                                        placeholder="Card Expiration Date"
                                        class="focus:ring-indigo-500 focus:border-indigo-500 block py-2 w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0000.00" aria-describedby="price-currency"
                                    ></x-inputs.text>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm" id="price-currency">
                                        + VAT
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6">
                                <label for="commissioning_charge" class="block text-sm font-medium text-gray-700">Commission Charge</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">
                                        £
                                        </span>
                                    </div>
                                    <x-inputs.text
                                        name="commissioning_charge"
                                        value="{{ old('commissioning_charge', ($editing ? $hire->commissioning_charge : '')) }}"
                                        maxlength="255"
                                        placeholder="Card Expiration Date"
                                        class="focus:ring-indigo-500 focus:border-indigo-500 block py-2 w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0000.00" aria-describedby="price-currency"
                                    ></x-inputs.text>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm" id="price-currency">
                                        + VAT
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6">
                                <label for="cleaning_outside_charge" class="block text-sm font-medium text-gray-700">Cleaning Outside Charge</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">
                                        £
                                        </span>
                                    </div>
                                    <x-inputs.text
                                        name="cleaning_outside_charge"
                                        value="{{ old('cleaning_outside_charge', ($editing ? $hire->cleaning_outside_charge : '')) }}"
                                        maxlength="255"
                                        placeholder="Card Expiration Date"
                                        class="focus:ring-indigo-500 focus:border-indigo-500 block py-2 w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0000.00" aria-describedby="price-currency"
                                    ></x-inputs.text>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm" id="price-currency">
                                        + VAT
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6">
                                <label for="cleanout_charge" class="block text-sm font-medium text-gray-700">Clean Out Charge</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">
                                        £
                                        </span>
                                    </div>
                                    <x-inputs.text
                                        name="cleanout_charge"
                                        value="{{ old('cleanout_charge', ($editing ? $hire->cleanout_charge : '')) }}"
                                        maxlength="255"
                                        placeholder="Card Expiration Date"
                                        class="focus:ring-indigo-500 focus:border-indigo-500 block py-2 w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0000.00" aria-describedby="price-currency"
                                    ></x-inputs.text>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm" id="price-currency">
                                        + VAT
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-7">
                                <label for="other_charge" class="block text-sm font-medium text-gray-700">Other</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">
                                        £
                                        </span>
                                    </div>
                                    <x-inputs.text
                                        name="other_charge"
                                        value="{{ old('other_charge', ($editing ? $hire->other_charge : '')) }}"
                                        maxlength="255"
                                        placeholder="Card Expiration Date"
                                        class="focus:ring-indigo-500 focus:border-indigo-500 block py-2 w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0000.00" aria-describedby="price-currency"
                                    ></x-inputs.text>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm" id="price-currency">
                                        + VAT
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="charge_notes" class="block text-sm font-medium text-gray-700">Charge Notes</label>
                                <textarea
                                    id="charge_notes"
                                    name="charge_notes"
                                    rows="3"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                    placeholder="charge notes here">{{ $editing ? $hire->charge_notes : '' }}</textarea>
                            </div>
                            <div class="mt-3">
                                <label for="tyre_wear_charge" class="block text-sm font-medium text-gray-700">Tyre Wear SOR</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">
                                        £
                                        </span>
                                    </div>
                                    <x-inputs.text
                                        name="tyre_wear_charge"
                                        value="{{ old('tyre_wear_charge', ($editing ? $hire->tyre_wear_charge : '')) }}"
                                        maxlength="255"
                                        placeholder="Card Expiration Date"
                                        class="focus:ring-indigo-500 focus:border-indigo-500 block py-2 w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0000.00" aria-describedby="price-currency"
                                    ></x-inputs.text>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm" id="price-currency">
                                        Per mm + VAT
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6">
                                <span class="block text-sm font-medium text-gray-700">Tyres</span>
                                <div>
                                    <div class="mt-2">
                                        <label class="inline-flex items-center">
                                            <input
                                                type="radio"
                                                class="form-radio"
                                                name="tyres_included"
                                                id="tyres_included_f"
                                                required
                                                {{ $editing ? $hire->tyres_included == "0" ? 'checked' : '' : '' }}
                                                value="0"
                                                checked>
                                            <span class="ml-2">None</span>
                                        </label>
                                    </div>
                                    <div>
                                        <label class="inline-flex items-center">
                                            <input
                                                type="radio"
                                                class="form-radio"
                                                name="tyres_included"
                                                id="tyres_included_t"
                                                {{ $editing ? $hire->tyres_included == "1" ? 'checked' : '' : '' }}
                                                value="1"
                                            >
                                            <span class="ml-2">Tyres Included</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
    <div class="border-t border-gray-200"></div>
    </div>
</div>

<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Delivery Details</h3>
        <p class="mt-1 text-sm text-gray-600">
            Only required if vehicle is to be delivered to customer by TCL.
        </p>
        </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="grid grid-cols-6 gap-6 pb-6">
                    <div class="col-span-6 sm:col-span-3">
                        <div class="">
                            <label for="delivery_contact_name" class="block text-sm font-medium text-gray-700">Delivery Contact Name</label>
                            <x-inputs.text
                                name="delivery_contact_name"
                                id="delivery_contact_name"
                                value="{{ old('delivery_contact_name', ($editing ? $hire->delivery_contact_name : '')) }}"
                                maxlength="255"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                            ></x-inputs.text>
                        </div>
                        <div class="mt-6">
                            <label for="delivery_address" class="block text-sm font-medium text-gray-700">Delivery Address</label>
                            <input
                                name="delivery_address"
                                id="autocomplete" 
                                type="text"
                                onFocus="geolocate()"
                                placeholder="Enter Delivery Addresss"                               
                                value="{{ old('delivery_address', ($editing ? $hire->delivery_address : '')) }}"
                                maxlength="255"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                            ></input>
                        </div>
                        <div class="mt-6">
                            <label for="delivery_postcode" class="block text-sm font-medium text-gray-700">Delivery Postcode</label>
                            <input
                                name="delivery_postcode"
                                id="postal_code" 
                                type="text"                               
                                value="{{ old('delivery_postcode', ($editing ? $hire->delivery_postcode : '')) }}"
                                maxlength="255"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                            ></input>
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <div class="">
                            <label for="delivery_phone" class="block text-sm font-medium text-gray-700">Delivery Phone</label>
                            <x-inputs.text
                                name="delivery_phone"
                                id="delivery_phone"
                                value="{{ old('delivery_phone', ($editing ? $hire->delivery_phone : '')) }}"
                                maxlength="255"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                            ></x-inputs.text>
                        </div>
                        <div class="mt-6">
                            <label for="delivery_email" class="block text-sm font-medium text-gray-700">Delivery Email</label>
                            <x-inputs.text
                                name="delivery_email"
                                id="delivery_email"
                                value="{{ old('delivery_email', ($editing ? $hire->delivery_email : '')) }}"
                                maxlength="255"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                            ></x-inputs.text>
                        </div>
                        <div class="mt-6">
                            <label for="delivery_fax" class="block text-sm font-medium text-gray-700">Delivery Fax</label>
                            <x-inputs.text
                                name="delivery_fax"
                                id="delivery_fax"
                                value="{{ old('delivery_fax', ($editing ? $hire->delivery_fax : '')) }}"
                                maxlength="255"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                            ></x-inputs.text>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
    <div class="border-t border-gray-200"></div>
    </div>
</div>

<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Insurance Information</h3>
        <p class="mt-1 text-sm text-gray-600">
            Customers insurance policy details..
        </p>
        </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

            <div class="grid grid-cols-6 gap-6 pb-6">

                <div class="col-span-6 sm:col-span-3">
                    <div class="">
                        <label for="insurer" class="block text-sm font-medium text-gray-700">Insurance Company</label>
                        <x-inputs.text
                            name="insurer"
                            value="{{ old('insurer', ($editing ? $hire->insurer : '')) }}"
                            maxlength="255"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                            required
                        ></x-inputs.text>
                    </div>
                    <div class="mt-6">
                        <label for="policy_expiry" class="block text-sm font-medium text-gray-700">Insurance Expiry Date</label>
                        <input
                            name="policy_expiry"
                            type="date"
                            value="{{ old('policy_expiry', ($editing ? optional($hire->policy_expiry)->format('Y-m-d') : '')) }}"
                            max="255"
                            class="form-date mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                            required
                        ></input>
                    </div>
                    <div class="mt-6">
                        <label for="broker" class="block text-sm font-medium text-gray-700">Broker</label>
                        <x-inputs.text
                            name="broker"
                            value="{{ old('broker', ($editing ? $hire->broker : '')) }}"
                            maxlength="255"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                        ></x-inputs.text>
                    </div>
                    <div class="mt-6">
                        <label for="policy_value" class="block text-sm font-medium text-gray-700">Replacement Value</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">
                                £
                                </span>
                            </div>
                            <x-inputs.text
                                name="policy_value"
                                value="{{ old('policy_value', ($editing ? $hire->policy_value : '')) }}"
                                maxlength="255"
                                placeholder="Card Expiration Date"
                                class="focus:ring-indigo-500 focus:border-indigo-500 block py-2 w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0000.00" aria-describedby="price-currency"
                                required
                            ></x-inputs.text>
                        </div>
                    </div>
                    <div>
                        <input id="hirer_ip" type="text" name="hirer_ip" value="https://tanker.cloud" hidden>
                        <input id="hirer_geo" type="text" name="hirer_geo" value="TCL host" hidden>
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <div class="">
                        <label for="policy_num" class="block text-sm font-medium text-gray-700">Policy Number</label>
                        <x-inputs.text
                            name="policy_num"
                            value="{{ old('policy_num', ($editing ? $hire->policy_num : '')) }}"
                            maxlength="255"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                            required
                        ></x-inputs.text>
                    </div>
                    <div class="mt-6">
                        <label for="policy_type" class="block text-sm font-medium text-gray-700">Policy Type</label>
                        <x-inputs.text
                            name="policy_type"
                            value="{{ old('policy_type', ($editing ? $hire->policy_type : '')) }}"
                            maxlength="255"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                            required
                        ></x-inputs.text>
                    </div>
                    <div class="mt-6">
                        <label for="policy_notes" class="block text-sm font-medium text-gray-700">Policy Notes</label>
                        <textarea
                            id="policy_notes"
                            name="policy_notes"
                            rows="5"
                            class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                            placeholder="policy notes here">{{ $editing ? $hire->policy_notes : '' }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
    <div class="border-t border-gray-200"></div>
    </div>
</div>
<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Attach Document</h3>
                <p class="mt-1 text-sm text-gray-600">
                    Please attach refer document...
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                <div class="grid grid-cols-6 gap-6 pb-6">

                    <div class="col-span-6 sm:col-span-3">
                        <div class="">
                            <label for="insurer" class="block text-sm font-medium text-gray-700">Choose Document</label>
                            <input type="file" id="document" name="document[]" style="display:none;" multiple>
                            <button type="button" id="but_upload" class="button button-primary float-left mt-5 border-none">
                                <i class="mr-1 icon ion-md-save"></i>
                                {{!$editing ? "Upload Documents" : "Add Documents"}}
                            </button>
                        </div>
                    </div>
                    <input type="hidden" id="document_path" name="document_path" value="{{$editing ? $hire->attached_doc : ''}}">
                    <div class="col-span-6 sm:col-span-3 pt-5">
                        <div class="grid grid-cols-3 docs-url">
                            @if($editing)
                                @foreach($doc_urls as $doc_url)
                                    <a id="uploaded_doc" href="{{$doc_url}}" target="_blank" class="text-sm text-blue-600 cursor-pointer">Ref Doc {{$loop->index + 1}}</a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
    <div class="border-t border-gray-200"></div>
    </div>
</div>

@include('components.section.signature-form', [
    'editing' => $editing,
    'data' => $editing ? $hire : null
])
@if($editing)
<span class="up cursor-pointer text-sm font-medium text-gray-600 font-bold">Scroll up &uarr;</span>
@endif
<div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
    <div class="border-t border-gray-200"></div>
    </div>
</div>
<script type="text/javascript">

    if ($('.form-date').prop('type') != "date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
    document.write('<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
    document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
    document.write('<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n')
    }
</script>
<script>
    let companies = {!! json_encode($company_list) !!}
    let tankers = {!! json_encode($tanker_list) !!}
    let hire = {!! json_encode($hire) !!}
    
    var base_url = "{{ url('/') }}";
    var image_saveUrl = '{{route("images.store")}}'
    var asset_url =  "{{env('ASSET_URL')}}/pixie"
    var csrf_token =  "{{ csrf_token() }}"
    var editing = "{{ $editing }}"
    jQuery(function($){ //on document.ready
        $('.form-date').datepicker({ dateFormat: 'yy-mm-dd' });
      })
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4bdWkWTtKiFzAsAVH9BBo6SRcovj_QGk&libraries=places&callback=initAutocomplete" async defer></script>
<script src="{{ asset('js/auto-complete.js') }}"></script>
<script src="{{ asset('js/hire.js') }}"></script>
<script src="{{ asset('js/signature.js') }}"></script>
