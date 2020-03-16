@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
	<link href="{{ asset('css/colaboradores.css') }}" rel="stylesheet">	
	<h1>
		Usuários
		&nbsp;&nbsp;
		<a href="{{ route('users.create') }}" class="btn btn-sm btn-success">
			Novo Usuário
		</a>
	</h1>
@endsection

@section('content')
	

	{{-- Para pegar o usuário:
	@foreach($users as $user)
		NOME: {{ $user->name }} <br />
	@endforeach
	--}}

	<div class="card">
		<div class="card-body barra-rolagem">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>E-mail</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr>
							<td>{{$user->id}}</td>
							<td>{{$user->name}}</td>
							<td>{{$user->email}}</td>
							<td>
								<nobr>
								<a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-sm btn-info">Editar</a>

								@if($loggedId !== intval($user->id))
                                    <form class="d-inline" method="POST" 
                                    	  action="{{ route('users.destroy', ['user' => $user->id]) }}" 
                                    	  onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-sm btn-danger">Excluir</button>
                                    </form>
                                @endif
                                
								</nobr>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

{{ $users->links() }}

@endsection
