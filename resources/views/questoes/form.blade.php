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
	    			{!! Form::open(['url' => route('questions.store'), 'files' => true]) !!}
                @else
                    {!! Form::model($questoes, ['route' => ['questions.update', $questoes->id], 'method' => 'PUT', 'files' => true]) !!}
                @endif

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Cadastro de Questões</h3>
                            </div>
                            <div class="card-body">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="categoria_id">Categoria</label> <span class="obrigatorio">*</span>
                                        <select name="categoria_id" id="categoria_id" class="form-control" required>
                                            <option value="" disabled selected>Informe a Categoria</option>
                                            <?php foreach($categorias as $key => $value): ?>
                                                <option value="<?= $key ?>"><?= $value ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="enunciado">Enunciado da Questão</label>
                                        <textarea type="enunciado" id="enunciado" name="enunciado" rows="5" cols="33" class="form-control" value="{{ isset($questoes) ? $questoes->enunciado : null }}"> </textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>

                <div class="mt-5">
                    <button type="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> Salvar</button>
                    <a href="{{ route('questions.index') }}" class="btn btn-outline-danger"><i class="far fa-times-circle"></i> Cancelar</a>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop
