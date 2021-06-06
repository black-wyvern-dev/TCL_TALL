@php $editing = isset($tanker) @endphp

<div class="mb-10 rounded-lg bg-white overflow-hidden shadow">
    <h2 class="sr-only" id="profile-overview-title">Hire Contract</h2>
    <div class="bg-white p-6">
    <div class="sm:flex sm:items-center sm:justify-between">
        <div class="sm:flex sm:space-x-5">
        <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
            <p class="text-sm font-medium text-gray-600">TCL Tankers</p>
            <p class="text-xl font-bold text-gray-900 sm:text-2xl">Fleet Add/Update</p>
            <p class="text-sm font-medium text-gray-400">To be completed by TCL and customer.</p>
        </div>
        </div>
    </div>
    </div>
</div>

<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Tank Information</h3>
            <p class="mt-1 text-sm text-gray-600">
                We can add some notes/instructions here.
            </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-6 gap-6 pb-6">
                        <div class="col-span-6 sm:col-span-3">
                            <div class="">
                                <label for="fleet_num" class="block text-sm font-medium text-gray-700">Fleet Number</label>
                                <x-inputs.text
                                    name="fleet_num"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                    value="{{ old('fleet_num', ($editing ? $tanker->fleet_num : '')) }}"
                                    maxlength="255"
                                    required
                                ></x-inputs.text>
                            </div>
                            <div class="mt-6">
                                <label for="tank_type" class="block text-sm font-medium text-gray-700">Tank Type</label>
                                <x-inputs.text
                                    name="tank_type"                                    
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                    value="{{ old('tank_type', ($editing ? $tanker->tank_type : '')) }}"
                                    maxlength="255"
                                    required
                                ></x-inputs.text>
                            </div>
                            <div class="mt-6">
                                <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                                <select
                                    {{$editing ? 'disabled' : ''}}
                                    name="type"                                    
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"                                    
                                    required>                                                                      
                                    <option 
                                        value ="Non-Rigid"                                                                              
                                        {{$editing ? $tanker->type == "Non-Rigid" ? 'selected' : '' : 'selected'}}>
                                        Non-Rigid
                                    </option> 
                                    <option 
                                        value ="Rigid" 
                                        {{$editing ? $tanker->type == "Rigid" ? 'selected' : '' : ''}}>
                                        Rigid
                                    </option>
                                    <option 
                                        value ="Milk" 
                                        {{$editing ? $tanker->type == "Milk" ? 'selected' : '' : ''}}>
                                        Milk Reload
                                    </option>
                                    <option 
                                        value ="Food" 
                                        {{$editing ? $tanker->type == "Food" ? 'selected' : '' : ''}}>
                                        Food GP
                                    </option>
                                    <option 
                                        value ="Vacuum" 
                                        {{$editing ? $tanker->type == "Vacuum" ? 'selected' : '' : ''}}>
                                        Non-haz vacuum
                                    </option>
                                    <option 
                                        value ="Waste" 
                                        {{$editing ? $tanker->type == "Waste" ? 'selected' : '' : ''}}>
                                        ADR vacuum
                                    </option>
                                    <option 
                                        value ="Petrol" 
                                        {{$editing ? $tanker->type == "Petrol" ? 'selected' : '' : ''}}>
                                        ADR GP
                                    </option>
                                ></select>
                            </div>
                        </div>
                        
                        <div class="col-span-6 sm:col-span-3">
                            <div class="">
                                <label for="serial_num" class="block text-sm font-medium text-gray-700">Serial Number</label>
                                <x-inputs.text
                                    name="serial_num"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                    value="{{ old('serial_num', ($editing ? $tanker->serial_num : '')) }}"
                                    maxlength="255"
                                    required
                                ></x-inputs.text>
                            </div>
                            <div class="mt-6">
                                <label for="sector" class="block text-sm font-medium text-gray-700">Sector</label>
                                <x-inputs.text
                                    name="sector"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                    value="{{ old('sector', ($editing ? $tanker->sector : '')) }}"
                                    maxlength="255"
                                    required
                                ></x-inputs.text>
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
        <h3 class="text-lg font-medium leading-6 text-gray-900">Equipment Details</h3>
        <p class="mt-1 text-sm text-gray-600">
            We can add some notes/instructions here.
        </p>
        </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="grid grid-cols-6 gap-6 pb-6">
                    
                    <div class="col-span-6 sm:col-span-3">
                        <div class="">
                            <label for="equipment" class="block text-sm font-medium text-gray-700">Equipment</label>
                            <x-inputs.text 
                                name="equipment"
                                id="equipment"
                                value="{{ old('contact', ($editing ? $tanker->equipment : '')) }}"
                                maxlength="255"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                required
                            ></x-inputs.text>
                        </div>
                        <div class="mt-6">
                            <label for="make" class="block text-sm font-medium text-gray-700">Make</label>
                            <x-inputs.text 
                                name="make"
                                id="make"
                                value="{{ old('contact', ($editing ? $tanker->make : '')) }}"
                                maxlength="255"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                required
                            ></x-inputs.text>
                        </div>
                    </div>                    
                    <div class="col-span-6 sm:col-span-3">
                        <div class="">
                            <label for="chassis_num" class="block text-sm font-medium text-gray-700">Chassis Number</label>
                            <x-inputs.text 
                                name="chassis_num"
                                id="chassis_num"
                                value="{{ old('contact', ($editing ? $tanker->chassis_num : '')) }}"
                                maxlength="255"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                required
                            ></x-inputs.text>
                        </div>
                        <div class="mt-6">
                            <label for="replacement_value" class="block text-sm font-medium text-gray-700">Replacement Value</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">
                                    £
                                    </span>
                                </div>
                                <x-inputs.text
                                    name="replacement_value"
                                    value="{{ old('replacement_value', ($editing ? $tanker->replacement_value : '')) }}"
                                    maxlength="255"
                                    placeholder="Card Expiration Date"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 block py-2 w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0000.00" aria-describedby="price-currency"
                                    required
                                ></x-inputs.text>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if($editing && Auth::user()->isSuperAdmin())
