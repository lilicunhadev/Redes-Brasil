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
          Editar
	    </a>
	</h1>
@endsection

@section('content')

<div class="card">
    <div class="card-body">

        <div class="form-group row">
            <div class="col-sm-3">
                <label>Nome do Instrutor:</label>
            </div>
            <div class="col-sm-9">
                <label style="color:grey;">{{$instrutor->nome}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3">
                <label>CPF:</label>
            </div>
            <div class="col-sm-9">
                <label style="color:grey;">{{$instrutor->cpf}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3">
                <label>RG:</label>
            </div>
            <div class="col-sm-9">
                <label style="color:grey;">{{$instrutor->rg}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3">
                <label>Passaporte:</label>
            </div>
            <div class="col-sm-9">
                <label style="color:grey;">{{$instrutor->passaporte}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3">
                <label>Endereço:</label>
            </div>
            <div class="col-sm-9">
                <label style="color:grey;">{{$instrutor->endereco}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3">
                <label>Aeroporto de Preferência:</label>
            </div>
            <div class="col-sm-9">
                <label style="color:grey;">{{$instrutor->aeroporto_preferencia}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3">
                <label>MikroTik:</label>
            </div>
            <div class="col-sm-9">
                <label style="color:grey;">{{$instrutor->mikrotik}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3">
                <label>Ubiquiti:</label>
            </div>
            <div class="col-sm-9">
                <label style="color:grey;">{{$instrutor->ubiquiti}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3">
                <label>Juniper:</label>
            </div>
            <div class="col-sm-9">
                <label style="color:grey;">{{$instrutor->juniper}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3">
                <label>VyOS:</label>
            </div>
            <div class="col-sm-9">
                <label style="color:grey;">{{$instrutor->vyos}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3">
                <label>Cisco:</label>
            </div>
            <div class="col-sm-9">
                <label style="color:grey;">{{$instrutor->cisco}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3">
                <label>Linux:</label>
            </div>
            <div class="col-sm-9">
                <label style="color:grey;">{{$instrutor->linux}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3">
                <label>Fibra Óptica:</label>
            </div>
            <div class="col-sm-9">
                <label style="color:grey;">{{$instrutor->fibra_optica}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3">
                <label>EAD:</label>
            </div>
            <div class="col-sm-9">
                <label style="color:grey;">{{$instrutor->ead}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3">
                <label>Observação:</label>
            </div>
            <div class="col-sm-9">
                <label style="color:grey;">{{$instrutor->observacao}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3">
                <label>Assinatura:</label>
            </div>
            @if ($instrutor->assinatura)
                <img src="{{$instrutor->assinatura}}" style="height: 150px; border: 2px solid darkgrey;">
            @endif
        </div>

    </div>
</div>

@endsection