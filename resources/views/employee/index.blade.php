@extends('layouts.main')

@section('title', 'SA/SUS - Lista de Usuário(s) ')

@section('content')
    <div class="row">
        <a href="{{route('employees.create')}}" class="btn btn-warning btn-fill pull-right"
        style="margin-right:15px; margin-bottom:8px;">Cadastrar funcionário
        </a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Lista de funcionários</h4>
                </div>
                <div class="card-content table-responsive table-full-width">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th >Cartão do SUS</th>
                            <th class="text-center">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($employees as $employee)
                            <tr>
                                <td>{{$employee->name}}</td>
                                <td>{{$employee->cpf}}</td>
                                <td >{{$employee->sus_card}}</td>
                                <td class="td-actions text-center">
                                    <a href="{{route('employees.edit', $employee->id)}}" rel="tooltip" title="Edição de dados" class="btn btn-success btn-simple btn-xs">
                                        <i class="ti-pencil"></i>
                                    </a>
                                    <a href="{{route('employees.exams.index', $employee->id)}}" rel="tooltip" title="Cadastrar Exame" class="btn btn-info btn-simple btn-xs">
	                                <i class="ti-pencil-alt"></i>
	                                </a>
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td>Não existem usuários cadastrados!</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection

