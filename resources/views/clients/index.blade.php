@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
	<link href="{{ asset('css/clients2.css') }}" rel="stylesheet">
  <link href="{{ asset('css/uppercase.css') }}" rel="stylesheet">
	<h1>
		Clientes
		&nbsp;&nbsp;
		<a href="{{ route('clients.create') }}" class="btn btn-sm btn-success">
	  	Novo Cliente
	</a>  
	</h1>  
@endsection

@section('content')

<div class="card">
  <div class="box">
    <div class="box-header">
      <div class="card-body">

        <form action="{{ route('search') }}" method="POST" class="form form-inline" role="search">
          @csrf
          <label class="procurar">Procurar por:</label>
          <div class="col-3">
            <input type="text" name="nome" class="form-control upper" placeholder="">
          </div>
          <label>Filtro:&nbsp;&nbsp;</label>
          <div class="form-group col-3">
            <select name="busca" class="form-control">
              <option value="nome">NOME</option>
              <option value="tipo_pessoa">TIPO DE PESSOA</option>
              <option value="cidade">CIDADE</option>
              <option value="uf">ESTADO</option>
              <option value="telefone">TELEFONE</option>
              <option value="celular">CELULAR</option>
              <option value="cpf_cnpj">CPF /CNPJ</option>
              <option value="tipo_cliente">TIPO DE CLIENTE</option>
              <option value="onde_nos_encontrou">ONDE NOS ENCONTROU</option>
           </select>
       	  </div>
       	  	<div class="col-3">
       	  		<button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>&nbsp;&nbsp; <strong>Pesquisar</strong></button>
       		</div>
        </form>

    </div>
  </div>
</div>

<div class="card-body">
        <table class="table table-hover">
            <thead>
                  <tr>
                      <th>Nome</th>
                      <th>UF</th>
                      <th>Telefone</th>
                      <th>
                        <nobr>Ações</nobr>
                      </th>
                  </tr>
                </thead>
            <tbody>
                  @foreach($clients as $client)
                    <tr>
                      <td>
                        <a href="{{ route('clients.show', ['client' => $client->id]) }}"
                          class="link-cliente">
                          {{$client->nome}}
                        </a>  
                      </td>
                      <td>{{$client->state->letter}}</td>
                      <td>{{$client->telefone}}</td>
                      <td>
                        <nobr>
                          <a href="{{ route('clients.show', ['client' => $client->id]) }}" 
                            class="btn btn-sm btn-primary"><i class="fas fa-user"></i></a>

                          <a href="{{ route('clients.edit', ['client' => $client->id]) }}" 
                            class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i></a>

                          <form class="d-inline" method="POST" 
                              action="{{ route('clients.destroy', ['client' => $client->id]) }}" 
                              onsubmit="return confirm('Tem certeza que deseja excluir o cliente?')">
                              @method('DELETE')
                              @csrf
                              <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                          </form>

                        </nobr>
                      </td>
                    </tr>        
                  @endforeach

                </tbody>
        </table>

        <br/>
        {{ $clients->links() }}

    </div>

@endsection
