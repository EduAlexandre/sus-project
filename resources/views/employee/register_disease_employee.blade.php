@extends('layouts.main')

@section('title', 'SA/SUS - Registro de exame ')

@section('content')
            <div class="row">
                <div class="col-md-12 col-md-offset-0">
                    <div class="card card-wizard" id="wizardCard">
                        <form enctype="multipart/form-data" id="wizardForm" method="post">
                            @csrf
                            <input type="hidden" name="employees_id" value="{{$employee->id}}">
                            <div class="card-header text-center">
                                <h4 class="card-title" style="font-weight: bold"><span style="color: orangered; font-weight: bold;">Paciente:</span> {{$employee->name}}</h4>
                                <p class="category">Cadastro de exames</p>
                            </div>
                            <div class="card-content">
                                <ul class="nav">
                                    <li><a href="#tab1" data-toggle="tab">PROVA DE FUNÇÃO PULMONAR</a></li>
                                    <li><a href="#tab2" data-toggle="tab">RADIOLOGIA DE TÓRAX</a></li>
                                    <li><a href="#tab3" data-toggle="tab">DADOS DA EMPRESA</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane" id="tab1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="control-label">
                                                           Data do exame
                                                        </label>
                                                        <input class="form-control"
                                                               type="date"
                                                               name="exame_lung_date"
                                                        />
                                                    </div>
                                                </div>
                                                <div>
                                                    <table class="table">
                                                        <thead >
                                                        <tr>
                                                            <th scope="col">
                                                               <span style="font-size: 15px; ">
                                                                   <div style="text-align: center; font-weight: bold"> Espirometria </div>
                                                               </span>
                                                            </th>

                                                            <th scope="col">
                                                               <span style="font-size: 15px; ">
                                                                   <div style="text-align: center; font-weight: bold"> Predito </div>
                                                               </span>
                                                            </th>

                                                            <th scope="col">
                                                               <span style="font-size: 15px; ">
                                                                   <div style="text-align: center; font-weight: bold"> Medido </div>
                                                               </span>
                                                            </th>

                                                            <th scope="col">
                                                               <span style="font-size: 15px; ">
                                                                   <div style="text-align: center; font-weight: bold"> % </div>
                                                               </span>
                                                            </th>

                                                            <th scope="col">
                                                               <span style="font-size: 15px; ">
                                                                   <div style="text-align: center; font-weight: bold"> Limite Inferior </div>
                                                               </span>
                                                            </th>
                                                        </tr>

                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>
                                                                <span style="font-size: 12px; font-weight: bold "> CVF </span>
                                                            </td>
                                                            <td>
                                                                <input type="number" name="cvf_1" class="form-control"
                                                                       style=" -webkit-border-radius: 10px" />
                                                            </td>
                                                            <td>
                                                                <input type="number"  name="cvf_2" class="form-control"
                                                                       style=" -webkit-border-radius: 10px" />
                                                            </td>
                                                            <td align="center">x</td>
                                                            <td>
                                                                <input type="number"  name="cvf_3" class="form-control"
                                                                       style=" -webkit-border-radius: 10px" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span style="font-size: 12px; font-weight: bold "> VEF1 </span>
                                                            </td>
                                                            <td>
                                                                <input type="number"  name="vef_1" size="1" class="form-control"
                                                                       style=" -webkit-border-radius: 10px" />
                                                            </td>
                                                            <td>
                                                                <input type="number"  name="vef_2" size="1" class="form-control"
                                                                       style=" -webkit-border-radius: 10px" />
                                                            </td>
                                                            <td align="center">x</td>
                                                            <td><input type="number"  name="vef_3" size="1" class="form-control"
                                                                       style=" -webkit-border-radius: 10px" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span style="font-size: 12px; font-weight: bold "> VEF1/CVF </span>
                                                            </td>
                                                            <td>
                                                                <input type="number"  name="vefcvf_1" size="1" class="form-control"
                                                                       style=" -webkit-border-radius: 10px" />
                                                            </td>
                                                            <td>
                                                                <input type="number"  name="vefcvf_2" size="1" class="form-control"
                                                                       style=" -webkit-border-radius: 10px" />
                                                            </td>
                                                            <td align="center">x</td>
                                                            <td>
                                                                <input type="number"  name="vefcvf_3" size="1" class="form-control"
                                                                       style=" -webkit-border-radius: 10px" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span style="font-size: 12px; font-weight: bold "> FEF 25% - 75% </span>
                                                            </td>
                                                            <td>
                                                                <input type="number"  name="fef_1" size="1" class="form-control"
                                                                       style=" -webkit-border-radius: 10px" />
                                                            </td>
                                                            <td>
                                                                <input type="number"  name="fef_2" size="1" class="form-control"
                                                                       style=" -webkit-border-radius: 10px" />
                                                            </td>
                                                            <td align="center">x</td>
                                                            <td>
                                                                <input type="number"  name="fef_3" size="1" class="form-control"
                                                                       style=" -webkit-border-radius: 10px" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5">
                                                                <label for="exampleInputPassword1">
                                                                    <span
                                                                        style="font-size: 15px; font-weight: bold "> Resultado: </span>
                                                                </label>
                                                                <textarea name="lung_result" style="resize: vertical" class="form-control"
                                                                          placeholder="Descrição" rows='4'></textarea>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Data do exame</label>
                                                    <input class="form-control"
                                                           type="date"
                                                           name="exame_chest_date"
                                                    />
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Número do exame</label>
                                                    <input class="form-control"
                                                           type="number"
                                                           name="exame_chest_number"
                                                    />
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Resultado do exame</label>
                                                    <textarea name="exame_chest_result" style="resize: vertical" class="form-control"
                                                              placeholder="Descrição" rows='4'></textarea>
                                                </div>

                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Neoplasias Malignas</label>
                                                    <select name="exame_chest_neoplasms" class="selectpicker" title="Selecione" data-size="5">
                                                        <option value="NAO">NÃO</option>
                                                        <option value="Estomago_C16">Estômoga-C16</option>
                                                        <option value="Laringe_C32">Laringe-C16</option>
                                                        <option value="Mesotelioma_de_Peritonio">Mesotelioma de Peritônio</option>
                                                        <option value="Mesotelioma_de_Pericardio">Mesotelioma de Pericardio</option>
                                                    </select>
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label">Nome responsável </label>
                                                    <input class="form-control"
                                                           type="text"
                                                           name="exame_chest_responsible"
                                                    />
                                                </div>



                                                <div class="form-group">
                                                    <label class="control-label">Anexar documento médico.</label>
                                                    <input class="form-control"
                                                           type="file"
                                                           name="exame_chest_file"
                                                    />
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane" id="tab3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Empresa</label>
                                                    <input class="form-control"
                                                           type="text"
                                                           name="company_name"
                                                    />
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Ramo da empresa (CNAE)</label>
                                                    <input class="form-control"
                                                           type="text"
                                                           name="company_cnae"
                                                    />
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Unidade</label>
                                                    <input class="form-control"
                                                           type="text"
                                                           name="company_unity"
                                                    />
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Data admissão</label>
                                                    <input class="form-control"
                                                           type="date"
                                                           name="company_admission_date"
                                                    />
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Data último períodico</label>
                                                    <input class="form-control"
                                                           type="date"
                                                           name="company_last_date"
                                                    />
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Data de demissão </label>
                                                    <input class="form-control"
                                                           type="date"
                                                           name="company_fired_date"
                                                    />
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Setor </label>
                                                    <input class="form-control"
                                                           type="date"
                                                           name="company_sector"
                                                    />
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Cargo </label>
                                                    <input class="form-control"
                                                           type="text"
                                                           name="company_office"
                                                    />
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">SINAN</label>
                                                    <select name="sinan" class="selectpicker" title="Selecione" data-size="5">
                                                        <option value="NAO">NÃO</option>
                                                        <option value="Acidente_trabalho_grave">ACIDENTE DE TRABALHO GRAVE</option>
                                                        <option value="Cancer_relacionado_trabalho">CÂNCER RELACIONADO AO TRABALHO</option>
                                                        <option value="Dermatoses_ocupacionais">DERMATOSE OCUPACIONAL</option>
                                                        <option value="Ler_Dort">LER/DORT</option>
                                                        <option value="Pneumocoriose">PNEUMOCORIOSE</option>
                                                        <option value="Transtorno_mental">TRANSTORNO MENTAL</option>
                                                        <option value="Pair">PAIR</option>
                                                        <option value="Outros">OUTROS</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Emitida o CAT</label>
                                                    <select name="cat" class="selectpicker" title="Selecione" data-size="2">
                                                        <option value="SIM">SIM</option>
                                                        <option value="NAO">NÃO</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-default btn-fill btn-wd btn-back pull-left">Voltar</button>
                                <button type="button" class="btn btn-info btn-fill btn-wd btn-next pull-right">Próximo</button>
                                <button type="submit" class="btn btn-info btn-fill btn-wd btn-finish pull-right" onclick="onFinishWizard()">Salvar</button>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

@endsection
