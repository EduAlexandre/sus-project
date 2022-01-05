@extends('layouts.main')

@section('title', 'SA/SUS - Lista de Usuário(s) ')

@section('content')
 <div class="row">
     <a href="{{route('users.create')}}" class="btn btn-warning btn-fill pull-right"
        style="margin-right:15px; margin-bottom:8px;">Cadastrar usuário
     </a>
 </div>
   <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header">
	                                <h4 class="card-title">Usuários cadastrados</h4>
	                            </div>
	                            <div class="card-content table-responsive table-full-width">
	                                <table class="table">
	                                    <thead>
	                                        <tr>
	                                            <th>Nome</th>
	                                            <th class="text-center">E-mail</th>
	                                            <th class="text-right">Ações</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
                                            @forelse ($users as $user)
                                                <tr>
	                                            <td >{{$user->name}}</td>
	                                            <td class="text-center">{{$user->email}}</td>
	                                            <td class="td-actions text-right">
	                                                <a href="{{route('users.show', $user->id)}}" rel="tooltip" title="Edit Profile" class="btn btn-success btn-simple btn-xs">
	                                                    <i class="ti-pencil-alt"></i>
	                                                </a>
	                                            </td>
	                                        </tr>
                                            @empty
                                                <td>Não existem usuários cadastrados!</td>
                                            @endforelse
	                                    </tbody>
	                                </table>
	                            </div>
	                        </div>
	                    </div>

	                </div>

@endsection
