@extends('layouts.main')

@section('title', 'SA/SUS - Registro(s) ')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <a href=""  class="btn btn-warning btn-fill pull-right">Voltar para pesquisa</a>
        </div>
        <div class="row">
            <form method="POST" id="update_data_policeman" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-6 col-sm-6">
                    <div class="card">
                        <ul id="erros_form"></ul>
                        <div class="card-header">
                            <h4 class="card-title">
                                <u><strong>Cadastrar Funcionário</strong></u>
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="form-group">
                                <label class="control-label">
                                    Nome
                                    <star>*</star>
                                </label>
                                <input class="form-control"
                                       name="name"
                                       type="text"
                                       required="true"
                                       autocomplete="off"
                                       onkeyup="changeUppercase(this)"

                                />
                                <p style="color: red">{{$errors->has('name') ? $errors->first('name') : ''}}</p>

                            </div>

                            <div class="form-group">
                                <label class="control-label">
                                    Nome da mãe
                                    <star>*</star>
                                </label>
                                <input class="form-control"
                                       name="mother_name"
                                       type="text"
                                       required="true"
                                       autocomplete="off"
                                       onkeyup="changeUppercase(this)"
                                />
                                <p style="color: red">{{$errors->has('mother_name') ? $errors->first('mother_name') : ''}}</p>
                            </div>

                            <div class="form-group">
                                <label class="control-label">
                                   CPF
                                    <star>*</star>
                                </label>
                                <input class="form-control"
                                       name="cpf"
                                       type="number"
                                       required="true"
                                       autocomplete="off"
                                       onkeyup="changeUppercase(this)"
                                />
                                <p style="color: red">{{$errors->has('cpf') ? $errors->first('cpf') : ''}}</p>
                            </div>

                            <div class="form-group">
                                <label class="control-label">
                                    Situação
                                    <star>*</star>
                                </label>
                                <div class="radio">
                                    <input
                                        type="radio"
                                        name="is_alive"
                                        id="radio1"
                                        value="SIM"
                                        onclick="if(document.getElementById('death_cause').disabled==false){document.getElementById('death_cause').disabled=true}"
                                    >
                                    <label for="radio1">
                                        Ativo
                                    </label>
                                </div>

                                <div class="radio">
                                    <input
                                        type="radio"
                                        name="is_alive"
                                        id="radio2"
                                        value="NAO"
                                        onclick="if(document.getElementById('death_cause').disabled==true){document.getElementById('death_cause').disabled=false}"
                                    >
                                    <label for="radio2">
                                        Óbito
                                    </label>
                                </div>
                                <p style="color: red">{{$errors->has('is_active') ? $errors->first('is_active') : ''}}</p>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1"> Informe as possiveis causas do falecimento: </label>
                                <textarea
                                    onkeyup="changeUppercase(this)"
                                    type="text" id="death_cause"
                                    name="death_cause" class="form-control"
                                    disabled="disabled">

                                </textarea>

                                <p style="color: red">{{$errors->has('death_cause') ? $errors->first('death_cause') : ''}}</p>
                            </div>
                        </div>

                    </div>
                </div><!--end div col-lg-6 -->


                <div class="col-lg-6 col-sm-6">
                    <ul id="erros_form"></ul>
                    <div class="card">
                        <div class="card-content">

                            <div class="form-group">
                                <label class="control-label">
                                    Logradouro
                                    <star>*</star>
                                </label>
                                <input class="form-control"
                                       name="address"
                                       type="text"
                                       required="true"
                                       autocomplete="off"
                                       onkeyup="changeUppercase(this)"
                                />
                                <p style="color: red">{{$errors->has('address') ? $errors->first('address') : ''}}</p>
                            </div>

                            <div class="form-group">
                                <label class="control-label">
                                    Bairro
                                    <star>*</star>
                                </label>
                                <input class="form-control"
                                       name="district"
                                       type="text"
                                       required="true"
                                       autocomplete="off"
                                       onkeyup="changeUppercase(this)"
                                />
                                <p style="color: red">{{$errors->has('district') ? $errors->first('district') : ''}}</p>
                            </div>

                            <div class="form-group">
                                <label class="control-label">
                                    Cidade
                                    <star>*</star>
                                </label>
                                <input class="form-control"
                                       name="city"
                                       type="text"
                                       required="true"
                                       autocomplete="off"
                                       onkeyup="changeUppercase(this)"
                                />
                                <p style="color: red">{{$errors->has('city') ? $errors->first('city') : ''}}</p>
                            </div>

                            <div class="form-group">
                                <label class="control-label">
                                    Estado
                                    <star>*</star>
                                </label>
                                <select class="selectpicker situation" required="true" name="state" title="Selecione" data-size="5">
                                    <option value="AC">ACRE</option>
                                    <option value="AL">ALAGOAS</option>
                                    <option value="AP">AMAPÁ</option>
                                    <option value="AM">AMAZONAS</option>
                                    <option value="BA">BAHIA</option>
                                    <option value="CE">CEARÁ</option>
                                    <option value="ES">ESPÍRITO SANTO</option>
                                    <option value="GO">GOIÁS</option>
                                    <option value="MA">MARANHÃO</option>
                                    <option value="MT">MATO GROSSO</option>
                                    <option value="MS">MATO GROSSO DO SUL</option>
                                    <option value="MG">MINAS GERAIS</option>
                                    <option value="PA">PARÁ</option>
                                    <option value="PB">PARAÍBA</option>
                                    <option value="PR">PARANÁ</option>
                                    <option value="PE">PERNAMBUCO</option>
                                    <option value="PI">PIAUÍ</option>
                                    <option value="RJ">RIO DE JANEIRO</option>
                                    <option value="RN">RIO GRANDE DO NORTE</option>
                                    <option value="RS">RIO GRANDE DO SUL</option>
                                    <option value="RO">RONDÔNIA</option>
                                    <option value="RR">RORAIMA</option>
                                    <option value="SC">SANTA CATARINA</option>
                                    <option value="SP">SÃO PAULO</option>
                                    <option value="SE">SERGIPE</option>
                                    <option value="TO">TOCANTINS</option>
                                    <option value="DF">DISTRITO FEDERAL</option>
                                </select>
                                <p style="color: red">{{$errors->has('state') ? $errors->first('state') : ''}}</p>
                            </div>
                            <div class="category">
                                <star>*</star>
                                Campos Obrigatórios
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" id="update_button_data" class="btn btn-info btn-fill pull-right">Cadastrar</button>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div><!-- END CARD DIV -->
            </form>
        </div><!--END DIV ROW -->


    </div><!--END DIV FLUID -->

                        </div><!--  end panel group -->
                    </div>
                </div><!--  end modal body -->
            </div><!--  end modal content -->
        </div><!--  end modal dialog -->
    </div><!-- end modal -->
    <!-- END MODAL OCCURRENCES CREED -->
@include('sweetalert::alert')
@endsection
