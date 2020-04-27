@extends('adminlte::page')

@section('title', 'Módulos')

@section('content_header')
	<link href="{{ asset('css/clients2.css') }}" rel="stylesheet">
	<h1>
		Módulos
		&nbsp;&nbsp;
		<a href="{{ route('modulos.create') }}" class="btn btn-sm btn-success">
	  	Novo Módulo
	</a>  
	</h1>  
@endsection

@section('content')


<div class="card">
  	<div class="box">
    	<div class="box-header">
     		<div class="card-body">

				<form action="{{ route('modulos-search') }}" method="POST" class="form form-inline" role="search">
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
	@if(count($modulos)<1) <div class="alert alert-dismissable alert-warning">
            <i class="ti ti-alert"></i>
            <strong>Aten&ccedil;&atilde;o:</strong> Nenhum registro encontrado!
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            </p>
			@else
		<table class="table table-hover">
			<thead>
                <tr>
                      <th>Nome</th>
                      <th>Modalidade</th>
                      <th>Horas</th>
                      <th>
                        <nobr>Ações</nobr>
                      </th>
                </tr>
            </thead>

			<tbody>
				@foreach($modulos as $modulo)
				<tr>
                      <td>
                        <a href="{{ route('modulos.show', $modulo->id) }}"
                          class="link-cliente">
                          {{$modulo->nome}}
                        </a>  
                      </td>
                      <td>{{$modulo->modalidade}}</td>
                      <td>{{$modulo->horas}}</td>
                      <td>
                        <nobr>
                          <a href="{{ route('modulos.show',$modulo->id) }}" 
                            class="btn btn-sm btn-primary"><i class="fas fa-user"></i></a>

                          <a href="{{ route('modulos.edit', ['modulo'=>$modulo->id]) }}" 
                            class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i></a>

                          <form class="d-inline" method="POST" 
                              action="{{ route('modulos.destroy', $modulo->id) }}" 
                              onsubmit="return confirm('Tem certeza que deseja excluir o módulo?')">
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
        {{ $modulos->links() }}
	@endif
    </div>

@endsection