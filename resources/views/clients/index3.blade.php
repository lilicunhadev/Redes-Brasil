@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
	<link href="{{ asset('css/clients2.css') }}" rel="stylesheet">
	<h1>
		Clientes
		&nbsp;&nbsp;
		<a href="{{ route('clients.create') }}" class="btn btn-sm btn-success">
	  	Novo Cliente
	</a>  
	</h1>  
@endsection

@section('content')


<div class="dropdown">
  <button class="dropbtn">Dropdown</button>
  <div class="dropdown-content">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
</div>


</br>
<div class="card">
<div class="box">
  <div class="box-header">
    <nobr>
    <div class="card-body">
    <form action="{{ route('search') }}" method="POST" class="form form-inline" role="search">
      @csrf
      <label class="procurar">Procurar por:</label>
      <div class="col-3">
        <input type="text" name="nome" class="form-control" placeholder="">
      </div>
      <label>Filtro:</label>    
      <div class="col-1">
        
        {{--
        	<input type="text" name="uf" class="form-control" placeholder="UF">
       		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

          <div class="scroll">
            @foreach ($arraycidades as $data)
              <li>
                <option value="{{ $data->id }}">{{ $data->uf }}</option>
              </a></li>
            @endforeach
          </div>
       	--}}



      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <button type="submit" class="btn btn-primary">Pesquisar</button>

      </div>
    </form>
    </div>
    </nobr>
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
                      <td>{{$client->nome}}</td>
                      <td>{{$client->uf}}</td>
                      <td>{{$client->telefone}}</td>
                      <td>
                        <nobr>
                          <a href="{{ route('clients.edit', ['client' => $client->id]) }}" class="btn btn-sm btn-info">Editar</a>

                          <form class="d-inline" method="POST" 
                              action="{{ route('clients.destroy', ['client' => $client->id]) }}" 
                              onsubmit="return confirm('Tem certeza que deseja excluir o cliente?')">
                              @method('DELETE')
                              @csrf
                              <button class="btn btn-sm btn-danger">Excluir</button>
                          </form>

                        </nobr>
                      </td>
                    </tr>        
                  @endforeach

                </tbody>
        </table>
    </div>   
</div>

{{ $clients->links() }}

@endsection