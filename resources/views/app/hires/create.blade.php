@extends('layouts.app')
@section('content')

<main class="-mt-28 pb-8">
    <section aria-labelledby="hire-contract">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <x-slot name="title">
                <a href="{{ route('hires.index') }}" class="mr-4"
                    ><i class="mr-1 icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.hires.create_title')
            </x-slot>

            <form method="POST" role="form" action="{{ route('hires.store') }}" class="mt-4" id="hire_create_form">
                {{ csrf_field() }}
                @include('app.hires.form-inputs')
                <div class="mt-10">
                    <a href="{{ route('hires.index') }}" class="button">
                        <i class="mr-1 icon ion-md-return-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>                    
                    <button type="submit" class="button button-primary float-right border-none">
                        <i class="mr-1 icon ion-md-save"></i>
                        @lang('crud.common.create')
                    </button>
                    <a id="abort_btn" class="bg-orange-500 hover:bg-orange-700 text-white py-1 px-4 rounded-md float-right mr-5 cursor-pointer">
                        <i class="mr-1 icon ion-md-refresh text-primary"></i>
                        @lang('crud.common.clear')
                    </a>
                </div>
            </form>
        </div>
    </section>
</main>
@endsection
<script type="text/javascript">
    var user = {!! json_encode(auth()->user()) !!}
</script>
