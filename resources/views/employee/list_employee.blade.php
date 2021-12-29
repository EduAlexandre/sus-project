@extends('layouts.main')

@section('title', 'SAIPM - Registro(s) ')

@section('content')

<div class="row"><!-- START template table -->
    <div class="col-md-12">
        <div class="row" style="margin-bottom: 8px; margin-right: 6px;">
            <a href="{{route("employee.index")}}"  class="btn btn-warning btn-fill pull-right">Cadastrar funcionário</a>
        </div>
        <div class="card">
            <div class="card-content">
                <div class="toolbar">
                    <!--Here you can write extra buttons/actions for the toolbar-->
                </div>
                <div class="fresh-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                        <tr>
                            <th>Nome Completo</th>
                            <th>Mãe</th>
                            <th>CPF</th>
                            <th>Vivo</th>
                            <th class="text-center">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($all_employee as $all_employees)
                            <tr>
                                <td>{{$all_employees->name}}</td>
                                <td>{{$all_employees->mother}}</td>
                                <td>{{$all_employees->cpf}}</td>
                                <td>{{$all_employees->isAlive}}</td>

                                <td class="td-actions text-center">
                                    <a href="list/{{$all_employees->id}}"
                                       rel="tooltip"
                                       title="Editar Cadastro"
                                       class="btn btn-success btn-simple btn-xs">
                                        <i class="ti-user"></i>
                                    </a>
                                    <a href="/employee/disease/{{$all_employees->id}}"
                                       rel="tooltip"
                                       title="Cadastrar Exames"
                                       class="btn btn-success btn-simple btn-xs">
                                        <i class="ti-agenda"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div><!--  end card  -->
    </div> <!-- end col-md-12 -->
</div><!-- END template table -->
@include('sweetalert::alert')
@endsection
