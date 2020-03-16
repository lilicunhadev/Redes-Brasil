@extends('adminlte::page')

@section('title', 'Editar Cliente')

@section('content_header')
    <link href="{{ asset('css/uppercase.css') }}" rel="stylesheet">
    <h1>Editar Cliente</h1>
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
        
            <form action="{{route('clients.update', ['client'=>$client->id])}}" method="POST" class="form-horizontal">
                
                @method('PUT')
                @csrf

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nome Completo</label>
                    <div class="col-sm-10">
                        <input type="text" name="nome" value="{{$client->nome}}" 
                              class="upper form-control @error('nome') is-invalid @enderror" />
                    </div>   
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tipo de Pessoa</label>
                    <div class="col-sm-10">
                        <input type="text" name="tipo_pessoa" value="{{$client->tipo_pessoa}}" 
                               class="upper form-control @error('tipo_pessoa') is-invalid @enderror" />
                    </div>   
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">País</label>
                    <div class="col-sm-10">
                        <input type="text" name="pais" value="{{$client->pais}}" 
                               class="upper form-control @error('pais') is-invalid @enderror" />
                    </div>   
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">CEP</label>
                    <div class="col-sm-10">
                        <input type="text" name="cep" value="{{$client->cep}}" 
                               class="upper form-control @error('cep') is-invalid @enderror" />
                    </div>   
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Endereço</label>
                    <div class="col-sm-10">
                        <input type="text" name="endereco" value="{{$client->endereco}}" 
                               class="upper form-control @error('endereco') is-invalid @enderror" />
                    </div>   
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Bairro</label>
                    <div class="col-sm-10">
                        <input type="text" name="bairro" value="{{$client->bairro}}" 
                               class="upper form-control @error('bairro') is-invalid @enderror" />
                    </div>   
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Cidade</label>
                    <div class="col-sm-10">
                        <input type="text" name="cidade" value="{{$client->cidade}}" 
                               class="upper form-control @error('cidade') is-invalid @enderror" />
                    </div>   
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">UF</label>
                    <div class="col-sm-10">
                        <input type="text" name="uf" value="{{$client->uf}}" 
                               class="upper form-control @error('uf') is-invalid @enderror" />
                    </div>   
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Telefone</label>
                    <div class="col-sm-10">
                        <input type="text" name="telefone" value="{{$client->telefone}}" 
                               class="upper form-control @error('telefone') is-invalid @enderror" />
                    </div>   
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Celular</label>
                    <div class="col-sm-10">
                        <input type="text" name="celular" value="{{$client->celular}}" 
                               class="upper form-control @error('celular') is-invalid @enderror" />
                    </div>   
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" value="{{$client->email}}" 
                               class="form-control @error('email') is-invalid @enderror" />
                    </div>   
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Empresa</label>
                    <div class="col-sm-10">
                        <input type="text" name="empresa" value="{{$client->empresa}}" 
                               class="upper form-control @error('empresa') is-invalid @enderror" />
                    </div>   
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">CPF /CNPJ</label>
                    <div class="col-sm-10">
                        <input type="text" name="cpf_cnpj" value="{{$client->cpf_cnpj}}" 
                               class="upper form-control @error('cpf_cnpj') is-invalid @enderror" />
                    </div>   
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tipo de Cliente</label>
                    <div class="col-sm-10">
                        <input type="text" name="tipo_cliente" value="{{$client->tipo_cliente}}" 
                               class="upper form-control @error('tipo_cliente') is-invalid @enderror" />
                    </div>   
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Onde nos Encontrou</label>
                    <div class="col-sm-10">
                        <input type="text" name="onde_nos_encontrou" value="{{$client->onde_nos_encontrou}}" 
                               class="upper form-control @error('onde_nos_encontrou') is-invalid @enderror" />
                    </div>   
                </div>
                

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" value="Salvar" class="btn btn-success" />
                    </div>   
                </div>

            </form>
        </div>

    </div>



    

@endsection