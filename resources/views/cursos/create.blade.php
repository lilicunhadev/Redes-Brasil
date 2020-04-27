@extends('adminlte::page')

@section('title', 'Novo Curso')

@section('content_header')
    <link href="{{ asset('css/form-modulos.css') }}" rel="stylesheet">
    <h1>Novo Curso</h1>
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

            <form action="{{route('cursos.store')}}" method="POST" class="form-horizontal">
            <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}" />
            @csrf

            <div class="form-group row">
                <div class="col-sm-6">
                    <label>Ano</label>
                    <input type="text" name="ano" value="{{old('ano')}}" 
                        	   class="upper form-control @error('ano') is-invalid @enderror" />
                </div>

                <div class="col-sm-6">
                    <label>Mês</label>
                    <input type="text" name="mes" value="{{old('mes')}}" 
                        	   class="upper form-control @error('mes') is-invalid @enderror" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label>Dia</label>
                    <input type="text" name="dia" value="{{old('dia')}}" 
                        	   class="upper form-control @error('dia') is-invalid @enderror" />
                </div>
                <div class="col-sm-6">
                    <label>Agenda de treinamento</label>
                    <input type="text" name="agenda_treinamento" value="{{old('agenda_treinamento')}}" 
                        	   class="upper form-control @error('agenda_treinamento') is-invalid @enderror" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label>Nome</label>
                    <input type="text" name="nome" value="{{old('nome')}}" 
                        	   class="upper form-control @error('nome') is-invalid @enderror" />
                </div>
                <div class="col-sm-6">
                    <label>Quantidade de dias</label>
                    <input type="text" name="qtde_dias" value="{{old('qtde_dias')}}" 
                        	   class="upper form-control @error('qtde_dias') is-invalid @enderror" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label class="col-sm-2 col-form-label">Estado</label>
                    <select id="uf" onchange="return buscarMunicipios();" name="uf" type="text" class="form-control upper @error('uf') is-invalid @enderror" required>
                        <option value="" selected disabled>Selecione</option>
                        @foreach($states as $state)
                            <option value="{{$state->id }}" {{ old('uf') == $state->id ? 'selected' : '' }}>{!!$state->title!!}</option>
                        @endforeach
                   </select>
                </div>
                <div class="col-sm-6">
                    <label class="col-sm-2 col-form-label">Cidade</label>
                    <select id="cidade" disabled name="cidade" type="text" class="form-control upper @error('cidade') is-invalid @enderror" required>
                   </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label>Local</label>
                    <input type="text" name="local" value="{{old('local')}}" 
                        	   class="upper form-control @error('local') is-invalid @enderror" />
                </div>
                <div class="col-sm-6">
                    <label>Instrutor</label>
                    <input type="text" name="instrutor" value="{{old('instrutor')}}" 
                        	   class="upper form-control @error('instrutor') is-invalid @enderror" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label>Módulo</label>
                    <select id="modulo" name="modulo" type="text" class="form-control upper @error('modulo') is-invalid @enderror" required>
                        <option value="" selected disabled>Selecione</option>
                    @foreach($modulos as $modulo)
                            <option value="{{$modulo->id }}" {{ old('uf') == $modulo->id ? 'selected' : '' }}>{!!$modulo->nome!!}</option>
                    @endforeach
                    </select>
                    
                </div>
                <div class="col-sm-6">
                    <label>Modalidade</label>
                    <input type="text" name="modalidade" value="{{old('modalidade')}}" 
                        	   class="upper form-control @error('modalidade') is-invalid @enderror" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label>Máximo de alunos</label>
                    <input type="text" name="max_alunos" value="{{old('max_alunos')}}" 
                        	   class="upper form-control @error('max_alunos') is-invalid @enderror" />
                </div>
                <div class="col-sm-6">
                    <label>Inscritos</label>
                    <input type="text" name="inscritos" value="{{old('inscritos')}}" 
                        	   class="upper form-control @error('inscritos') is-invalid @enderror" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label>Confirmados</label>
                    <input type="text" name="confirmados" value="{{old('confirmados')}}" 
                        	   class="upper form-control @error('confirmados') is-invalid @enderror" />
                </div>
                <div class="col-sm-6">
                    <label>Pagos</label>
                    <input type="text" name="pago" value="{{old('pago')}}" 
                        	   class="upper form-control @error('pago') is-invalid @enderror" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label>Refaça</label>
                    <input type="text" name="refaca" value="{{old('refaca')}}" 
                        	   class="upper form-control @error('refaca') is-invalid @enderror" />
                </div>
                <div class="col-sm-6">
                    <label>Cortesia</label>
                    <input type="text" name="cortesia" value="{{old('cortesia')}}" 
                        	   class="upper form-control @error('cortesia') is-invalid @enderror" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label>Finalizado</label>
                    <input type="text" name="finalizado" value="{{old('finalizado')}}" 
                        	   class="upper form-control @error('finalizado') is-invalid @enderror" />
                </div>
                <div class="col-sm-6">
                    <label>Observação</label>
                    <input type="text" name="observacao" value="{{old('observacao')}}" 
                        	   class="upper form-control @error('observacao') is-invalid @enderror" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label>Campanhas ativas</label>
                    <input type="text" name="campanhas_ativas" value="{{old('campanhas_ativas')}}" 
                        	   class="upper form-control @error('campanhas_ativas') is-invalid @enderror" />
                </div>
                <div class="col-sm-6">
                    <label>Início</label>
                    <input type="text" name="inicio" value="{{old('inicio')}}" 
                        	   class="upper form-control @error('inicio') is-invalid @enderror" />
                </div>
            </div>

            </br>
            <div class="form-group row center">
                    <input type="submit" value="Cadastrar Curso" class="btn btn-success" />
            </div>

            </form>

        </div>
    </div>

@endsection
<script type="text/javascript" src="{{ asset('js/cadastros/clientes.js') }}"></script>