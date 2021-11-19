@extends('layouts.main')

@section('title', 'SAIPM - Lista de Usuário(s) ')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><strong>Lista de Usuários Cadastrados</strong></h4>
        </div>
    </div>
        <div class="row"><!-- START template table -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-content">
                        <div class="toolbar">
                            <!--Here you can write extra buttons/actions for the toolbar-->
                        </div>
                        <div class="fresh-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"  style="width:100%">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Administrador</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($allUser as $allUsers)
                                    <tr>
                                        <td>{{$allUsers->name}}</td>
                                        <td>{{$allUsers->email}}</td>
                                        <td>
                                          <input data-id="{{$allUsers->id}}" class="toogle-class toogle-Admin" type="checkbox"
                                                   data-onstyle="success"
                                                   data-offstyle="danger"
                                                   data-toggle="toggle"
                                                   data-on="Sim"
                                                   data-off="Não"
                                                {{$allUsers->isAdmin == 1 ? 'checked' : ''}}
                                            />
                                        </td>
                                        <td>
                                           <input data-id="{{$allUsers->id}}" class="toogle-class" type="checkbox"
                                                  data-onstyle="success"
                                                  data-offstyle="danger"
                                                  data-toggle="toggle"
                                                  data-on="Ativo"
                                                  data-off="Inativo"
                                                  {{$allUsers->isActive == 1 ? 'checked' : ''}}
                                           />
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
