@extends('adminlte::page')

@section('title', 'Novo Cliente')

@section('content_header')
	<link href="{{ asset('css/form-cliente.css') }}" rel="stylesheet">
    <h1>Novo Cliente</h1>
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
        
            <form action="{{route('clients.store')}}" method="POST" class="form-horizontal">
            <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}" />
                @csrf

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>Nome Completo</label>
                        <input type="text" name="nome" value="{{old('nome')}}" 
                        	   class="upper form-control @error('nome') is-invalid @enderror" />
                    </div>   
                    <div class="col-sm-6">
                        <label class="">Tipo de Pessoa</label>
                        <select id="tipo_cliente" name="tipo_cliente" class="form-control upper">
                            <option value="" selected disabled>Selecione</option>
                            <option value="FÍSICA">FÍSICA</option>
                            <option value="JURÍDICA">JURÍDICA</option>
                        </select>
                    </div>  
                </div>
                
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>País</label>
                        <div class="">
                            <input type="text" name="pais" value="{{old('pais')}}" 
                                   class="upper form-control @error('pais') is-invalid @enderror" />
                        </div>   
                    </div>
                    <div class="col-sm-6">
                        <label>CEP</label>
                        <input type="text" name="cep" value="{{old('cep')}}" 
                                   class="upper form-control @error('cep') is-invalid @enderror" />
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>Endereço</label>
                        <input type="text" name="endereco" value="{{old('endereco')}}" 
                        	   class="upper form-control @error('endereco') is-invalid @enderror" />
                    </div>
                    <div class="col-sm-6">
                        <label>Bairro</label>
                        <input type="text" name="bairro" value="{{old('bairro')}}" 
                        	   class="upper form-control @error('bairro') is-invalid @enderror" />
                    </div>
                </div>

                 <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="col-sm-2 col-form-label">Estado</label>
                        <select id="uf" onchange="return buscarMunicipios();" name="uf" type="text" class="form-control upper @error('uf') is-invalid @enderror" required>
                            <option value="">Selecione</option>
                               @foreach($states as $state)
                            <option value="{{$state->id }}" {{ old('uf') == $state->title ? 'selected' : '' }}>{!!$state->title!!}</option>
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
                        <label>Telefone</label>
                        <input type="text" name="telefone" value="{{old('telefone')}}" 
                        	   class="upper form-control @error('telefone') is-invalid @enderror" />
                    </div>
                    <div class="col-sm-6">
                        <label>Celular</label>
                        <input type="text" name="celular" value="{{old('celular')}}" 
                        	   class="upper form-control @error('celular') is-invalid @enderror" />   
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>E-mail</label>
                        <input type="email" name="email" value="{{old('email')}}" 
                        	   class="form-control @error('email') is-invalid @enderror" />
                    </div>
                    <div class="col-sm-6">
                        <label>Empresa</label>
                        <input type="text" name="empresa" value="{{old('empresa')}}" 
                        	   class="upper form-control @error('empresa') is-invalid @enderror" />
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>CPF /CNPJ</label>
                        <input type="text" name="cpf_cnpj" value="{{old('cpf_cnpj')}}" 
                        	   class="upper form-control @error('cpf_cnpj') is-invalid @enderror" />
                    </div>
                    <div class="col-sm-6">
                        <label>Tipo de Cliente</label>
                        <select id="tipo_cliente" name="tipo_cliente" class="form-control upper">
                            <option value="" selected disabled>Selecione</option>
                            <option value="ALUNO">ALUNO</option>
                            <option value="CLIENTE">CLIENTE</option>
                            <option value="CONTATO">CONTATO</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>Onde nos Encontrou</label>
                        <input type="text" name="onde_nos_encontrou" value="{{old('onde_nos_encontrou')}}" 
                        	   class="upper form-control @error('onde_nos_encontrou') is-invalid @enderror" />
                    </div>
                </div>

                </br>

                <div class="form-group row center">
                    <input type="submit" value="Cadastrar Cliente" class="btn btn-success" />
                </div>

            </form>
        </div>

    </div>

@endsection
<script type="text/javascript" src="{{ asset('js/cadastros/clientes.js') }}"></script>