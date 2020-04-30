@extends('adminlte::page')

@section('title', 'Visualizar Parâmetro')

@section('content_header')
    <link href="{{ asset('css/uppercase.css') }}" rel="stylesheet">
    <link href="{{ asset('css/form-modulos.css') }}" rel="stylesheet">
    <h1>
		{{$parametro->parametro}}
		&nbsp;&nbsp;
        <a href="{{ route('parametros.edit', ['parametro' => $parametro->id]) }}"
             class="btn btn-sm btn-success">
	  	Editar Parâmetro
	</a>  
	</h1>
@endsection

@section('content')

<div class="card">
    <div class="card-body">

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Parâmetro</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$parametro->parametro}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Descrição</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$parametro->descricao}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Status</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$parametro->status}}</label>
            </div>
        </div>

    </div>
</div>

@endsection