@extends('layouts.main')

@section('title', 'SAIPM - Usuários')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card">
                <form  method="POST">
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">
                            Edite seus dados
                        </h4>
                    </div>
                    <div class="card-content">
                        <div class="form-group">
                            <label class="control-label">
                                Nome completo <star>*</star>
                            </label>
                            <input class="form-control"
                                   name="name"
                                   type="text"
                                   required="true"
                                   autocomplete="off"
                                   onkeyup="changeUppercase(this)"
                                   value="{{$dataUser->name}}"
                            />
                            <p style="color: red">{{$errors->has('name') ? $errors->first('name') : ''}}</p>

                        </div>
                        <div class="form-group">
                            <label class="control-label">
                                E-mail <star>*</star>
                            </label>
                            <input class="form-control"
                                   name="email"
                                   type="email"
                                   required="true"
                                   email="true"
                                   onkeyup="changeUppercase(this)"
                                   autocomplete="off"
                                   value="{{$dataUser->email}}"
                            />
                            <p style="color: red">{{$errors->has('email') ? $errors->first('email') : ''}}</p>
                        </div>


                        <div class="form-group">
                            <label class="control-label">
                                Senha
                            </label>
                            <input class="form-control"
                                   name="password"
                                   type="password"
                                   autocomplete="off"
                                   placeholder="Nova senha"
                                   value="{{old('password')}}"
                            />
                        </div>

                        <div class="category"><star>*</star> Campos Obrigatórios</div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info btn-fill pull-right">Atualizar</button>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection
