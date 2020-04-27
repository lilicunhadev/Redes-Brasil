@extends('adminlte::page')

@section('title', 'Editar Curso')

@section('content_header')
    <link href="{{ asset('css/form-modulos.css') }}" rel="stylesheet">
    <h1>Editar Curso</h1>
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
        
            <form action="{{route('cursos.update', ['curso'=>$curso->id])}}" method="POST" class="form-horizontal">
            <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}" />
                @method('PUT')
                @csrf

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>Ano</label>
                        <input type="text" name="ano" value="{{$curso->ano}}" 
                                   class="upper form-control @error('ano') is-invalid @enderror" />
                    </div>
    
                    <div class="col-sm-6">
                        <label>Mês</label>
                        <input type="text" name="mes" value="{{$curso->mes}}" 
                                   class="upper form-control @error('mes') is-invalid @enderror" />
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>Dia</label>
                        <input type="text" name="dia" value="{{$curso->dia}}" 
                                   class="upper form-control @error('dia') is-invalid @enderror" />
                    </div>
                    <div class="col-sm-6">
                        <label>Agenda Treinamento</label>
                        <input type="text" name="agenda_treinamento" value="{{$curso->agenda_treinamento}}" 
                                   class="upper form-control @error('agenda_treinamento') is-invalid @enderror" />
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>Nome do Curso</label>
                        <input type="text" name="nome" value="{{$curso->nome}}" 
                                   class="upper form-control @error('nome') is-invalid @enderror" />
                    </div>
                    <div class="col-sm-6">
                        <label>Quantidade de dias</label>
                        <input type="text" name="qtde_dias" value="{{$curso->qtde_dias}}" 
                                   class="upper form-control @error('qtde_dias') is-invalid @enderror" />
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="col-sm-2 col-form-label">Estado</label>
                        <select id="uf" onchange="return buscarMunicipios();" name="uf" type="text" class="form-control upper @error('uf') is-invalid @enderror" required>
                            <option value="" selected >Selecione</option>
                            @foreach($states as $state)
                                <option value="{{$state->id}}" {{ $curso->uf == $state->id ? 'selected' : '' }}>{!!$state->title!!}</option>
                            @endforeach
                       </select>
                    </div>
                    <div class="col-sm-6">
                        <label class="col-sm-2 col-form-label">Cidade</label>
                        <select id="cidade" name="cidade" type="text" class="form-control upper @error('cidade') is-invalid @enderror" required>
                        @foreach($cities as $cidade)    
                            <option value="{{$cidade->id}}" {{ $curso->cidade == $cidade->id ? 'selected' : '' }}>{!!$cidade->title!!}</option>
                        @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>Local</label>
                        <input type="text" name="local" value="{{$curso->local}}" 
                                   class="upper form-control @error('local') is-invalid @enderror" />
                    </div>
                    <div class="col-sm-6">
                        <label>Instrutor</label>
                        <input type="text" name="instrutor" value="{{$curso->instrutor}}" 
                                   class="upper form-control @error('instrutor') is-invalid @enderror" />
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>Módulo</label>
                        <input type="text" name="modulo" value="{{$curso->modulo}}" 
                                   class="upper form-control @error('modulo') is-invalid @enderror" />
                    </div>
                    <div class="col-sm-6">
                        <label>Modalidade</label>
                        <input type="text" name="modalidade" value="{{$curso->modalidade}}" 
                                   class="upper form-control @error('modalidade') is-invalid @enderror" />
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>Máximo de Alunos</label>
                        <input type="text" name="max_alunos" value="{{$curso->max_alunos}}" 
                                   class="upper form-control @error('max_alunos') is-invalid @enderror" />
                    </div>
                    <div class="col-sm-6">
                        <label>Inscritos</label>
                        <input type="text" name="inscritos" value="{{$curso->inscritos}}" 
                                   class="upper form-control @error('inscritos') is-invalid @enderror" />
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>Confirmados</label>
                        <input type="text" name="confirmados" value="{{$curso->confirmados}}" 
                                   class="upper form-control @error('confirmados') is-invalid @enderror" />
                    </div>
                    <div class="col-sm-6">
                        <label>Pagos</label>
                        <input type="text" name="pago" value="{{$curso->pago}}" 
                                   class="upper form-control @error('pago') is-invalid @enderror" />
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>Refaça</label>
                        <input type="text" name="refaca" value="{{$curso->refaca}}" 
                                   class="upper form-control @error('refaca') is-invalid @enderror" />
                    </div>
                    <div class="col-sm-6">
                        <label>Cortesia</label>
                        <input type="text" name="cortesia" value="{{$curso->cortesia}}" 
                                   class="upper form-control @error('cortesia') is-invalid @enderror" />
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>Finalizado</label>
                        <input type="text" name="finalizado" value="{{$curso->finalizado}}" 
                                   class="upper form-control @error('finalizado') is-invalid @enderror" />
                    </div>
                    <div class="col-sm-6">
                        <label>Observação</label>
                        <input type="text" name="observacao" value="{{$curso->observacao}}" 
                                   class="upper form-control @error('observacao') is-invalid @enderror" />
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>Campanhas Ativas</label>
                        <input type="text" name="campanhas_ativas" value="{{$curso->campanhas_ativas}}" 
                                   class="upper form-control @error('campanhas_ativas') is-invalid @enderror" />
                    </div>
                    <div class="col-sm-6">
                        <label>Início</label>
                        <input type="text" name="inicio" value="{{$curso->inicio}}" 
                                   class="upper form-control @error('inicio') is-invalid @enderror" />
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
<script type="text/javascript" src="{{ asset('js/cadastros/clientes.js') }}"></script>
