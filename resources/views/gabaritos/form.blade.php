@extends('adminlte::page')

@section('title', 'Gabarito de Questões')

@section('content_header')
<h1 class="m-0 text-dark"><i class="fas fa-user-circle"></i> Gabarito de Questões
</h1>
@stop

@section('content')

<div class="row">
    <div class="col-lg -12 col-md-12">
        <div class="card">
            <div class="card-body">
                @include('includes.alerts')

                @if (!isset($gabaritos))
	    			{!! Form::open(['url' => route('templates.store'), 'files' => true]) !!}
                @else
                    {!! Form::model($gabaritos, ['route' => ['templates.update', $gabaritos->id], 'method' => 'PUT', 'files' => true]) !!}
                @endif

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Cadastro de Gabaritos</h3>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    {!! Form::label('questao_id', 'Enunciado') !!} <span class="obrigatorio">*</span>
                                    {!! Form::select('questao_id', $enunciado, null, ['class' => 'form-control', 'required', 'placeholder' => 'Selecione a Questão']) !!}
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="resposta_correta">Resposta Correta</label>
                                    <input type="resposta_correta" id="resposta_correta" name="resposta_correta" placeholder="Resposta Correta" class="form-control" value="{{ isset($gabaritos) ? $gabaritos->resposta_correta : null }}">
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>

                <div class="mt-5">
                    <button type="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> Salvar</button>
                    <a href="{{ route('templates.index') }}" class="btn btn-outline-danger"><i class="far fa-times-circle"></i> Cancelar</a>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop
