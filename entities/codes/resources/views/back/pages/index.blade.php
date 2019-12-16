@extends('admin::back.layouts.app')

@php
    $title = 'Коды';
@endphp

@section('title', $title)

@section('content')

    @push('breadcrumbs')
        @include('admin.module.codes-package.codes::back.partials.breadcrumbs.index')
    @endpush

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <a href="{{ route('back.codes-package.codes.create') }}" class="btn btn-sm btn-primary btn-lg">Добавить</a>
                        <div class="ibox-tools">
                            <a href="{{ route('back.codes-package.codes.export') }}" class="btn btn-primary btn-sm">Экспорт</a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            {{ $table->table(['class' => 'table table-striped table-bordered table-hover dataTable']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@pushonce('scripts:datatables_codes_index')
    {!! $table->scripts() !!}
@endpushonce
