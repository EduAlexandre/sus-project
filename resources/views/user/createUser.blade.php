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
                            Registro de novo usuário
                        </h4>
                    </div>
                    <div class="card-content">
                        <div class="form-group">
                            <label class="control-label">
                                Nome <star>*</star>
                            </label>
                            <input class="form-control"
                                   name="name"
                                   type="text"
                                   required="true"
                                   autocomplete="off"
                                   value="{{old('name')}}"
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
                                   autocomplete="off"
                                   value="{{old('email')}}"
                            />
                            <p style="color: red">{{$errors->has('email') ? $errors->first('email') : ''}}</p>
                        </div>

                        <div class="form-group">
                            <label class="control-label">
                                Administrador <star>*</star>
                            </label>
                            <select class="selectpicker" required="true" name="isAdmin" title="Selecione"  data-size="2">
                                <option {{old('isAdmin') == '1' ? 'selectetd' : ''}} value="1">SIM</option>
                                <option {{old('isAdmin') == '0' ? 'selectetd' : ''}} value="0">NÃO</option>
                            </select>
                            <p style="color: red">{{$errors->has('isAdmin') ? $errors->first('isAdmin') : ''}}</p>
                        </div>
                        <div class="category"><star>*</star> Campos Obrigatórios</div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info btn-fill pull-right">Cadastrar</button>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection
