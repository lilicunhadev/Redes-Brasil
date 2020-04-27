@extends('adminlte::page')

@section('title', 'Instutores')

@section('content_header')
	<link href="{{ asset('css/clients2.css') }}" rel="stylesheet">
	<h1>
		Instutores
		&nbsp;&nbsp;
		<a href="{{ route('instrutores.create') }}" class="btn btn-sm btn-success">
	  	Novo Instrutor
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
	@if(count($instrutores)<1) <div class="alert alert-dismissable alert-warning">
            <i class="ti ti-alert"></i>
            <strong>Aten&ccedil;&atilde;o:</strong> Nenhum registro encontrado!
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            </p>
			@else
		<table class="table table-hover">
			<thead>
                <tr>
                      <th>Nome</th>
                      <th>Mikrotik</th>
                      <th>EAD</th>
                      <th>
                        <nobr>Ações</nobr>
                      </th>
                </tr>
            </thead>

			<tbody>
				@foreach($instrutores as $instrutor)
			
				<tr>
                      <td>
                        <a href="{{ route('instrutores.show',$instrutor->id) }}"
                          class="link-cliente">
                          {{$instrutor->nome}}
                        </a>  
                      </td>
                      <td>{{$instrutor->modalidade}}</td>
                      <td>{{$instrutor->horas}}</td>
                      <td>
                        <nobr>
                          <a href="{{ route('instrutores.show', $instrutor->id) }}" 
                            class="btn btn-sm btn-primary"><i class="fas fa-user"></i></a>

                          <a href="{{ route('instrutores.edit', $instrutor->id) }}" 
                            class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i></a>

                          <form class="d-inline" method="POST" 
                              action="{{ route('instrutores.destroy', $instrutor->id) }}" 
                              onsubmit="return confirm('Tem certeza que deseja excluir o instrutor?')">
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
        {{ $instrutores->links() }}
	@endif
    </div>

@endsection