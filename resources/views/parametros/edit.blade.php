@extends('adminlte::page')

@section('title', 'Editar Parâmetro')

@section('content_header')
    <link href="{{ asset('css/form-modulos.css') }}" rel="stylesheet">
    <h1>Editar Parâmetro</h1>
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

            <form action="{{route('parametros.update', ['parametro'=>$parametro->id])}}" method="POST" class="form-horizontal">
                <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}" />
                    @method('PUT')
                    @csrf

                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label>Parâmetro</label>
                            <input type="text" name="parametro" value="{{$parametro->parametro}}" 
                                       class="upper form-control @error('parametro') is-invalid @enderror" />
                        </div>
        
                        <div class="col-sm-4">
                            <label>Descrição</label>
                            <input type="text" name="descricao" value="{{$parametro->descricao}}" 
                                       class="upper form-control @error('descricao') is-invalid @enderror" />
                        </div>
    
                        <div class="col-sm-4">
                            <label>Status</label>
                            <select id="status" name="status" class="form-control upper @error('status') is-invalid @enderror">
                                <option value="" selected disabled>Selecione</option>
                                <option value="ATIVO" <?php if ($parametro->status == 'ATIVO') { ?>selected="true" <?php }; ?>>ATIVO</option>
                                <option value="INATIVO" <?php if ($parametro->status == 'INATIVO') { ?>selected="true" <?php }; ?>>INATIVO</option>
                            </select>
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