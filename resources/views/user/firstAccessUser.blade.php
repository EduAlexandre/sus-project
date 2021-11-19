<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset("../../assets/img/apple-icon.png")}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset("../../assets/img/favicon.png")}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Login - LEVE</title>

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
    <div class="full-page login-page" data-color="" data-image="{{asset("../../assets/img/background/attention-307030_960_720.png")}}">
        <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <form method="POST"  action="{{url('/user/update-first-access')}}">
                            @csrf
                            <div class="card" data-background="color" data-color="blue">
                                <div class="card-header" align=center>
                                    <h4 class="card-title"><strong>Primeiro acesso</strong> - faça a alteração de sua senha</h4>
                                </div>
                                <div class="card-content">
                                    <div class="form-group">
                                        <label>Nova senha</label>
                                        <input type="password" name="password" placeholder="nova senha" class="form-control input-no-border">
                                    </div>
                                    <p style="color: red">{{$errors->has('password') ? $errors->first('password') : ''}}</p>
                                    <div class="form-group">
                                        <label>confirmação de senha</label>
                                        <input type="password" name="confirm_password" placeholder="confirmação de senha" class="form-control input-no-border">
                                    </div>
                                    <p style="color: red">{{$errors->has('confirm_password') ? $errors->first('confirm_password') : ''}}</p>
                                </div>
                                <div class="card-footer text-center">
                                    <button class="btn btn-fill btn-wd" >Alterar</button>
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
                    &copy; <script>document.write(new Date().getFullYear())</script>, desenvolvido pelo STI-SIPOM</a>
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

<!--  Forms Validations Plugin -->
<script src="../../assets/js/jquery.validate.min.js"></script>


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

