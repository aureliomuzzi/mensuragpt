@extends('adminlte::page')

@section('title', 'Enunciado de Questões')

@section('content_header')
<h1 class="m-0 text-dark"><i class="fas fa-user-circle"></i> Enunciado de Questões
</h1>
@stop

@section('content')

<div class="row">
    <div class="col-lg -12 col-md-12">
        <div class="card">
            <div class="card-body">
                @include('includes.alerts')

                @if (!isset($questoes))
	    			{!! Form::open(['url' => route('questao.store'), 'files' => true]) !!}
                @else
                    {!! Form::model($questoes, ['route' => ['questao.update', $questoes->id], 'method' => 'PUT', 'files' => true]) !!}
                @endif

                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Cadastro de Questões</h3>
                            </div>
                            <div class="card-body">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('categoria_id', 'Categoria') !!} <span class="obrigatorio">*</span>
                                        {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control', 'required', 'placeholder' => 'Informe a Categoria']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('enunciado', 'Enunciado') !!} <span class="obrigatorio">*</span>
                                        {!! Form::textarea('enunciado', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Alternativas de Resposta</h3>
                            </div>
                            <div class="card-body">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('alternativa_A', 'Alternativa A') !!} <span class="obrigatorio">*</span>
                                        {!! Form::text('alternativa_A', null, ['class' => 'form-control', 'required']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('alternativa_B', 'Alternativa B') !!} <span class="obrigatorio">*</span>
                                        {!! Form::text('alternativa_B', null, ['class' => 'form-control', 'required']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('alternativa_C', 'Alternativa C') !!} <span class="obrigatorio">*</span>
                                        {!! Form::text('alternativa_C', null, ['class' => 'form-control', 'required']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('alternativa_D', 'Alternativa D') !!} <span class="obrigatorio">*</span>
                                        {!! Form::text('alternativa_D', null, ['class' => 'form-control', 'required']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('alternativa_E', 'Alternativa E') !!} <span class="obrigatorio">*</span>
                                        {!! Form::text('alternativa_E', null, ['class' => 'form-control', 'required']) !!}
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>

                <div class="mt-5">
                    <button type="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> Salvar</button>
                    <a href="{{ route('questao.index') }}" class="btn btn-outline-danger"><i class="far fa-times-circle"></i> Cancelar</a>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop
