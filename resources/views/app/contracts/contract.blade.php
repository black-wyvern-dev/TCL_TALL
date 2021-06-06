@extends('layouts.app')

@section('content')
<main class="-mt-28 pb-8">
    <section aria-labelledby="hire-contract">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <x-slot name="title">
                @lang('crud.contracts.title')
            </x-slot>
            
            <x-form
                method="PUT"
                action="{{ route('contract.store', $hire) }}"
                class="mt-4"
            >
                @include('app.contracts.form-inputs')
                <div class="mt-10">
                    <button type="submit" class="button button-primary float-right">
                        <i class="mr-1 icon ion-md-save"></i>
                        @lang('crud.common.sign')
                    </button>
                </div>
            </x-form>
        </div>
    </section>
</main>
@endsection
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
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
    
    var image_saveUrl = '{{route("images.store")}}'
    var asset_url =  "{{env('ASSET_URL')}}/pixie"
    var csrf_token =  "{{ csrf_token() }}"
    var editing = true
    jQuery(function($){ //on document.ready
        $('.form-date').datepicker({ dateFormat: 'yy-mm-dd' });
    })
    var hirer_signature = "{{ ($hire->hirer_signature && str_contains($hire->hirer_signature, '/')) ? $hire->hirer_signature : '/img/sign.png'}}"
</script>
<script src="{{ asset('js/contract.js') }}"></script>