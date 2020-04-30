@extends('adminlte::page')

@section('title', 'Novo Parâmetro')

@section('content_header')
    <link href="{{ asset('css/form-modulos.css') }}" rel="stylesheet">
    <h1>Novo Parâmetro</h1>
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

            <form action="{{route('parametros.store')}}" method="POST" class="form-horizontal">
                <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}" />
                @csrf

                <div class="form-group row">
                    <div class="col-sm-4">
                        <label>Parâmetro</label>
                        <input type="text" name="parametro" value="{{old('parametro')}}" 
                                   class="upper form-control @error('parametro') is-invalid @enderror" />
                    </div>
    
                    <div class="col-sm-4">
                        <label>Descrição</label>
                        <input type="text" name="descricao" value="{{old('descricao')}}" 
                                   class="upper form-control @error('descricao') is-invalid @enderror" />
                    </div>

                    <div class="col-sm-4">
                        <label>Status</label>
                        <input type="text" name="status" value="{{old('status')}}" 
                                   class="upper form-control @error('status') is-invalid @enderror" />
                    </div>
                </div>

            </br>
            <div class="form-group row center">
                    <input type="submit" value="Cadastrar Parâmetro" class="btn btn-success" />
            </div>

            </form>
        </div>
    </div>

@endsection
<script type="text/javascript" src="{{ asset('js/cadastros/clientes.js') }}"></script>