@extends('adminlte::page')

@section('title', 'Visualizar Instrutor')

@section('content_header')
    <link href="{{ asset('css/uppercase.css') }}" rel="stylesheet">
    <link href="{{ asset('css/form-modulos.css') }}" rel="stylesheet">
    <h1>
		{{$instrutor->nome}}
		&nbsp;&nbsp;
        <a href="{{ route('instrutores.edit', $instrutor->id) }}"
             class="btn btn-sm btn-success">
	  	Editar Instrutor
	</a>  
	</h1>
@endsection

@section('content')

<div class="card">
    <div class="card-body">

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Nome do Instrutor</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$instrutor->nome}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>MikroTik:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$instrutor->mikrotik}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Ubiquiti:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$instrutor->ubiquiti}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Juniper:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$instrutor->juniper}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>VyOS:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$instrutor->vyos}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Cisco:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$instrutor->cisco}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Linux:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$instrutor->linux}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Fibra Óptica:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$instrutor->fibra_optica}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>EAD:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$instrutor->ead}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Endereço:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$instrutor->endereco}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>CPF:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$instrutor->cpf}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>RG:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$instrutor->rg}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Passaporte:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$instrutor->passaporte}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Aeroporto de Preferência:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$instrutor->aeroportp_preferencia}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Observação:</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$instrutor->observacao}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Assinatura:</label>
            </div>
            
        </div>


    </div>
</div>

@endsection