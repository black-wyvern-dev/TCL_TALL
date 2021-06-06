@extends('layouts.app')

@section('content')
<div class="mx-auto px-4 md:px-6">
    <x-partials.card>
        <x-slot name="title">
            <a href="{{ route('check-list-milks.index') }}" class="mr-4"
                ><i class="mr-1 icon ion-md-arrow-back"></i
            ></a>
            @lang('crud.check_list_milks.show_title')
        </x-slot>

        <div class="mt-4">
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_milks.inputs.checklist_type')
                </h5>
                <span>{{ $checkListNr->checklist_type ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_milks.inputs.status')
                </h5>
                <span>{{ $checkListNr->status ?? '-' }}</span>
            </div>            
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_milks.inputs.hirer_name')
                </h5>
                <span>{{ $checkListNr->hirer_name ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_milks.inputs.hirer_position')
                </h5>
                <span>{{ $checkListNr->hirer_position ?? '-' }}</span>
            </div>            
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_milks.inputs.tcl_name')
                </h5>
                <span>{{ $checkListNr->tcl_name ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_milks.inputs.tcl_position')
                </h5>
                <span>{{ $checkListNr->tcl_position ?? '-' }}</span>
            </div>            
        </div>

        <div class="mt-10">
            <a href="{{ route('check-list-milks.index') }}" class="button">
                <i class="mr-1 icon ion-md-return-left"></i>
                @lang('crud.common.back')
            </a>

            @can('create', App\Models\CheckListNr::class)
            <a href="{{ route('check-list-milks.create') }}" class="button">
                <i class="mr-1 icon ion-md-add"></i> @lang('crud.common.create')
            </a>
            @endcan
        </div>
    </x-partials.card>
</div>
@endsection
