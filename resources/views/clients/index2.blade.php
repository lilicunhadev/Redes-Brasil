@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
  <h1>
    Clientes
    &nbsp;&nbsp;
    <a href="{{ route('clients.create') }}" class="btn btn-sm btn-success">
      Novo Cliente
    </a>  
  </h1>  
@endsection

@section('content')
</br>

<div class="box">
  <div class="box-header">
    <nobr>
    <form action="{{ route('search') }}" method="POST" class="form form-inline" role="search">
      @csrf
      <label>Procurar por:</label>
      <div class="col-3">
        <input type="text" name="nome" class="form-control" placeholder="">
      </div>
      <label>Filtro:</label>    
      <div class="col-3">
        <input type="text" name="uf" class="form-control" placeholder="UF">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </div>
      <button type="submit" class="btn btn-primary">Pesquisar</button>
    </form>
    </nobr>
  </div>
</div>

</br>

<div class="card">
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