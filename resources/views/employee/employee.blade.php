@extends('layouts.main')

@section('title', 'SA/SUS - Registro(s) ')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <a href=""  class="btn btn-warning btn-fill pull-right">Voltar para pesquisa</a>
        </div>
        <div class="row">
            <form method="POST" id="update_data_policeman">
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
                                       value="{{old('name')}}"
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
                                       value="{{old('mother_name')}}"
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
                                       id="cpf"
                                       name="cpf"
                                       value="{{old('cpf')}}"
                                       type="text"
                                       required="true"
                                       autocomplete="off"
                                       oninput="mascara(this)"
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
                                        required
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
                                        required
                                        type="radio"
                                        name="is_alive"
                                        id="radio2"
                                        value="NAO"
                                        onclick="if(document.getElementById('death_cause').disabled==true){document.getElementById('death_cause').disabled=false }"
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
                                    class="form-control"
                                    onkeyup="changeUppercase(this)"
                                    id="death_cause"
                                    name="death_cause"
                                    disabled="disabled"
                                    rows="3" cols="3"
                                >
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
                                       value="{{old('address')}}"
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
                                       value="{{old('district')}}"
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
                                       value="{{old('city')}}"
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
                                <select class="selectpicker" required="true" name="state" title="Selecione" data-size="5">
                                    <option {{old('state') == 'AC' ? 'selectetd' : ''}} value="AC">ACRE</option>
                                    <option {{old('state') == 'AL' ? 'selectetd' : ''}} value="AL">ALAGOAS</option>
                                    <option {{old('state') == 'AP' ? 'selectetd' : ''}} value="AP">AMAPÁ</option>
                                    <option {{old('state') == 'AM' ? 'selectetd' : ''}} value="AM">AMAZONAS</option>
                                    <option {{old('state') == 'BA' ? 'selectetd' : ''}} value="BA">BAHIA</option>
                                    <option {{old('state') == 'CE' ? 'selectetd' : ''}} value="CE">CEARÁ</option>
                                    <option {{old('state') == 'ES' ? 'selectetd' : ''}} value="ES">ESPÍRITO SANTO</option>
                                    <option {{old('state') == 'GO' ? 'selectetd' : ''}} value="GO">GOIÁS</option>
                                    <option {{old('state') == 'MA' ? 'selectetd' : ''}} value="MA">MARANHÃO</option>
                                    <option {{old('state') == 'MT' ? 'selectetd' : ''}} value="MT">MATO GROSSO</option>
                                    <option {{old('state') == 'MS' ? 'selectetd' : ''}} value="MS">MATO GROSSO DO SUL</option>
                                    <option {{old('state') == 'MG' ? 'selectetd' : ''}} value="MG">MINAS GERAIS</option>
                                    <option {{old('state') == 'PA' ? 'selectetd' : ''}} value="PA">PARÁ</option>
                                    <option {{old('state') == 'PB' ? 'selectetd' : ''}} value="PB">PARAÍBA</option>
                                    <option {{old('state') == 'PR' ? 'selectetd' : ''}} value="PR">PARANÁ</option>
                                    <option {{old('state') == 'PE' ? 'selectetd' : ''}} value="PE">PERNAMBUCO</option>
                                    <option {{old('state') == 'PI' ? 'selectetd' : ''}} value="PI">PIAUÍ</option>
                                    <option {{old('state') == 'RJ' ? 'selectetd' : ''}} value="RJ">RIO DE JANEIRO</option>
                                    <option {{old('state') == 'RN' ? 'selectetd' : ''}} value="RN">RIO GRANDE DO NORTE</option>
                                    <option {{old('state') == 'RS' ? 'selectetd' : ''}} value="RS">RIO GRANDE DO SUL</option>
                                    <option {{old('state') == 'RO' ? 'selectetd' : ''}} value="RO">RONDÔNIA</option>
                                    <option {{old('state') == 'RR' ? 'selectetd' : ''}} value="RR">RORAIMA</option>
                                    <option {{old('state') == 'SC' ? 'selectetd' : ''}} value="SC">SANTA CATARINA</option>
                                    <option {{old('state') == 'SP' ? 'selectetd' : ''}} value="SP">SÃO PAULO</option>
                                    <option {{old('state') == 'SE' ? 'selectetd' : ''}} value="SE">SERGIPE</option>
                                    <option {{old('state') == 'TO' ? 'selectetd' : ''}} value="TO">TOCANTINS</option>
                                    <option {{old('state') == 'DF' ? 'selectetd' : ''}} value="DF">DISTRITO FEDERAL</option>
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
@section('add_cpf_mask')
    <script>
        // $(document).ready(function () {
        //
        //     var cpf = document.querySelector("#cpf");
        //
        //     cpf.addEventListener("blur", function(){
        //         if(cpf.value) cpf.value = cpf.value.match(/.{1,3}/g).join(".").replace(/\.(?=[^.]*$)/,"-");
        //     });
        // });

        function mascara(i){

            var v = i.value;

            if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
                i.value = v.substring(0, v.length-1);
                return;
            }

            i.setAttribute("maxlength", "14");
            if (v.length == 3 || v.length == 7) i.value += ".";
            if (v.length == 11) i.value += "-";

        }
    </script>
@endsection

