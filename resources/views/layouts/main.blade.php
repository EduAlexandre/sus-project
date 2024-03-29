<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset("/assets/img/apple-icon.png")}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset("/assets/img/favicon.png")}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{asset("/assets/css/bootstrap.min.css")}}" rel="stylesheet" />

    <!--  Paper Dashboard core CSS    -->
    <link href="{{asset("/assets/css/paper-dashboard.css")}}" rel="stylesheet"/>

    <link rel="stylesheet" href="{{asset("/assets/css/bootstrap-toggle.css")}}"/>

    <!-- My CSS     -->
    <link href="{{asset("/assets/css/Photo.css")}}" rel="stylesheet" />
    <link href="{{asset("/assets/css/MyCss/global.css")}}" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{asset("/assets/css/themify-icons.css")}}" rel="stylesheet">


</head>

<body>
@if(session('success_message'))
    <div class="alert-alert-success">
        {{session('success_message')}}
    </div>
@endif
<div class="wrapper">
    <div class="sidebar" data-background-color="brown" data-active-color="danger">
        <!--
            Tip 1: you can change the color of the sidebar's background using: data-background-color="white | brown"
            Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
        -->
        <div class="logo">
            <a href="{{route('dashboard.index')}}" class="simple-text logo-mini">
                SA
            </a>

            <a href="{{route('dashboard.index')}}" class="simple-text logo-normal">
                SA/SUS
            </a>
        </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="info">
                    <div class="photo">
                        <img src="{{asset("/assets/img/background/jaleko-sus.png")}}" />
                    </div>

                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">
	                        <span>
                                {{ Auth::user()->name }}
		                    <b class="caret"></b>
							</span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="{{route('users.edit', Auth::user()->id )}}">
                                    <span class="sidebar-mini">Mc</span>
                                    <span class="sidebar-normal">Meus dados</span>
                                </a>
                            </li>
                            @if(Auth::user()->isAdmin && Auth::user()->isActive)
                                <li>
                                    <a href="{{route('users.index')}}">
                                        <span class="sidebar-mini">LT</span>
                                        <span class="sidebar-normal">Lista de Usuários</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                <li>
                    <a data-toggle="collapse" href="#componentsExamples">
                        <i class="ti-package"></i>
                        <p>Acompanhamento
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="componentsExamples">
                        <ul class="nav">
                            <li>
                                <a href="{{route('employees.index')}}">
                                    <span class="sidebar-mini">LF</span>
                                    <span class="sidebar-normal">Lista de funcionários</span>
                                </a>

                            </li>
                        </ul>
                    </div>
                </li>


            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-minimize">
                    <button id="minimizeSidebar" class="btn btn-fill btn-icon"><i class="ti-more-alt"></i></button>
                </div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#Dashboard">
                        {{ Auth::user()->name }} - Seja Bem Vindo!
                    </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <div class="navbar-form">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        <p class="pull-right" style="color: #DB2B39; font-weight: bold; padding-right: 2px; padding-top: 2px">SAIR</p>
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            @yield('content')
        </div> <! -- ACABA AQUI A DIV CONTENT -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, desenvolvido por FabricaDeSoftware - ❤</a>
                </div>
            </div>
        </footer>
    </div>
</div>
@include('sweetalert::alert')
</body>



<!--   Core JS Files. Extra: TouchPunch for touch library inside jquery-ui.min.js   -->

<script src="{{asset("/assets/js/jquery-3.6.0.min.js")}}" type="text/javascript"></script>
<script src="{{asset("/assets/js/jquery-ui.min.js")}}" type="text/javascript"></script>
<script src="{{asset("/assets/js/perfect-scrollbar.min.js")}}" type="text/javascript"></script>
<script src="{{asset("/assets/js/bootstrap.min.js")}}" type="text/javascript"></script>

<!--  Forms Validations Plugin -->
<script src="{{asset("/assets/js/jquery.validate.min.js")}}"></script>

<!-- Promise Library for SweetAlert2 working on IE -->
<script src="{{asset("/assets/js/es6-promise-auto.min.js")}}"></script>

<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{asset("/assets/js/moment.min.js")}}"></script>

<!--  Date Time Picker Plugin is included in this js file -->
<script src="{{asset("/assets/js/bootstrap-datetimepicker.js")}}"></script>

<!--  Select Picker Plugin -->
<script src="{{asset("/assets/js/bootstrap-selectpicker.js")}}"></script>

<!--  Switch and Tags Input Plugins -->
<script src="{{asset("/assets/js/bootstrap-switch-tags.js")}}"></script>

<!-- Circle Percentage-chart -->
<script src="{{asset("/assets/js/jquery.easypiechart.min.js")}}"></script>

<!--  Notifications Plugin    -->
<script src="{{asset("/assets/js/bootstrap-notify.js")}}"></script>

<!-- Sweet Alert 2 plugin -->
<script src="{{asset("/assets/js/sweetalert2.js")}}"></script>

<!-- Vector Map plugin -->
<script src="{{asset("/assets/js/jquery-jvectormap.js")}}"></script>

<!-- Wizard Plugin    -->
<script src="{{asset("/assets/js/jquery.bootstrap.wizard.min.js")}}"></script>

<!--  Bootstrap Table Plugin    -->
<script src="{{asset("/assets/js/bootstrap-table.js")}}"></script>

<!--  Plugin for DataTables.net  -->
<script src="{{asset("/assets/js/jquery.datatables.js")}}"></script>

<!--  Full Calendar Plugin    -->
<script src="{{asset("/assets/js/fullcalendar.min.js")}}"></script>

<!-- Paper Dashboard PRO Core javascript and methods for Demo purpose -->
<script src="{{asset("/assets/js/paper-dashboard.js")}}"></script>
<script src="{{asset("/assets/js/perfect-scrollbar.jquery.min.js")}}"></script>

<!-- Translate JS -->
<script src="{{asset("/assets/js/translationDataTable.js")}}"></script>

<!-- bootstrap-toggle.min JS -->
<script src="{{asset("/assets/js/bootstrap-toggle.min.js")}}"></script>

<!-- change-user-status-and-situation JS -->
{{-- <script src="{{asset("/assets/js/change-user-status-situation/change-user-status-and-situation.js")}}"></script> --}}

<script src="{{asset("/assets/js/demo.js")}}"></script>

@yield('user_change_status')
@yield('user_change_isAdmin')
@yield('add_cpf_mask')
@yield('edit_employee_data')
@yield('add_prison_creed')
@yield('add_prison_go_along')
@yield('add_new_policeman')


<script type="text/javascript">
    $().ready(function () {
        $('#registerFormValidation').validate();
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        demo.initWizard();
    });
</script>

<script type="text/javascript">
    $().ready(function() {

        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            responsive: true,
            language: {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            }
        });
    });
</script>
<script type="text/javascript">

    //TRANFOMER LETTER IN UPPERCASE
    function changeUppercase(letter){
        upperLetter = letter.value.toUpperCase();
        letter.value = upperLetter;
    }


    // PREVIEW FOTO
    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

</script>
</html>
