@extends('adminlte::page')

@section('title', 'Visualizar Cliente')

@section('content_header')
    <link href="{{ asset('css/uppercase.css') }}" rel="stylesheet">
    <link href="{{ asset('css/form-cliente.css') }}" rel="stylesheet">
    <h1>
		{{$client->nome}}
		&nbsp;&nbsp;
        <a href="{{ route('clients.edit', ['client' => $client->id]) }}"
             class="btn btn-sm btn-success">
	  	Editar Cliente
	</a>  
	</h1>
@endsection

@section('content')

<div class="card">
    <div class="card-body">

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Nome:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$client->nome}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Tipo de Pessoa:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$client->tipo_pessoa}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>País:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$client->pais}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>CEP:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$client->cep}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Endereço:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$client->endereco}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Bairro:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$client->bairro}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Estado:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$client->state->title}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Cidade:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$client->state->title}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Telefone:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$client->telefone}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Celular:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$client->celular}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>E-mail:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$client->email}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Empresa:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$client->empresa}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>CPF /CNPJ:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$client->cpf_cnpj}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Tipo de Cliente:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$client->tipo_cliente}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Onde nos Encontrou:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$client->onde_nos_encontrou}}</label>
            </div>
        </div>
    </div>
</div>

@endsection