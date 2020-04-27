@extends('adminlte::page')

@section('title', 'Visualizar Curso')

@section('content_header')
    <link href="{{ asset('css/uppercase.css') }}" rel="stylesheet">
    <link href="{{ asset('css/form-modulos.css') }}" rel="stylesheet">
    <h1>
		{{$curso->nome}}
		&nbsp;&nbsp;
        <a href="{{ route('cursos.edit', ['curso' => $curso->id]) }}"
             class="btn btn-sm btn-success">
	  	Editar Curso
	</a>  
	</h1>
@endsection

@section('content')

<div class="card">
    <div class="card-body">

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Ano</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$curso->ano}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Mês</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$curso->mes}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Dia</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$curso->dia}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Agenda Treinamento</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$curso->agenda_treinamento}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Nome do Curso</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$curso->nome}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Quantidade de dias</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$curso->qtde_dias}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Cidade</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$curso->cidade}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Estado</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$curso->uf}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Local</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$curso->local}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Instrutor</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$curso->instrutor}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Módulo</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$curso->modulo}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Modalidade</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$curso->modalidade}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Máximo de Alunos</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$curso->max_alunos}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Inscritos</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$curso->inscritos}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Confirmados</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$curso->confirmados}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Pagos</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$curso->pago}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Refaça</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$curso->refaca}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Cortesia</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$curso->cortesia}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Finalizado</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$curso->finalizado}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Observação</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$curso->observacao}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Campanhas Ativas</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$curso->campanhas_ativas}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label>Início</label>
            </div>
            <div class="col-sm-8">
                <label style="color:blue;">{{$curso->inicio}}</label>
            </div>
        </div>
        
    </div>
</div>

@endsection