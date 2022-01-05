@extends('layouts.main')

@section('title', 'SA/SUS - Lista de Usuário(s) ')

@section('content')
    <div class="row">
        <a href="{{route('users.index')}}" class="btn btn-warning btn-fill pull-right"
           style="margin-right:15px; margin-bottom:8px;">Voltar
        </a>
    </div>
    <div class="card">

        <div class="card-header">
            <h4 class="card-title"><strong>Alterarção de status </strong></h4>
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
                            <table  class="table table-striped table-no-bordered table-hover"  style="width:100%">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Administrador</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                        <input data-id="{{$user->id}}" class="toogle-class toogle-Admin" type="checkbox"
                                                data-onstyle="success"
                                                data-offstyle="danger"
                                                data-toggle="toggle"
                                                data-on="Sim"
                                                data-off="Não"
                                                {{$user->isAdmin == 1 ? 'checked' : ''}}
                                            />
                                        </td>
                                        <td>
                                        <input data-id="{{$user->id}}" class="toogle-class" type="checkbox"
                                                data-onstyle="success"
                                                data-offstyle="danger"
                                                data-toggle="toggle"
                                                data-on="Ativo"
                                                data-off="Inativo"
                                                {{$user->isActive == 1 ? 'checked' : ''}}

                                        />
                                        </td>


                                    </tr>
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div><!--  end card  -->
            </div> <!-- end col-md-12 -->
        </div><!-- END template table -->

@include('sweetalert::alert')
@endsection
@section('user_change_status')
    <script>
    $(document).ready(function () {
        $(function (){
        $('.toogle-class').change(function (){
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{route('users.status.edit', [$user->id, $user->isActive])}}",
                success: function (data){
                    sweetAlert('Status', 'Alterado com sucesso!', 'success')
                }
            })
        })

    })
    });

    </script>
@endsection

@section('user_change_isAdmin')
    <script>
        $(document).ready(function () {
        $(function (){
        $('.toogle-Admin').change(function (){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
            $.ajax({
                type: "PUT",
                dataType: "json",
                url: "{{route('users.status.update', [$user->id, $user->isAdmin])}}",
                success: function (data){
                    sweetAlert('Situação', 'Alterado com sucesso!', 'success')
                }
            })
        })

    })
    });
    </script>
@endsection