<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Tanker Inspection</h3>
        <p class="mt-1 text-sm text-gray-600">
            Please mark any damage on the splat diagram.
        </p>
        </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="box-content rounded border-2 border-gray-300">
                    <a id = "left-side">
                        <img id="left-side-image" class="mx-auto" src="{{$tanker->ext_splat_left}}" alt="left-side-image">
                    </a>
                    <input 
                        
                    id = "left-side-image-form" name = 'ext_splat_left' hidden value = "{{$tanker->ext_splat_left}}"/>
                </div>
            </div>
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="box-content rounded border-2 border-gray-300">
                        <a id = "front-side"><img id="front-side-image" class="mx-auto" src="{{$tanker->ext_splat_front}}" alt="front-side-image"></a>
                    <input id = "front-side-image-form" name = 'ext_splat_front' hidden value = "{{$tanker->ext_splat_front}}" />
                </div>
            </div>

            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="box-content rounded border-2 border-gray-300">
                        <a id = "back-side"><img id="back-side-image" class="mx-auto" src="{{$tanker->ext_splat_rear}}" alt="back-side-image"></a>
                    <input
                         id = "back-side-image-form" name = 'ext_splat_rear' hidden
                        value = "{{$tanker->ext_splat_rear}}"
                    />
                </div>
            </div>

            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="box-content rounded border-2 border-gray-300">
                        <a id = "right-side"><img id="right-side-image" class="mx-auto" 
                            src="{{$tanker->ext_splat_right}}"
                            alt="right-side-image"></a>
                    <input
                         id = "right-side-image-form" name = 'ext_splat_right' hidden
                        value = "{{$tanker->ext_splat_right}}"
                    />
                </div>
            </div>

            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="box-content rounded border-2 border-gray-300">
                        <a id = "internal"><img id="internal-image" class="mx-auto" src="{{$tanker->int_splat}}" alt="internal-image"></a>
                    <input
                         id = "internal-image-form" name = 'int_splat' hidden
                        value = "{{$tanker->int_splat}}"
                    />
                </div>
            </div>
            <a
                href="javascript:void(0)"
                class="refresh bg-green-500 hover:bg-green-700  text-white py-1 px-4 rounded-md float-right mr-5"
            >                                
                <i class="icon ion-md-archive"></i>                    
                <span class="mr-1">Refresh</span>
            </a>

            <a
                href="javascript:void(0)"
                id="refurbishment_{{$tanker->id}}"
                class="refurbishment {{$tanker->archive ? 'bg-green-500 hover:bg-green-700' : 'bg-red-500 hover:bg-red-700'}}  text-white py-1 px-4 rounded-md float-right mr-5"
            >                                
                <i class="icon ion-md-archive"></i>                    
                <span class="refurbishment_title mr-1">{{!$tanker->archive ? 'Refurbishment' : 'Restore'}}</span>
            </a>
            
        </div>
    </div>
</div>

@endif
<script type="text/javascript">

    if ($('.form-date').prop('type') != "date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
    document.write('<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
    document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
    document.write('<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n')
    }
</script>
<script>
    jQuery(function($){ //on document.ready
        $('.form-date').datepicker({ dateFormat: 'yy-mm-dd' });
      })
    var image_saveUrl = '{{route("images.store")}}'
    var asset_url =  "{{env('ASSET_URL')}}/pixie"
    var csrf_token =  "{{ csrf_token() }}"
    var editing = "{{ $editing }}"
    var base_url = "{{ url('/') }}";
    var tanker_obj = {!! json_encode($tanker) !!};
</script>
<script src="{{ asset('js/tanker.js') }}"></script>
