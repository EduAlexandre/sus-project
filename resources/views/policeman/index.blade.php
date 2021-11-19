@extends('layouts.main')

@section('title', 'SAIPM - Policial')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @if(isset($errors) && count($errors) > 0 )
                <div class="alert-alert-danger">
                    <ul>
                        @foreach($errors->all() as $erro)
                            <li>{{$erro}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="personal-image">
                    <label class="label">
                        <input type="file" />
                        <figure class="personal-figure">
                            <img src="../../assets/img/avatar.jpeg" class="personal-avatar" alt="avatar">
                            <figcaption class="personal-figcaption">
                                <img src="../../assets/img/camera-white.png">
                            </figcaption>
                        </figure>
                    </label>
                </div>
            <div class="col-md-6 col-md-offset-3">
{{--                <div class="form-group">--}}
{{--                    <label for="exampleInputFile">Entrada de arquivo</label>--}}
{{--                    <input type="file" id="exampleInputFile">--}}
{{--                </div>--}}
                <div class="card">
                    <form id="registerFormValidation"  method="POST" novalidate="">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">
                               Cadastrar policial
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="form-group">
                                <label class="control-label">
                                    Matrícula <star>*</star>
                                </label>
                                <input class="form-control"
                                       name="register"
                                       id="register"
                                       type="number"
                                       required="true"
                                       autocomplete="off"
                                       value="{{old('register')}}"
                                />
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    Nome completo <star>*</star>
                                </label>
                                <input class="form-control"
                                       name="fullname"
                                       type="text"
                                       required="true"
                                       autocomplete="off"
                                       value="{{old('fullname')}}"
                                />
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    Nome de guerra <star>*</star>
                                </label>
                                <input class="form-control"
                                       name="warname"
                                       type="text"
                                       required="true"
                                       autocomplete="off"
                                       value="{{old('warname')}}"
                                />
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    Data de Admissão <star>*</star>
                                </label>
                                <input class="form-control"
                                       name="admissiondate"
                                       type="date"
                                       required="true"
                                       autocomplete="off"
                                       value="{{old('admissiondate')}}"
                                />
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    Sexo <star>*</star>
                                </label>
                                <select class="selectpicker" required="true" name="sex" title="Selecione"  data-size="2">
                                    <option {{old('sex') == 'MASCULINO' ? 'selectetd' : ''}} value="MASCULINO">MASCULINO</option>
                                    <option {{old('sex') == 'FEMININO' ? 'selectetd' : ''}} value="FEMININO">FEMININO</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    Graduação<star>*</star>
                                </label>
                                <select class="selectpicker" required="true" name="graduate" title="Selecione"  data-size="5">
                                    @foreach($allGraduate as $key => $allGraduates)
                                        <option value="{{$allGraduates->id}}" {{old('graduate') == $key ? 'selected' : ''}}>{{$allGraduates->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    Quadro<star>*</star>
                                </label>
                                <select class="selectpicker" required="true" name="painting"  data-size="5">
                                    @foreach($allPolicemanPainting as $key => $allPolicemanPaintings)
                                        <option value="{{$allPolicemanPaintings->id}}" {{old('painting') == $key ? 'selected' : ''}}>{{$allPolicemanPaintings->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    Situação <star>*</star>
                                </label>
                                <select class="selectpicker" required="true" name="situation" title="Selecione"  data-size="2">
                                    <option {{old('situation') == 'ATIVO' ? 'selectetd' : ''}} value="ATIVO">ATIVO</option>
                                    <option {{old('situation') == 'INATIVO' ? 'selectetd' : ''}} value="INATIVO">INATIVO</option>
                                </select>
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

