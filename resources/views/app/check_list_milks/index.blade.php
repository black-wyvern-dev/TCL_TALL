@extends('layouts.app')

@section('content')
<div class="mx-auto px-4 md:px-6">
    <x-partials.card>
        <div class="flex justify-between">
            <x-slot name="title">
                @lang('crud.check_list_milks.index_title')
            </x-slot>
        </div>

        <div class="mt-4 mb-5">
            <div class="flex flex-wrap">
                <div class="md:w-1/2">
                    <form>
                        <div class="flex items-stretch w-full">
                            <x-inputs.text
                                id="indexSearch"
                                name="search"
                                value="{{ $search ?? '' }}"
                                placeholder="{{ __('crud.common.search') }}"
                                autocomplete="off"
                            ></x-inputs.text>

                            <div class="ml-1">
                                <button
                                    type="submit"
                                    class="button button-primary"
                                >
                                    <i class="icon ion-md-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="md:w-1/2 text-right">
                    @can('create', App\Models\CheckListMilk::class)
                    <a
                        href="{{ route('check-list-milks.create') }}"
                        class="button button-primary"
                    >
                        <i class="mr-1 icon ion-md-add"></i>
                        @lang('crud.common.create')
                    </a>
                    @endcan
                </div>
            </div>
        </div>

        <div class="block w-full overflow-auto scrolling-touch">
            <table class="w-full max-w-full mb-4 bg-transparent">
                <thead>
                    <tr>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_milks.inputs.checklist_type')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_milks.inputs.status')
                        </th>                        
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_milks.inputs.hirer_name')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_milks.inputs.hirer_position')
                        </th>                       
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_milks.inputs.tcl_name')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_milks.inputs.tcl_position')
                        </th>                                                
                        <th class="px-4 py-3 text-center">
                            @lang('crud.common.actions')
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($checkListMilks as $checkListMilk)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-left">
                            {{ $checkListMilk->checklist_type ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListMilk->status ?? '-' }}
                        </td>                        
                        <td class="px-4 py-3 text-left">
                            {{ $checkListMilk->hirer_name ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListMilk->hirer_position ?? '-' }}
                        </td>
                        
                        <td class="px-4 py-3 text-left">
                            {{ $checkListMilk->tcl_name ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListMilk->tcl_position ?? '-' }}
                        </td>                                                
                        <td class="px-4 py-3 text-center" style="width: 134px;">
                            <div
                                role="group"
                                aria-label="Row Actions"
                                class="relative inline-flex align-middle"
                            >
                                @can('update', $checkListMilk)
                                <a
                                    href="{{ route('check-list-milks.edit', $checkListMilk) }}"
                                    class="mr-1"
                                >
                                    <button type="button" class="button">
                                        <i class="icon ion-md-create"></i>
                                    </button>
                                </a>
                                @endcan @can('view', $checkListMilk)
                                <a
                                    href="{{ route('check-list-milks.show', $checkListMilk) }}"
                                    class="mr-1"
                                >
                                    <button type="button" class="button">
                                        <i class="icon ion-md-eye"></i>
                                    </button>
                                </a>
                                @endcan @can('delete', $checkListMilk)
                                <form
                                    action="{{ route('check-list-milks.destroy', $checkListMilk) }}"
                                    method="POST"
                                    onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                >
                                    @csrf @method('DELETE')
                                    <button type="submit" class="button">
                                        <i
                                            class="icon ion-md-trash text-red-600"
                                        ></i>
                                    </button>
                                </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="41">
                            @lang('crud.common.no_items_found')
                        </td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td class="pt-10" colspan="41">
                            {!! $checkListMilks->render() !!}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </x-partials.card>
</div>
@endsection
