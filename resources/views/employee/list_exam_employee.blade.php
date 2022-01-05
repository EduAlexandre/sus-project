@extends('layouts.main')

@section('title', 'SA/SUS - Lista de exame(s) ')

@section('content')
            <div class="row">
                <div class="row" style="margin-bottom: 8px; margin-right: 12px;">
                    <a href="{{route("employee.list")}}"  class="btn btn-warning btn-fill pull-right">Voltar</a>
                </div>

                <div id="events-container" class="col-md-12">
                    <div id="cards-container" class="row">
                        @if(@$dataEmployee)

                            <h5>Resultado exames</h5>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">nome</th>
                                    <th scope="col">Data</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dataEmployee as $item)
                                    @foreach($item->examEmployee as $occurencesData)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{\Carbon\Carbon::parse($occurencesData->examLung_date)->format('d/m/Y') ?? 'não informado'}}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                            <div class="clearfix"></div>
                        @endif
                    </div>
                </div>
            </div>

@endsection
