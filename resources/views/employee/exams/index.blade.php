@extends('layouts.main')


@section('title', 'SA/SUS - Lista de exames(s) ')

@section('content')
<div class="row">
     <a href="{{route('employees.index')}}" class="btn btn-warning btn-fill pull-right"
        style="margin-right:15px; margin-bottom:8px;">Voltar
     </a>
 </div>
     <div id="events-container" class="col-md-12">
            <div id="cards-container" class="row">
                @if(@$employees)
                    <h5>Exames cadastrados</h5>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">PACIENTE</th>
                            <th scope="col" class="text-center">EMPRESA</th>
                            <th scope="col" class="text-center">SETOR</th>
                            <th scope="col" class="text-center">CARGO</th>
                            <th scope="col" class="text-center">EXAME ANEXO</th>
                            <th scope="col" class="text-center">Ações</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($employees as $employee)
                            @foreach ($employee->exams as $item)
                                    <tr>
                                        <td>{{ $employee->name }}</td>
                                        <td class="text-center">{{$item->company_name}}</td>
                                        <td class="text-center">{{ $item->company_sector }}</td>
                                        <td class="text-center">{{ $item->company_office }}</td>
                                        <td class="text-center"><a target="_blank" href="{{ asset("assets/files/exams/$item->appendant")}}" class="btn btn-primary">Visualizar</a></td>
                                        <td class="td-actions text-center">
                                            <a href="{{route('employees.exams.edit', [$employee->id, $item->id])}}" rel="tooltip" title="Editar exame" class="btn btn-success btn-simple btn-xs">
                                                <i class="ti-pencil"></i>
                                            </a>
                                </td>
                                    </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                    <div class="clearfix"></div>
                @endif
        </div>

    </div>
    <div class="clearfix"></div>
@endsection
