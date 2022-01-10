@extends('layouts.main')


@section('title', 'SA/SUS - Lista de exames(s) ')

@section('content')
<div class="row">
     <a href="{{route('employees.index')}}" class="btn btn-warning btn-fill pull-right"
        style="margin-right:15px; margin-bottom:8px;">Voltar
     </a>
 </div>
     <div id="events-container" class="col-md-12">
        <section>
            <div class="container">
                <div class="row">
                        @foreach ($data as $item)
                            <div class="col-md-12">
                                    <div class="col-md-6">
                                        <label>Funcionário</label>
                                        <div>{{ $item->name}}</div>
                                    </div>
                                     <div class="col-md-3">
                                        <label>CPF</label>
                                        <div>{{ $item->cpf}}</div>
                                    </div>
                                     <div class="col-md-3">
                                        <label>Nº SUS</label>
                                        <div>{{ $item->sus_card}}</div>
                                    </div>
                            </div>
                            <div class="row">
                                 <div class="col-md-12">
                                    <div class="col-md-6">
                                        <label>Rua</label>
                                        <div>{{ $item->address}}</div>
                                    </div>
                                     <div class="col-md-3">
                                        <label>Bairro</label>
                                        <div>{{ $item->district}}</div>
                                    </div>
                                     <div class="col-md-3">
                                        <label>Cidade</label>
                                        <div>{{ $item->city}}</div>
                                    </div>
                                 </div>
                            </div>
                            </div>
                        @endforeach
                </div>
            </div>
        </section>

    </div>
    <div class="clearfix"></div>
@endsection
