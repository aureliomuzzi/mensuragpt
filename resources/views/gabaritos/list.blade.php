@extends('adminlte::page')

@section('title', 'Gabarito de Questões')



@section('content_header')
    <h1 class="m-0 text-dark"><i class="fas fa-user-circle"></i>  Gabarito de Questões </h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        @include('includes.alerts')

        <div class="table-responsive">
            {{ $dataTable->table(['class'=>'table table-striped','style' => 'width: 100%']) }}
        </div>


    </div>
</div>

@stop

@push('js')
    {{ $dataTable->scripts() }}
@endpush
