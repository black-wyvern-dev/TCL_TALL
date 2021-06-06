@extends('layouts.app')

@section('content')

<main class="-mt-28 pb-8">
    <section aria-labelledby="hire-contract">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <x-slot name="title">
                <a href="{{ route('check-list-vacuums.index') }}" class="mr-4"
                    ><i class="mr-1 icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.check_list_vacuums.create_title')
            </x-slot>

            <form
                method="POST"
                action="{{ route('check-list-vacuums.store') }}"
                role="form"
                class="mt-4"
                enctype="multipart/form-data"
                id="check-list-vacuums-form"
            >
                <div class="mb-10 rounded-lg bg-white overflow-hidden shadow">
                    <h2 class="sr-only" id="profile-overview-title">Hire Contract</h2>
                    <div class="bg-white p-6">
                    <div class="sm:flex sm:items-center sm:justify-between">
                        <div class="sm:flex sm:space-x-5">
                        <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
                            <p class="text-sm font-medium text-gray-600">TCL Tankers</p>
                            <p class="text-xl font-bold text-gray-900 sm:text-2xl">{{ $check_type }} Hire Checklist</p>
                            <p class="text-sm font-medium text-gray-400">To be completed by TCL and customer upon collection.</p>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                @include('app.check_list_vacuums.form-inputs')
                <div class="mt-10">
                    <a href="{{ route('hires.index') }}" class="button">
                        <i class="mr-1 icon ion-md-return-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>
                    <button type="submit" class="button button-primary float-right">
                        <i class="mr-1 icon ion-md-save"></i>
                        @lang('crud.common.create')
                    </button>
                    <a href="{{route('hires.edit', ['hire' => $hire])}}" id="abort_vacuum_btn" class="bg-orange-500 hover:bg-orange-700 text-white py-1 px-4 rounded-md float-right mr-5 cursor-pointer">
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
