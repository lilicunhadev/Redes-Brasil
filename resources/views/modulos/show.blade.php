@extends('adminlte::page')

@section('title', 'Visualizar Módulo')

@section('content_header')
    <link href="{{ asset('css/uppercase.css') }}" rel="stylesheet">
    <link href="{{ asset('css/form-modulos.css') }}" rel="stylesheet">
    <h1>
		{{$modulo->nome}}
		&nbsp;&nbsp;
        <a href="{{ route('modulos.edit', ['modulo' => $modulo->id]) }}"
             class="btn btn-sm btn-success">
	  	Editar Módulo
	</a>  
	</h1>
@endsection

@section('content')

<div class="card">
    <div class="card-body">

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Nome do Módulo</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$modulo->nome}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Modalidade:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$modulo->modalidade}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Oficial:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$modulo->oficial}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Horas:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$modulo->horas}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Prova Certificação:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$modulo->prova_cert}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Valor sugerido:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$modulo->valor_sugerido}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Máximo de alunos:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$modulo->max_alunos}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Observação:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$modulo->observacao}}</label>
            </div>
        </div>

    </div>
</div>

@endsection