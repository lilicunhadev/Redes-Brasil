@extends('adminlte::page')

@section('title', 'Novo Instrutor')

@section('content_header')
    <link href="{{ asset('css/form-modulos.css') }}" rel="stylesheet">
    <h1>Novo Instrutor</h1>
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

            <form action="{{ route('instrutores.store') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf

                {{-- {{Form::open(['route' => 'instrutores.store' ,'enctype'=>'multipart/form-data', 'files' => true, 'id' => 'upload_form', 'method' => 'post'])}} --}}
                {{-- <input type="hidden" id="token_b" name="_token" value="{{ csrf_token() }}"  /> --}}
                {{-- @csrf --}}

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>Nome</label>
                        <input type="text" name="nome" value="{{old('nome')}}" 
                                class="upper form-control @error('nome') is-invalid @enderror" />
                    </div>
                    <div class="col-sm-6">
                        <label>CPF</label>
                        <input type="text" name="cpf" value="{{old('cpf')}}" 
                                class="upper form-control @error('cpf') is-invalid @enderror" />
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>RG</label>
                        <input type="text" name="rg" value="{{old('rg')}}" 
                                class="upper form-control @error('rg') is-invalid @enderror" />
                    </div>
                    <div class="col-sm-6">
                        <label>Passaporte</label>
                        <input type="text" name="passaporte" value="{{old('passaporte')}}" 
                                class="upper form-control @error('passaporte') is-invalid @enderror" />
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>Endereço</label>
                        <input type="text" name="endereco" value="{{old('endereco')}}" 
                                class="upper form-control @error('endereco') is-invalid @enderror" />
                    </div>
                    <div class="col-sm-6">
                        <label>Aeroporto de preferência</label>
                        <input type="text" name="aeroporto_preferencia" value="{{old('aeroporto_preferencia')}}" 
                                class="upper form-control @error('aeroporto_preferencia') is-invalid @enderror" />
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>MikroTik</label>
                        <select id="mikrotik" name="mikrotik" class="form-control upper @error('mikrotik') is-invalid @enderror">
                                <option value="" selected disabled>Selecione</option>
                                <option value="SIM" <?php if (old('mikrotik') == 'SIM') { ?>selected="true" <?php }; ?>>SIM</option>
                                <option value="NÃO" <?php if (old('mikrotik') == 'NÃO') { ?>selected="true" <?php }; ?>>NÃO</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label>Ubiquiti</label>
                        <select id="ubiquiti" name="ubiquiti" class="form-control upper @error('ubiquiti') is-invalid @enderror">
                                <option value="" selected disabled>Selecione</option>
                                <option value="SIM" <?php if (old('oficial') == 'SIM') { ?>selected="true" <?php }; ?>>SIM</option>
                                <option value="NÃO" <?php if (old('oficial') == 'NÃO') { ?>selected="true" <?php }; ?>>NÃO</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>Juniper</label>
                        <select id="juniper" name="juniper" class="form-control upper @error('juniper') is-invalid @enderror">
                                <option value="" selected disabled>Selecione</option>
                                <option value="SIM" <?php if (old('oficial') == 'SIM') { ?>selected="true" <?php }; ?>>SIM</option>
                                <option value="NÃO" <?php if (old('oficial') == 'NÃO') { ?>selected="true" <?php }; ?>>NÃO</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label>VyOS</label>
                        <select id="vyos" name="vyos" class="form-control upper @error('vyos') is-invalid @enderror">
                                <option value="" selected disabled>Selecione</option>
                                <option value="SIM" <?php if (old('oficial') == 'SIM') { ?>selected="true" <?php }; ?>>SIM</option>
                                <option value="NÃO" <?php if (old('oficial') == 'NÃO') { ?>selected="true" <?php }; ?>>NÃO</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>Cisco</label>
                        <select id="cisco" name="cisco" class="form-control upper @error('cisco') is-invalid @enderror">
                                <option value="" selected disabled>Selecione</option>
                                <option value="SIM" <?php if (old('oficial') == 'SIM') { ?>selected="true" <?php }; ?>>SIM</option>
                                <option value="NÃO" <?php if (old('oficial') == 'NÃO') { ?>selected="true" <?php }; ?>>NÃO</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                    <label>Linux</label>
                        <select id="linux" name="linux" class="form-control upper @error('linux') is-invalid @enderror">
                                <option value="" selected disabled>Selecione</option>
                                <option value="SIM" <?php if (old('oficial') == 'SIM') { ?>selected="true" <?php }; ?>>SIM</option>
                                <option value="NÃO" <?php if (old('oficial') == 'NÃO') { ?>selected="true" <?php }; ?>>NÃO</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>Fibra Óptica</label>
                        <select id="fibra_optica" name="fibra_optica" class="form-control upper @error('fibra_optica') is-invalid @enderror">
                                <option value="" selected disabled>Selecione</option>
                                <option value="SIM" <?php if (old('oficial') == 'SIM') { ?>selected="true" <?php }; ?>>SIM</option>
                                <option value="NÃO" <?php if (old('oficial') == 'NÃO') { ?>selected="true" <?php }; ?>>NÃO</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label>EAD</label>
                        <select id="ead" name="ead" class="form-control upper @error('ead') is-invalid @enderror">
                                <option value="" selected disabled>Selecione</option>
                                <option value="SIM" <?php if (old('oficial') == 'SIM') { ?>selected="true" <?php }; ?>>SIM</option>
                                <option value="NÃO" <?php if (old('oficial') == 'NÃO') { ?>selected="true" <?php }; ?>>NÃO</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <label>Observação</label>
                        <input type="text" name="observacao" value="{{old('observacao')}}" 
                                class="upper form-control @error('observacao') is-invalid @enderror" />
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <label>Assinatura</label>
                        <input id="assinatura" type="file" class="form-control" name="assinatura">
                        @if (auth()->user()->image)
                            <code>{{ auth()->user()->image }}</code>
                        @endif
                    </div>
                </div>

                </br>

                <div class="form-group row center">
                    <input type="submit" value="Cadastrar Instrutor" class="btn btn-primary" />
                </div>
                
                {{-- {{Form::submit('Salvar', ['class' => 'btn btn-primary', 'id' => 'salvar'])}} --}}
                {{-- {{Form::close()}} --}}

            </form>
        
        </div>
    </div>

@endsection