@extends('adminlte::page')

@section('title', 'Parâmetros')

@section('content_header')
	<link href="{{ asset('css/clients2.css') }}" rel="stylesheet">
	<h1>
		Parâmetros
		&nbsp;&nbsp;
		<a href="{{ route('parametros.create') }}" class="btn btn-sm btn-success">
	  	Novo Parâmetro
	</a>  
	</h1>  
@endsection

@section('content')

<div class="card">
    <div class="box">
      <div class="box-header">
           <div class="card-body">

              <form action="{{ route('cursos-search') }}" method="POST" class="form form-inline" role="search">
                  @csrf
                  <label class="procurar">Procurar por:</label>
                  <div class="col-3">
                      <input type="text" name="nome" class="form-control upper" placeholder="">
                  </div>
                  <label>Filtro:&nbsp;&nbsp;</label>
                  <div class="form-group col-3">
                      <select name="busca" class="form-control">
                      <option value="nome">NOME</option>
                      <option value="modalidade">PRESENCIAL</option>
                      <option value="oficial">OFICIAL</option>
                      <option value="horas">HORAS</option>
                      <option value="prova_cert">PROVA CERT.</option>
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

    @if(count($parametros)<1) <div class="alert alert-dismissable alert-warning">
        <i class="ti ti-alert"></i>
        <strong>Aten&ccedil;&atilde;o:</strong> Nenhum registro encontrado!
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </p>
    @else

    <table class="table table-hover">
        <thead>
            <tr>
                  <th>Parâmetro</th>
                  <th>Descrição</th>
                  <th>Status</th>
                  <th>
                    <nobr>Ações</nobr>
                  </th>
            </tr>
        </thead>

        <tbody>
            @foreach($parametros as $parametro)
				<tr>
                      <td>
                        <a href="{{ route('parametros.show', $parametro->id) }}"
                          class="link-cliente">
                          {{$parametro->parametro}}
                        </a>  
                      </td>
                      <td>{{$parametro->descricao}}</td>
                      <td>{{$parametro->status}}</td>

                      <td>
                        <nobr>
                          <a href="{{ route('parametros.show',$parametro->id) }}" 
                            class="btn btn-sm btn-primary"><i class="fas fa-user"></i></a>

                          <a href="{{ route('parametros.edit', ['parametro'=>$parametro->id]) }}" 
                            class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i></a>

                          <form class="d-inline" method="POST" 
                              action="{{ route('parametros.destroy', $parametro->id) }}" 
                              onsubmit="return confirm('Tem certeza que deseja excluir o parâmetro?')">
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
    {{ $parametros->links() }}
@endif
</div>

@endsection