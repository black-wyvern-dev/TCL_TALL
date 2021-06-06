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
                            id="contact"
                            value="{{ $hire->company->contact }}"
                            maxlength="255"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 bg-gray-200 md:bg-gray-200"
                            disabled
                        ></x-inputs.text>
                    </div>
                    <div class="mt-6">
                        <label for="company_id" class="block text-sm font-medium text-gray-700">Company</label>
                        <x-inputs.text
                            name="company_id"
                            id="company_id"
                            value="{{ $hire->company->company }}"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 bg-gray-200 md:bg-gray-200"
                            disabled
                        ></x-inputs.text>
                    </div>
                    <div class="mt-6">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <x-inputs.text
                            name="email"
                            id="email"
                            value="{{ $hire->company->email }}"
                            maxlength="255"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 bg-gray-200 md:bg-gray-200"
                            disabled
                        ></x-inputs.text>
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <div class="">

                        <label for="order_num" class="block text-sm font-medium text-gray-700">Order Number</label>
                        <x-inputs.text
                            name="order_num"
                            id="order_num"
                            value="{{ $hire->order_num }}"
                            maxlength="255"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 bg-gray-200 md:bg-gray-200"
                            disabled
                        ></x-inputs.text>
                    </div>
                    <div class="mt-6">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <x-inputs.text
                            name="phone"
                            id="phone"
                            value="{{ $hire->company->phone }}"
                            maxlength="255"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 bg-gray-200 md:bg-gray-200"
                            disabled
                        ></x-inputs.text>
                    </div>
                    <div class="mt-6">
                        <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile Number</label>
                        <x-inputs.text
                            name="mobile"
                            id="mobile"
                            value="{{ $hire->company->mobile }}"
                            maxlength="255"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 bg-gray-200 md:bg-gray-200"
                            disabled
                        ></x-inputs.text>
                    </div>
                </div>
                <div class="col-span-6 sm:col-span-6">
                    <div class="">
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <x-inputs.text
                            name="address"
                            id="address"
                            value="{{ $hire->company->address }}"
                            maxlength="255"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 bg-gray-200 md:bg-gray-200"
                            disabled
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
                                disabled
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 bg-gray-200 md:bg-gray-200">
                                @php $selected = $hire->tanker_id @endphp
                                <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Tanker</option>
                                @foreach($tankers as $value => $label)
                                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
                                @endforeach
                            </x-inputs.select>
                        </div>
                        <div class="mt-6">
                            <label for="equipment" class="block text-sm font-medium text-gray-700">Equipment</label>
                            <x-inputs.text
                                name="equipment"
                                id="equipment"
                                value="{{ $hire->tanker->equipment }}"
                                maxlength="255"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 bg-gray-200 md:bg-gray-200"
                                disabled
                            ></x-inputs.text>
                        </div>
                        <div class="mt-6">
                            <label for="make" class="block text-sm font-medium text-gray-700">Make</label>
                            <x-inputs.text
                                name="make"
                                id="make"
                                value="{{ $hire->tanker->make }}"
                                maxlength="255"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 bg-gray-200 md:bg-gray-200"
                                disabled
                            ></x-inputs.text>
                        </div>
                        <div class="mt-6">
                            <label for="chassis" class="block text-sm font-medium text-gray-700">Chassis Number</label>
                            <x-inputs.text
                                name="chassis"
                                id="chassis"
                                value="{{ $hire->tanker->chassis_num }}"
                                maxlength="255"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 bg-gray-200 md:bg-gray-200"
                                disabled
                            ></x-inputs.text>
                        </div>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <div class="">
                            <label for="mot_expiry" class="block text-sm font-medium text-gray-700">MOTOR Expiry Date</label>
                            <x-inputs.text
                                name="mot_expiry"
                                id="mot_expiry"
                                value="{{ $hire->mot_expiry }}"
                                maxlength="255"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 bg-gray-200 md:bg-gray-200"
                                disabled
                            ></x-inputs.text>
                        </div>
                        <div class="mt-6">
                            <label for="adr_expiry" class="block text-sm font-medium text-gray-700">ADR Expiry Date</label>
                            <x-inputs.text
                                name="adr_expiry"
                                id="adr_expiry"
                                value="{{ $hire->adr_expiry }}"
                                maxlength="255"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 bg-gray-200 md:bg-gray-200"
                                disabled
                            ></x-inputs.text>
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
                                value="{{ $hire->service_interval }}"
                                type="range" 
                                min="6" 
                                max="8" 
                                step="1" 
                                list="interval-list" 
                                tooltip bind:value
                                disabled
                            />
                            <div class="grid grid-cols-3 w-full">
                                <label>6</label>
                                <label class="text-center">7</label>
                                <label class="text-right">8</label>
                            </div>
                        </div>
                        <div class="mt-6">
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
                                        disabled
                                        {{ $hire->discharge_pump == 0 ? 'checked' : '' }}
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
                                        {{ $hire->discharge_pump == 1 ? 'checked' : '' }}
                                        disabled>
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
                                    value="{{ $hire->contract_num }}"
                                    maxlength="255"
                                    class="form-date mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 bg-gray-200 md:bg-gray-200"
                                    disabled
                                ></x-inputs.text>
                            </div>
                            <div class="mt-6">
                                <label for="start_date" class="block text-sm font-medium text-gray-700">Hire Start Date</label>
                                <input
                                    name="start_date"
                                    type="date"
                                    max="255"
                                    class="form-date mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 bg-gray-200 md:bg-gray-200"
                                    value="{{ optional($hire->start_date)->format('Y-m-d') }}"
                                    disabled
                                ></input>
                            </div>
                            <div class="mt-6">
                                <label for="end_date" class="block text-sm font-medium text-gray-700">Hire End Date</label>
                                <input
                                    name="end_date"
                                    type="text"
                                    value="{{ optional($hire->end_date)->format('Y-m-d') }}"
                                    max="255"
                                    disabled
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 bg-gray-200 md:bg-gray-200"
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
                                        class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md py-2 bg-gray-200 md:bg-gray-200"
                                        placeholder="0000.00"
                                        value="{{ $hire->deposit }}"
                                        aria-describedby="price-currency"
                                        disabled
                                    ></x-inputs.text>
                                    </div>
                            </div>

                            <div class="mt-6">
                                <span class="block text-sm font-medium text-gray-700">Hire Type</span>
                                <div class="mt-1">                                                                    
                                    <x-inputs.select
                                        name="hire_type"
                                        id="hire_type"
                                        disabled
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 bg-gray-200 md:bg-gray-200">                                
                                        <option value="Weekly" {{ $hire->hire_type == "Weekly" ? 'selected' : ''}}>Weekly</option>
                                        <option value="Monthly" {{ $hire->hire_type == "Monthly" ? 'selected' : ''}}>Monthly</option>
                                        <option value="3 Months +" {{ $hire->hire_type == "3 Months +" ? 'selected' : ''}}>3 Months +</option>
                                        <option value="6 Months +" {{ $hire->hire_type == "6 Months +" ? 'selected' : ''}}>6 Months +</option>
                                        <option value="12 Months +" {{ $hire->hire_type == "12 Months +" ? 'selected' : ''}}>12 Months +</option>
                                    </x-inputs.select>
                                </div>
                            </div>
                            <div class="mt-6">
                                <label for="hire_rate" class="block text-sm font-medium text-gray-700">Hire Rate</label>
                                <div class="mt-2 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">
                                        £
                                        </span>
                                    </div>
                                    <x-inputs.text
                                        name="hire_rate"
                                        value="{{ $hire->hire_rate }}"
                                        maxlength="255"
                                        placeholder="Card Expiration Date"
                                        class="focus:ring-indigo-500 focus:border-indigo-500 block py-2 w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md bg-gray-200 md:bg-gray-200" placeholder="0000.00" aria-describedby="price-currency"
                                        disabled
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
                                        value="{{ $hire->monthly_rate }}"
                                        maxlength="255"
                                        placeholder="Card Expiration Date"
                                        class="focus:ring-indigo-500 focus:border-indigo-500 block py-2 w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md bg-gray-200 md:bg-gray-200" placeholder="0000.00" aria-describedby="price-currency"
                                        disabled
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
                                        value="{{ $hire->charge }}"
                                        maxlength="255"
                                        disabled
                                        placeholder="Card Expiration Date"
                                        class="focus:ring-indigo-500 focus:border-indigo-500 block py-2 w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md bg-gray-200 md:bg-gray-200" placeholder="0000.00" aria-describedby="price-currency"
                                    ></x-inputs.text>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm" id="price-currency">
                                        + VAT
                                        </span>
                                    </div>
                                </div>
                            </div>                            
                            <div class="mt-6">
                                <span class="block text-sm font-medium text-gray-700">Maintenance</span>
                                <div class="mt-2">
                                    <div>
                                        <label class="inline-flex items-center">
                                            <input type="radio"
                                                class="form-radio"
                                                name="maintenance_included"
                                                value="0"
                                                disabled
                                                {{ $hire->maintenance_included == "0" ? 'checked' : '' }}
                                                checked>
                                            <span class="ml-2">None</span>
                                        </label>
                                    </div>
                                    <div>
                                        <label class="inline-flex items-center">
                                            <input type="radio"
                                                class="form-radio"
                                                name="maintenance_included"
                                                disabled
                                                {{ $hire->maintenance_included == "1" ? 'checked' : '' }}
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
                                        value="{{ $hire->collection_charge }}"
                                        maxlength="255"
                                        disabled
                                        placeholder="Card Expiration Date"
                                        class="focus:ring-indigo-500 focus:border-indigo-500 block py-2 w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md bg-gray-200 md:bg-gray-200" placeholder="0000.00" aria-describedby="price-currency"
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
                                        disabled
                                        name="water_fill_charge"
                                        value="{{ $hire->water_fill_charge }}"
                                        maxlength="255"
                                        placeholder="Card Expiration Date"
                                        class="focus:ring-indigo-500 focus:border-indigo-500 block py-2 w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md bg-gray-200 md:bg-gray-200" placeholder="0000.00" aria-describedby="price-currency"
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
                                        disabled
                                        name="commissioning_charge"
                                        value="{{ $hire->commissioning_charge }}"
                                        maxlength="255"
                                        placeholder="Card Expiration Date"
                                        class="focus:ring-indigo-500 focus:border-indigo-500 block py-2 w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md bg-gray-200 md:bg-gray-200" placeholder="0000.00" aria-describedby="price-currency"
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
                                        disabled
                                        name="cleaning_outside_charge"
                                        value="{{ $hire->cleaning_outside_charge }}"
                                        maxlength="255"
                                        placeholder="Card Expiration Date"
                                        class="focus:ring-indigo-500 focus:border-indigo-500 block py-2 w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md bg-gray-200 md:bg-gray-200" placeholder="0000.00" aria-describedby="price-currency"
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
                                        disabled
                                        name="cleanout_charge"
                                        value="{{ $hire->cleanout_charge }}"
                                        maxlength="255"
                                        placeholder="Card Expiration Date"
                                        class="focus:ring-indigo-500 focus:border-indigo-500 block py-2 w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md bg-gray-200 md:bg-gray-200" placeholder="0000.00" aria-describedby="price-currency"
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
                                        disabled
                                        name="other_charge"
                                        value="{{ $hire->other_charge }}"
                                        maxlength="255"
                                        placeholder="Card Expiration Date"
                                        class="focus:ring-indigo-500 focus:border-indigo-500 block py-2 w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md bg-gray-200 md:bg-gray-200" placeholder="0000.00" aria-describedby="price-currency"
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
                                    disabled
                                    id="charge_notes"
                                    name="charge_notes"
                                    rows="3"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md bg-gray-200 md:bg-gray-200"
                                    placeholder="charge notes here">{{ $hire->charge_notes }}</textarea>
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
                                        disabled
                                        name="tyre_wear_charge"
                                        value="{{ $hire->tyre_wear_charge }}"
                                        maxlength="255"
                                        placeholder="Card Expiration Date"
                                        class="focus:ring-indigo-500 focus:border-indigo-500 block py-2 w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md bg-gray-200 md:bg-gray-200" placeholder="0000.00" aria-describedby="price-currency"
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
                                                disabled
                                                {{ $hire->tyres_included == "0" ? 'checked' : '' }}
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
                                                {{ $hire->tyres_included == "1" ? 'checked' : '' }}
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
            Only disabled if vehicle is to be delivered to customer by TCL.
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
                                disabled
                                name="delivery_contact_name"
                                id="delivery_contact_name"
                                value="{{ $hire->delivery_contact_name }}"
                                maxlength="255"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 bg-gray-200 md:bg-gray-200"
                            ></x-inputs.text>
                        </div>
                        <div class="mt-6">
                            <label for="delivery_address" class="block text-sm font-medium text-gray-700">Delivery Address</label>
                            <x-inputs.text
                                disabled
                                name="delivery_address"
                                id="delivery_address"
                                value="{{ $hire->delivery_address }}"
                                maxlength="255"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 bg-gray-200 md:bg-gray-200"
                            ></x-inputs.text>
                        </div>
                        <div class="mt-6">
                            <label for="delivery_postcode" class="block text-sm font-medium text-gray-700">Delivery Postcode</label>
                            <x-inputs.text
                                disabled
                                name="delivery_postcode"
                                id="delivery_postcode"
                                value="{{ $hire->delivery_postcode }}"
                                maxlength="255"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 bg-gray-200 md:bg-gray-200"
                            ></x-inputs.text>
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <div class="">
                            <label for="delivery_phone" class="block text-sm font-medium text-gray-700">Delivery Phone</label>
                            <x-inputs.text
                                disabled
                                name="delivery_phone"
                                id="delivery_phone"
                                value="{{ $hire->delivery_phone }}"
                                maxlength="255"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 bg-gray-200 md:bg-gray-200"
                            ></x-inputs.text>
                        </div>
                        <div class="mt-6">
                            <label for="delivery_email" class="block text-sm font-medium text-gray-700">Delivery Email</label>
                            <x-inputs.text
                                disabled
                                name="delivery_email"
                                id="delivery_email"
                                value="{{ $hire->delivery_email }}"
                                maxlength="255"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 bg-gray-200 md:bg-gray-200"
                            ></x-inputs.text>
                        </div>
                        <div class="mt-6">
                            <label for="delivery_fax" class="block text-sm font-medium text-gray-700">Delivery Fax</label>
                            <x-inputs.text
                                disabled
                                name="delivery_fax"
                                id="delivery_fax"
                                value="{{ $hire->delivery_fax }}"
                                maxlength="255"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 bg-gray-200 md:bg-gray-200"
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
                            value="{{ $hire->insurer }}"
                            maxlength="255"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 bg-gray-200 md:bg-gray-200"
                            disabled
                        ></x-inputs.text>
                    </div>
                    <div class="mt-6">
                        <label for="policy_expiry" class="block text-sm font-medium text-gray-700">Insurance Expiry Date</label>
                        <input
                            name="policy_expiry"
                            type="date"
                            value="{{ optional($hire->policy_expiry)->format('Y-m-d') }}"
                            max="255"
                            class="form-date mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 bg-gray-200 md:bg-gray-200"
                            disabled
                        ></input>
                    </div>
                    <div class="mt-6">
                        <label for="broker" class="block text-sm font-medium text-gray-700">Broker</label>
                        <x-inputs.text
                            name="broker"
                            value="{{ $hire->broker }}"
                            maxlength="255"
                            disabled
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 bg-gray-200 md:bg-gray-200"
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
                                value="{{ $hire->policy_value }}"
                                maxlength="255"
                                placeholder="Card Expiration Date"
                                class="focus:ring-indigo-500 focus:border-indigo-500 block py-2 w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md bg-gray-200 md:bg-gray-200" placeholder="0000.00" aria-describedby="price-currency"
                                disabled
                            ></x-inputs.text>
                        </div>
                    </div>
                    <div>
                        <input type="text" name="hirer_ip" id="hirer_ip" value="localhost://tcl.com" hidden>
                        <input type="text" name="hirer_geo" id="hirer_geo" value="Local host" hidden>
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <div class="">
                        <label for="policy_num" class="block text-sm font-medium text-gray-700">Policy Number</label>
                        <x-inputs.text
                            name="policy_num"
                            value="{{ $hire->policy_num }}"
                            maxlength="255"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 bg-gray-200 md:bg-gray-200"
                            disabled
                        ></x-inputs.text>
                    </div>
                    <div class="mt-6">
                        <label for="policy_type" class="block text-sm font-medium text-gray-700">Policy Type</label>
                        <x-inputs.text
                            name="policy_type"
                            value="{{ $hire->policy_type }}"
                            maxlength="255"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 bg-gray-200 md:bg-gray-200"
                            disabled
                        ></x-inputs.text>
                    </div>
                    <div class="mt-6">
                        <label for="policy_notes" class="block text-sm font-medium text-gray-700">Policy Notes</label>
                        <textarea
                            disabled
                            id="policy_notes"
                            name="policy_notes"
                            rows="5"
                            class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md bg-gray-200 md:bg-gray-200"
                            placeholder="policy notes here">{{ $hire->policy_notes }}</textarea>
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
    'editing' => true,
    'data' => $hire,
    'signing' => true,
    'terms_condition' => true
])

