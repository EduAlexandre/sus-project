@extends('layouts.main')

@section('title', 'SA/SUS - Usuários')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card">
                <form action="{{$action}}" method="POST">
                    @csrf

                    @isset($user)
                        @method('PUT')
                    @endisset

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
                            <input class="form-control @error('name') error @enderror"
                                name="name"
                                type="text"
                                autocomplete="off"
                                value="{{old('name', $user->name ?? '')}}"
                            />
                            @error('name')
                            <p style="color: red">{{$message}}</p>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label class="control-label">
                                E-mail <star>*</star>
                            </label>
                            <input class="form-control @error('email') error @enderror"
                                name="email"
                                type="email"
                                email="true"
                                autocomplete="off"
                                value="{{old('email', $user->email ?? '')}}"
                            />
                            @error('email')
                            <p style="color: red">{{$message}}</p>
                            @enderror
                        </div>

                        @if(@!$user)
                            <div class="form-group">
                                <label class="control-label">
                                    Administrador <star>*</star>
                                </label>
                                <select class="selectpicker @error('isAdmin') error @enderror" name="isAdmin" title="Selecione"  data-size="2">
                                    <option {{old('isAdmin') == '1' ? 'selectetd' : ''}} value="1">SIM</option>
                                    <option {{old('isAdmin') == '0' ? 'selectetd' : ''}} value="0">NÃO</option>
                                </select>
                                @error('isAdmin')
                                <p style="color: red">{{$message}}</p>
                                @enderror
                            </div>
                        @endif
                        @isset($user)
                            <div class="form-group">
                                <label>Senha</label>
                                <input type="password" value="{{old('password')}}" name="password" placeholder="informe sua" class="form-control input-no-border">
                            </div>
                        @endisset

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
