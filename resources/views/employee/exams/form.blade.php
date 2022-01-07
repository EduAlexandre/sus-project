@extends('layouts.main')

@section('title', 'SA/SUS - Registro de exame ')

@section('content')
            <div class="row">
                <div class="row" style="margin-bottom: 8px; margin-right: 12px;">
                    <a href="{{route('employees.index')}}"  class="btn btn-warning btn-fill pull-right">Voltar</a>
                </div>
                <div class="col-md-12 col-md-offset-0">
                    <div class="card card-wizard" id="wizardCard">
                        <form action="{{@$action}}" id="wizardForm" method="post" enctype="multipart/form-data">
                            @csrf
                            @isset($employee)
                                @method('PUT')
                            @endisset

                            <input type="hidden" name="employees_id" value="{{$employee->id}}">
                            <div class="card-header text-center">
                                <h4 class="card-title" style="font-weight: bold"><span style="color: orangered; font-weight: bold;">Paciente:</span> {{$exam->id}} {{$employee->name}}</h4>
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
                                                            name="examLung_date"
                                                            value="{{old('examLung_date', $employee->name ?? '')}}"
                                                        />
                                                    </div>
                                                    @error('examLung_date')
                                                        <p style="color: red">{{$message}}</p>
                                                    @enderror
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
                                                        @error('cvf_1')
                                                            <p style="color: red">{{$message}}</p>
                                                        @enderror
                                                            </td>
                                                            <td>
                                                                <input type="number"  name="cvf_2" class="form-control"
                                                                    style=" -webkit-border-radius: 10px" />
                                                        @error('cvf_2')
                                                            <p style="color: red">{{$message}}</p>
                                                        @enderror
                                                            </td>
                                                            <td align="center">x</td>
                                                            <td>
                                                                <input type="number"  name="cvf_3" class="form-control"
                                                                    style=" -webkit-border-radius: 10px" />
                                                            @error('cvf_3')
                                                                <p style="color: red">{{$message}}</p>
                                                            @enderror
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span style="font-size: 12px; font-weight: bold "> VEF1 </span>
                                                            </td>
                                                            <td>
                                                                <input type="number"  name="vef_1" size="1" class="form-control"
                                                                    style=" -webkit-border-radius: 10px" />
                                                            @error('vef_1')
                                                                <p style="color: red">{{$message}}</p>
                                                            @enderror
                                                            </td>
                                                            <td>
                                                                <input type="number"  name="vef_2" size="1" class="form-control"
                                                                    style=" -webkit-border-radius: 10px" />
                                                            @error('vef_2')
                                                                <p style="color: red">{{$message}}</p>
                                                            @enderror
                                                            </td>
                                                            <td align="center">x</td>
                                                            <td><input type="number"  name="vef_3" size="1" class="form-control"
                                                                    style=" -webkit-border-radius: 10px" />
                                                            @error('vef_3')
                                                                <p style="color: red">{{$message}}</p>
                                                            @enderror
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span style="font-size: 12px; font-weight: bold "> VEF1/CVF </span>
                                                            </td>
                                                            <td>
                                                                <input type="number"  name="vefcvf_1" size="1" class="form-control"
                                                                    style=" -webkit-border-radius: 10px" />
                                                            @error('vefcvf_1')
                                                                <p style="color: red">{{$message}}</p>
                                                            @enderror
                                                            </td>
                                                            <td>
                                                                <input type="number"  name="vefcvf_2" size="1" class="form-control"
                                                                    style=" -webkit-border-radius: 10px" />
                                                            @error('vefcvf_2')
                                                                <p style="color: red">{{$message}}</p>
                                                            @enderror
                                                            </td>
                                                            <td align="center">x</td>
                                                            <td>
                                                                <input type="number"  name="vefcvf_3" size="1" class="form-control"
                                                                    style=" -webkit-border-radius: 10px" />
                                                            @error('vefcvf_3')
                                                                <p style="color: red">{{$message}}</p>
                                                            @enderror
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span style="font-size: 12px; font-weight: bold "> FEF 25% - 75% </span>
                                                            </td>
                                                            <td>
                                                                <input type="number"  name="fef_1" size="1" class="form-control"
                                                                    style=" -webkit-border-radius: 10px" />
                                                            @error('fef_1')
                                                                <p style="color: red">{{$message}}</p>
                                                            @enderror
                                                            </td>
                                                            <td>
                                                                <input type="number"  name="fef_2" size="1" class="form-control"
                                                                    style=" -webkit-border-radius: 10px" />
                                                            @error('fef_2')
                                                                <p style="color: red">{{$message}}</p>
                                                            @enderror
                                                            </td>
                                                            <td align="center">x</td>
                                                            <td>
                                                                <input type="number"  name="fef_3" size="1" class="form-control"
                                                                    style=" -webkit-border-radius: 10px" />
                                                            @error('fef_3')
                                                                <p style="color: red">{{$message}}</p>
                                                            @enderror
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5">
                                                                <label for="exampleInputPassword1">
                                                                    <span
                                                                        style="font-size: 15px; font-weight: bold "> Resultado: </span>
                                                                </label>
                                                                <textarea name="lung_result" style="resize: vertical" class="form-control"
                                                                        placeholder="Descrição" rows='4' onkeyup="changeUppercase(this)"></textarea>
                                                            @error('lung_result')
                                                                <p style="color: red">{{$message}}</p>
                                                            @enderror
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
                                                        name="exam_chest_date"
                                                    />
                                                @error('exam_chest_date')
                                                    <p style="color: red">{{$message}}</p>
                                                @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Número do exame</label>
                                                    <input class="form-control"
                                                        type="number"
                                                        name="exam_chest_number"
                                                    />
                                                @error('exam_chest_number')
                                                    <p style="color: red">{{$message}}</p>
                                                @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Resultado do exame</label>
                                                    <textarea name="exam_chest_result" style="resize: vertical" class="form-control"
                                                            placeholder="Descrição" rows='4' onkeyup="changeUppercase(this)"></textarea>
                                                @error('exam_chest_result')
                                                    <p style="color: red">{{$message}}</p>
                                                @enderror
                                                </div>

                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Neoplasias Malignas</label>
                                                    <select name="exam_chest_neoplasms" class="selectpicker" title="Selecione" data-size="5">
                                                    @foreach ($neoplasms as $neoplasm)
                                                        <option value="{{ $neoplasm->id }}"
                                                            {{old('cities_id') == $neoplasm->id ? 'selected' : ''}}
                                                            >{{ $neoplasm->name }}</option>
                                                    @endforeach
                                                    </select>
                                                @error('exam_chest_neoplasms')
                                                    <p style="color: red">{{$message}}</p>
                                                @enderror
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label">Nome responsável </label>
                                                    <input class="form-control"
                                                        type="text"
                                                        name="exam_chest_responsible"
                                                        onkeyup="changeUppercase(this)"
                                                    />
                                                @error('exam_chest_responsible')
                                                    <p style="color: red">{{$message}}</p>
                                                @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Anexar documento médico
                                                    </label>
                                                    <input
                                                        class="form-control"
                                                        type="file"
                                                        name="appendant"
                                                        accept=".pdf,.doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                                                    >
                                                @error('appendant')
                                                    <p style="color: red">{{$message}}</p>
                                                @enderror
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
                                                        onkeyup="changeUppercase(this)"
                                                    />
                                                @error('company_name')
                                                    <p style="color: red">{{$message}}</p>
                                                @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Ramo da empresa (CNAE)</label>
                                                    <input class="form-control"
                                                        type="text"
                                                        name="company_cnae"
                                                        onkeyup="changeUppercase(this)"
                                                    />
                                                @error('company_cnae')
                                                    <p style="color: red">{{$message}}</p>
                                                @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Unidade</label>
                                                    <input class="form-control"
                                                        type="text"
                                                        name="company_unity"
                                                        onkeyup="changeUppercase(this)"
                                                    />
                                                @error('company_unity')
                                                    <p style="color: red">{{$message}}</p>
                                                @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Data admissão</label>
                                                    <input class="form-control"
                                                        type="date"
                                                        name="company_admission_date"
                                                    />
                                                @error('company_admission_date')
                                                    <p style="color: red">{{$message}}</p>
                                                @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Data último períodico</label>
                                                    <input class="form-control"
                                                        type="date"
                                                        name="company_last_date"
                                                    />
                                                @error('company_last_date')
                                                    <p style="color: red">{{$message}}</p>
                                                @enderror
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Data de demissão </label>
                                                    <input class="form-control"
                                                        type="date"
                                                        name="company_fired_date"
                                                    />
                                                @error('company_fired_date')
                                                    <p style="color: red">{{$message}}</p>
                                                @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Setor </label>
                                                    <input class="form-control"
                                                        type="text"
                                                        name="company_sector"
                                                        onkeyup="changeUppercase(this)"
                                                    />
                                                @error('company_sector')
                                                    <p style="color: red">{{$message}}</p>
                                                @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Cargo </label>
                                                    <input class="form-control"
                                                        type="text"
                                                        name="company_office"
                                                        onkeyup="changeUppercase(this)"
                                                    />
                                                @error('company_office')
                                                    <p style="color: red">{{$message}}</p>
                                                @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">SINAN</label>
                                                    <select name="sinan" class="selectpicker" title="Selecione" data-size="5">
                                                    @foreach ($sinans as $sinan)
                                                        <option value="{{ $sinan->id }}"
                                                            {{old('cities_id', $properties->cities->id ?? '') == $sinan->id ? 'selected' : ''}}
                                                            >{{ $sinan->name }}</option>
                                                    @endforeach
                                                    </select>
                                                @error('sinan')
                                                    <p style="color: red">{{$message}}</p>
                                                @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Emitida o CAT</label>
                                                    <select name="cat" class="selectpicker" title="Selecione" data-size="2">
                                                    @foreach ($cats as $cat)
                                                        <option value="{{ $cat->id }}"
                                                            {{old('cities_id', $properties->cities->id ?? '') == $cat->id ? 'selected' : ''}}
                                                            >{{ $cat->name }}</option>
                                                    @endforeach
                                                    </select>
                                                @error('cat')
                                                    <p style="color: red">{{$message}}</p>
                                                @enderror
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
