@extends('adminlte::page')

@section('title', 'Novo Módulo')

@section('content_header')
    <link href="{{ asset('css/form-modulos.css') }}" rel="stylesheet">
    <h1>Novo Módulo</h1>
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

            <form action="{{route('modulos.store')}}" method="POST" class="form-horizontal">
            <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}" />
            @csrf

            <div class="form-group row">
                <div class="col-sm-6">
                    <label>Nome do Módulo</label>
                    <input type="text" name="nome" value="{{old('nome')}}" 
                        	   class="upper form-control @error('nome') is-invalid @enderror" />
                </div>

                <div class="col-sm-6">
                    <label>Modalidade</label>
                    <select id="modalidade" name="modalidade" class="form-control upper @error('modalidade') is-invalid @enderror">
                            <option value="" selected disabled>Selecione</option>
                            <option value="PRESENCIAL" <?php if (old('modalidade') == 'PRESENCIAL') { ?>selected="true" <?php }; ?>>PRESENCIAL</option>
                            <option value="EAD" <?php if (old('modalidade') == 'EAD') { ?>selected="true" <?php }; ?>>EAD</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label>Oficial</label>
                    <select id="oficial" name="oficial" class="form-control upper @error('oficial') is-invalid @enderror">
                            <option value="" selected disabled>Selecione</option>
                            <option value="SIM" <?php if (old('oficial') == 'SIM') { ?>selected="true" <?php }; ?>>SIM</option>
                            <option value="NÃO" <?php if (old('oficial') == 'NÃO') { ?>selected="true" <?php }; ?>>NÃO</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label>Horas</label>
                    <input type="text" name="horas" value="{{old('horas')}}" 
                        	   class="upper form-control @error('horas') is-invalid @enderror" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label>Prova de Certificação</label>
                    <select id="prova_cert" name="prova_cert" class="form-control upper @error('prova_cert') is-invalid @enderror">
                            <option value="" selected disabled>Selecione</option>
                            <option value="SIM" <?php if (old('prova_cert') == 'SIM') { ?>selected="true" <?php }; ?>>SIM</option>
                            <option value="NÃO" <?php if (old('prova_cert') == 'NÃO') { ?>selected="true" <?php }; ?>>NÃO</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label>Valor sugerido</label>
                    <input type="text" name="valor_sugerido" value="{{old('valor_sugerido')}}" 
                        	   class="upper form-control @error('valor_sugerido') is-invalid @enderror" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label>Máximo de alunos</label>
                    <input type="text" name="max_alunos" value="{{old('max_alunos')}}" 
                        	   class="upper form-control @error('max_alunos') is-invalid @enderror" />
                </div>
                <div class="col-sm-6">
                    <label>Observação</label>
                    <input type="text" name="observacao" value="{{old('observacao')}}" 
                        	   class="upper form-control" />
                </div>
            </div>

            </br>

            <div class="form-group row center">
                    <input type="submit" value="Cadastrar Módulo" class="btn btn-success" />
            </div>

            </form>

        </div>
    </div>

@endsection