<span class="up cursor-pointer text-sm font-medium text-gray-600 font-bold">Scroll up &uarr;</span>

<div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
    <div class="border-t border-gray-200"></div>
    </div>
</div>
<!-- Modal Dialog -->

<div class="terms_conditions-modal fixed w-full inset-0 z-50 overflow-hidden flex justify-center items-center animated faster" style="display:none; background: rgba(0,0,0,.7);">
    <div class="shadow-lg modal-container rounded-xl z-50">
        <div class="modal-content">           
            <div class="relative sm:max-w-6xl sm:mx-auto">
                <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-light-blue-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"></div>
                    <div class="relative px-4 py-10 mx-auto bg-white shadow-lg sm:rounded-3xl sm:p-20">                                                          
                        <div class="py-4 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                            <p class="text-2xl font-bold text-gray-500">Terms &amp; Conditions</p>
                            <p>This is the text of the terms and conditions.</p>
                                General Terms
                                Please review our terms of use.

                                General Terms
                                By accessing and placing an order with TCL Tankers, you confirm that you are in agreement with and bound by the terms and conditions contained in the Terms Of Use outlined below. These terms apply to the entire website and any email or other type of communication between you and AlphaSquad.

                            </p>
                        </div>
                        <div class="pt-6 text-base flex relative">
                            <x-inputs.checkbox
                                id="terms_check"
                                name="terms_check"
                                class="mt-1 mr-3"
                                label=""                                       
                            ></x-inputs.checkbox>
                            <p class="pr-10">I agree with this Terms and Conditions</p>
                            <div class="absolute right-0">
                                <span class="bg-cyan-500 p-3 ml-3 rounded-lg text-white hover:bg-cyan-600 add_result_data cursor-pointer terms_conditions_close">Close</span>
                            </div>
                        </div>                                                            
                    </div>
                </div>
            </div>                      
        </div>
    </div>
</div>
<!-- End Modal Dialog -->