@extends('adminlte::page')

@section('title', 'Editar Módulo')

@section('content_header')
    <link href="{{ asset('css/form-modulos.css') }}" rel="stylesheet">
    <h1>Editar Módulo</h1>
@endsection

@section('content')

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>    
            <h5>
                <i class="icon fas fa-ban"></i>
                Ocorreram um ou mais erros:
            </h5>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <div class="card">

        <div class="card-body">
        
            <form action="{{route('modulos.update', ['modulo'=>$modulo->id])}}" method="POST" class="form-horizontal">
            <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}" />
                @method('PUT')
                @csrf

                <div class="form-group row">
                <div class="col-sm-6">
                    <label>Nome do Módulo</label>
                    <input type="text" name="nome" value="{{$modulo->nome}}" 
                        	   class="upper form-control @error('nome') is-invalid @enderror" />
                </div>

                <div class="col-sm-6">
                    <label>Modalidade</label>
                    <select id="modalidade" name="modalidade" class="form-control upper @error('modalidade') is-invalid @enderror">
                            <option value="" selected disabled>Selecione</option>
                            <option value="PRESENCIAL" <?php if ($modulo->modalidade == 'PRESENCIAL') { ?>selected="true" <?php }; ?>>PRESENCIAL</option>
                            <option value="EAD" <?php if ($modulo->modalidade == 'EAD') { ?>selected="true" <?php }; ?>>EAD</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label>Oficial</label>
                    <select id="oficial" name="oficial" class="form-control upper @error('oficial') is-invalid @enderror">
                            <option value="" selected disabled>Selecione</option>
                            <option value="SIM" <?php if ($modulo->oficial == 'SIM') { ?>selected="true" <?php }; ?>>SIM</option>
                            <option value="NÃO" <?php if ($modulo->oficial == 'NÃO') { ?>selected="true" <?php }; ?>>NÃO</option>
                    </select>
                </div>

                <div class="col-sm-6">
                    <label>Horas</label>
                    <input type="text" name="horas" value="{{$modulo->horas}}" 
                            class="upper form-control @error('horas') is-invalid @enderror" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label>Prova Cert.</label>
                    <select id="prova_cert" name="prova_cert" class="form-control upper @error('prova_cert') is-invalid @enderror">
                            <option value="" selected disabled>Selecione</option>
                            <option value="SIM" <?php if ($modulo->prova_cert == 'SIM') { ?>selected="true" <?php }; ?>>SIM</option>
                            <option value="NÃO" <?php if ($modulo->prova_cert == 'NÃO') { ?>selected="true" <?php }; ?>>NÃO</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label>Valor sugerido</label>
                    <input type="text" name="valor_sugerido" value="{{$modulo->valor_sugerido}}" 
                        	   class="upper form-control @error('valor_sugerido') is-invalid @enderror" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label>Máximo de alunos</label>
                    <input type="text" name="max_alunos" value="{{$modulo->max_alunos}}" 
                        	   class="upper form-control @error('max_alunos') is-invalid @enderror" />
                </div>
                <div class="col-sm-6">
                    <label>Observação</label>
                    <input type="text" name="observacao" value="{{$modulo->observacao}}" 
                        	   class="upper form-control" />
                </div>
            </div>

            </br>

            <div class="form-group row center">
                <input type="submit" value="Salvar" class="btn btn-success" />
            </div>

            </form>
        </div>
    </div>

@endsection
