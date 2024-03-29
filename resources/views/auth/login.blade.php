<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset("../../assets/img/apple-icon.png")}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset("../../assets/img/favicon.png")}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Login - SA</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{asset("../../assets/css/bootstrap.min.css")}}" rel="stylesheet" />

    <!--  Paper Dashboard core CSS    -->
    <link href="{{asset("../../assets/css/paper-dashboard.css")}}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset("../../assets/css/demo.css")}}" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{asset("../../assets/css/themify-icons.css")}}" rel="stylesheet">
</head>

<body>

<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" data-color="" data-image="{{asset("../../assets/img/background/jaleko-sus.png")}}">
        <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <form method="POST" id="registerFormValidation" action="{{ route('login') }}">
                            @csrf
                            <div class="card" data-background="color" data-color="blue">
                                <div class="card-header" align=center>
                                    <h4 class="card-title">Sistema de Acompanhamento Interno</h4>
                                </div>
                                <div class="card-content">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" value="{{old('email')}}" placeholder="informe seu email" class="form-control input-no-border">
                                        <p style="color: red">{{$errors->has('email') ? $errors->first('email') : ''}}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Senha</label>
                                        <input type="password" value="{{old('password')}}" name="password" placeholder="informe sua" class="form-control input-no-border">
                                        <p style="color: red">{{$errors->has('password') ? $errors->first('password') : ''}}</p>
                                    </div>
                                    <div class="form-group" align=right>
                                         <a href="/register">Registrar</a>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <button class="btn btn-fill btn-wd ">Entrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer footer-transparent">
            <div class="container">
                <div class="copyright">
                    &copy; <script>document.write(new Date().getFullYear())</script>, desenvolvido por FabricaDeSoftware - ❤</a>
                </div>
            </div>
        </footer>
    </div>
</div>
@include('sweetalert::alert')
</body>

<!--   Core JS Files. Extra: TouchPunch for touch library inside jquery-ui.min.js   -->
<script src="../../assets/js/jquery.min.js" type="text/javascript"></script>
<script src="../../assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="../../assets/js/perfect-scrollbar.min.js" type="text/javascript"></script>
<script src="../../assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Forms Validations Plugin -->
<script src="../../assets/js/jquery.validate.min.js"></script>

<!-- Promise Library for SweetAlert2 working on IE -->
<script src="../../assets/js/es6-promise-auto.min.js"></script>

<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="../../assets/js/moment.min.js"></script>

<!--  Date Time Picker Plugin is included in this js file -->
<script src="../../assets/js/bootstrap-datetimepicker.js"></script>

<!--  Select Picker Plugin -->
<script src="../../assets/js/bootstrap-selectpicker.js"></script>

<!--  Switch and Tags Input Plugins -->
<script src="../../assets/js/bootstrap-switch-tags.js"></script>

<!-- Circle Percentage-chart -->
<script src="../../assets/js/jquery.easypiechart.min.js"></script>

<!--  Charts Plugin -->
<script src="../../assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="../../assets/js/bootstrap-notify.js"></script>

<!-- Sweet Alert 2 plugin -->
<script src="../../assets/js/sweetalert2.js"></script>

<!-- Vector Map plugin -->
<script src="../../assets/js/jquery-jvectormap.js"></script>

<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Wizard Plugin    -->
<script src="../../assets/js/jquery.bootstrap.wizard.min.js"></script>

<!--  Bootstrap Table Plugin    -->
<script src="../../assets/js/bootstrap-table.js"></script>

<!--  Plugin for DataTables.net  -->
<script src="../../assets/js/jquery.datatables.js"></script>

<!--  Full Calendar Plugin    -->
<script src="../../assets/js/fullcalendar.min.js"></script>

<!-- Paper Dashboard PRO Core javascript and methods for Demo purpose -->
<script src="../../assets/js/paper-dashboard.js"></script>

<!-- Paper Dashboard PRO DEMO methods, don't include it in your project! -->
<script src="../../assets/js/demo.js"></script>

<script type="text/javascript">
    $().ready(function(){
        demo.checkFullPageBackgroundImage();

        setTimeout(function(){
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>

</html>

