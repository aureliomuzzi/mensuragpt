@extends('adminlte::page')

@section('title', 'Alternativas de Questões')

@section('content_header')
<h1 class="m-0 text-dark"><i class="fas fa-user-circle"></i> Cadastro de Alternativas de Questões
</h1>
@stop

@section('content')

<div class="row">
    <div class="col-lg -12 col-md-12">
        <div class="card">
            <div class="card-body">
                @include('includes.alerts')

                @if (!isset($alternativas))
	    			{!! Form::open(['url' => route('alternativa.store'), 'files' => true]) !!}
                @else
                    {!! Form::model($alternativas, ['route' => ['alternativa.update', $alternativas->id], 'method' => 'PUT', 'files' => true]) !!}
                @endif

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Cadastro de Questões</h3>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    {!! Form::label('questao_id', 'Questao') !!} <span class="obrigatorio">*</span>
                                    {!! Form::select('questao_id', $questoes, null, ['class' => 'form-control', 'required', 'placeholder' => 'Informe a Questão']) !!}
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="alternativa_A">Alternativa A</label>
                                    <input type="alternativa_A" id="alternativa_A" name="alternativa_A" placeholder="Alternativa A" class="form-control" value="{{ isset($alternativas) ? $alternativas->alternativa_A : null }}">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="alternativa_B">Alternativa B</label>
                                    <input type="alternativa_B" id="alternativa_B" name="alternativa_B" placeholder="Alternativa B" class="form-control" value="{{ isset($alternativas) ? $alternativas->alternativa_B : null }}">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="alternativa_C">Alternativa C</label>
                                    <input type="alternativa_C" id="alternativa_C" name="alternativa_C" placeholder="Alternativa C" class="form-control" value="{{ isset($alternativas) ? $alternativas->alternativa_C : null }}">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="alternativa_D">Alternativa D</label>
                                    <input type="alternativa_D" id="alternativa_D" name="alternativa_D" placeholder="Alternativa D" class="form-control" value="{{ isset($alternativas) ? $alternativas->alternativa_D : null }}">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="alternativa_E">Alternativa E</label>
                                    <input type="alternativa_E" id="alternativa_E" name="alternativa_E" placeholder="Alternativa E" class="form-control" value="{{ isset($alternativas) ? $alternativas->alternativa_E : null }}">
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>

                <div class="mt-5">
                    <button type="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> Salvar</button>
                    <a href="{{ route('alternativa.index') }}" class="btn btn-outline-danger"><i class="far fa-times-circle"></i> Cancelar</a>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop
