@extends('layouts.main')


@section('title', 'SA/SUS - Lista de exames(s) ')

@section('content')
<div class="row">
     <a href="{{route('employees.index')}}" class="btn btn-warning btn-fill pull-right"
        style="margin-right:15px; margin-bottom:8px;">Voltar
     </a>
 </div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Dados</h4>
                    <p class="category">informações registradas</p>
                    <br />
                </div>

                <div class="table-responsive">
                    <table class="table">
                        @foreach ($data as $item)
                        <tr>
                            <th>Nome:</th>
                            <td>{{ $item->name}}</td>
                        </tr>
                        <tr>
                            <th>CPF:</th>
                            <td>{{ $item->cpf}}</td>
                        </tr>
                        <tr>
                            <th>Mãe:</th>
                            <td>{{ $item->mother}}</td>
                        </tr>
                        <tr>
                            <th>RG:</th>
                            <td>{{ $item->rg}}</td>
                        </tr>
                        <tr>
                            <th>Nº SUS:</th>
                            <td>{{ $item->sus_card}}</td>
                        </tr>
                        <tr>
                            <th>Situação:</th>
                            <td>{{ $item->isAlive == 1 ? 'Vivo' : 'morto'}}</td>
                        </tr>
                        @if($item->isAlive != 1)
                        <tr>
                            <th>Causa:</th>
                            <td>{{ $item->deathCause}}</td>
                        </tr>
                        <tr>
                        @endif
                            <th>Mãe:</th>
                            <td>{{ $item->mother}}</td>
                        </tr>
                        <tr>
                            <th>Logradouro:</th>
                            <td>{{ $item->address}}</td>
                        </tr>
                        <tr>
                            <th>Bairro:</th>
                            <td>{{ $item->district}}</td>
                        </tr>
                        <tr>
                            <th>Cidade:</th>
                            <td>{{ $item->city}}</td>
                        </tr>
                        <tr>
                            <th>Estado:</th>
                            <td>{{ $item->state}}</td>
                        </tr>
                            <hr>
                        @forelse($item->exams as $exam)
                           <div class="row">
                                <tr>
                                    <th>Data exame pulmonar: </th>
                                    <td>{{\Carbon\Carbon::parse($exam->examLung_date)->format('d/m/Y')}}</td>
                                </tr>
                                    <div class="form-group">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">
                                                    <span style="font-size: xx-small; ">
                                                        <div
                                                            style="text-align: center;"> Espirometria </div>
                                                    </span>
                                                </th>
                                                <th scope="col">
                                                    <span style="font-size: xx-small; ">
                                                        <div style="text-align: center;"> Predito </div>
                                                    </span>
                                                </th>
                                                <th scope="col">
                                                    <span style="font-size: xx-small; ">
                                                        <div style="text-align: center;"> Medido </div>
                                                    </span>
                                                </th>
                                                <th scope="col">
                                                    <span style="font-size: xx-small; ">
                                                        <div style="text-align: center;"> % </div>
                                                    </span>
                                                </th>
                                                <th scope="col">
                                                    <span style="font-size: xx-small; ">
                                                        <div
                                                            style="text-align: center;"> Limite Inferior </div>
                                                    </span>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <span style="font-size: xx-small; "> CVF </span>
                                                </td>
                                                <td>
                                                    <input class="form-control" value="{{$exam->cvf_1}}" style=" -webkit-border-radius: 10px; text-align: center" readonly/>
                                                </td>
                                                <td>
                                                    <input  class="form-control" value="{{$exam->cvf_2}}" style=" -webkit-border-radius: 10px; text-align: center" readonly/>
                                                </td>
                                                <td align="center">x</td>
                                                <td>
                                                    <input  class="form-control" value="{{$exam->cvf_3}}" style=" -webkit-border-radius: 10px; text-align: center" readonly/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span style="font-size: xx-small; "> VEF1 </span>
                                                </td>
                                                <td>
                                                    <input class="form-control" value="{{$exam->vef_1}}" style=" -webkit-border-radius: 10px; text-align: center" readonly/>
                                                </td>
                                                <td>
                                                    <input class="form-control" value="{{$exam->vef_2}}" style=" -webkit-border-radius: 10px; text-align: center" readonly/>
                                                </td>
                                                <td>x</td>
                                                <td>
                                                    <input class="form-control" value="{{$exam->vef_3}}" style=" -webkit-border-radius: 10px; text-align: center" readonly/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <font size="1"> VEF1/CVF </font>
                                                </td>
                                                <td>
                                                    <input class="form-control" value="{{$exam->vefcvf_1}}" style=" -webkit-border-radius: 10px; text-align: center" readonly/>
                                                </td>
                                                <td>
                                                    <input class="form-control" value="{{$exam->vefcvf_2}}" style=" -webkit-border-radius: 10px; text-align: center" readonly/>
                                                </td>
                                                <td>x</td>
                                                <td>
                                                    <input class="form-control" value="{{$exam->vefcvf_3}}" style=" -webkit-border-radius: 10px; text-align: center" readonly/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span
                                                        style="font-size: xx-small; "> FEF 25% - 75% </span>
                                                </td>
                                                <td>
                                                    <input class="form-control" value="{{$exam->fef_1}}" style=" -webkit-border-radius: 10px; text-align: center" readonly/>
                                                </td>
                                                <td>
                                                    <input class="form-control" value="{{$exam->fef_2}}"style=" -webkit-border-radius: 10px; text-align: center" readonly/>
                                                </td>
                                                <td>x</td>
                                                <td>
                                                    <input class="form-control" value="{{$exam->fef_3}}" style=" -webkit-border-radius: 10px; text-align: center" readonly/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Resultado:</th>
                                                <td colspan="4">
                                                    <textarea style="resize: vertical" class="form-control" readonly
                                                              placeholder="Descrição" rows='4'>{{ $exam->lung_result}}</textarea>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </div> <!-- <div class="form-group"> -->

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="tile">
                                                <div class="form-group">
                                                    <h5>
                                                        <li style="list-style: none; padding-left: 5px;">
                                                            <span
                                                                style="color: blue;">RADIOLOGIA DE TÓRAX</span>
                                                        </li>
                                                    </h5>
                                                </div>

                                                <div class="form-group adjust">
                                                    <label for="exampleInputPassword1">Data do Exame:</label>
                                                    <input class="form-control" style=" -webkit-border-radius: 10px;" readonly
                                                           value="{{\Carbon\Carbon::parse($exam->exam_chest_date)->format('d/m/Y')}}"/>
                                                </div>

                                                <div class="form-group adjust">
                                                    <label for="exampleInputPassword1">Número do Exame:</label>
                                                    <input class="form-control" style=" -webkit-border-radius: 10px;" value="{{$exam->exam_chest_number}}" readonly />
                                                </div>

                                                <div class="form-group adjust">
                                                    <label for="exampleInputPassword1">Resultado do Exame:</label>
                                                    <textarea style="resize: vertical" class="form-control" readonly
                                                              rows='2'>{{ $exam->exam_chest_result}}</textarea>
                                                </div>

                                            </div>
                                        </div> <!-- <div class="col-lg-5"> -->
                                        <div class="col-lg-6 offset-lg-0">
                                            <div class="tile">

                                                <div class="form-group">
                                                    <h5>
                                                        <li style="list-style: none;">
                                                            <span style="color: blue; ">RESPONSÁVEL</span>
                                                        </li>
                                                    </h5>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Nome:</label>
                                                    <input  class="form-control"
                                                           style=" -webkit-border-radius: 10px;" value="{{$exam->exam_chest_responsible}}"  required />
                                                </div>

                                                <div class="form-group">
                                                    <h5>
                                                        <li style="list-style: none; padding-left: 5px; ">
                                                            <span style="color: blue; ">NEOPLASIAS</span>
                                                        </li>
                                                    </h5>
                                                </div>

                                                <div class="form-group adjust">
                                                    <label for="exampleInputPassword1"> Neoplasias Malignas: </label>
                                                    <select class="form-control" disabled>
                                                        @foreach ($neoplams as $neoplasm)
                                                            <option {{ $exam->exam_chest_neoplasms == $neoplasm->id ? 'selected' : ''}}
                                                            >{{ $neoplasm->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>

                                        </div> <!-- <div class="col-lg-5"> -->

                                    </div> <!-- <div class="row"> -->
                               <div class="row">
                                   <div class="col-md-6">

                                       <div class="form-group adjust">
                                           <label for="exampleInputPassword1">Empresa:</label>
                                           <input class="form-control" value="{{$exam->company_name}}"
                                                  style=" -webkit-border-radius: 10px;" readonly>
                                       </div>

                                       <div class="form-group adjust">
                                           <label for="exampleInputPassword1">Ramo da Empresa (CNAE):</label>
                                           <input class="form-control" value="{{$exam->company_cnae}}"
                                                  style=" -webkit-border-radius: 10px;" readonly>
                                       </div>

                                       <div class="form-group adjust">
                                           <label for="exampleInputPassword1">Unidade:</label>
                                           <input class="form-control" value="{{$exam->company_unity}}"
                                                  style=" -webkit-border-radius: 10px;" readonly>
                                       </div>

                                       <div class="form-group adjust">
                                           <label for="exampleInputPassword1">Data de Admissão:</label>
                                           <input class="form-control" value="{{\Carbon\Carbon::parse($exam->company_admission_date)->format('d/m/Y')}} " style=" -webkit-border-radius: 10px;" readonly/>
                                       </div>

                                       <div class="form-group adjust">
                                           <label for="exampleInputPassword1">Data Último Periódico:</label>
                                           <input class="form-control" value="{{\Carbon\Carbon::parse($exam->company_last_date)->format('d/m/Y')}}" style=" -webkit-border-radius: 10px;" readonly/>
                                       </div>

                                   </div>

                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <label for="exampleInputPassword1">Setor:</label>
                                           <input  class="form-control"
                                                   style=" -webkit-border-radius: 10px;" value="{{$exam->company_sector}}"  required />
                                       </div>

                                       <div class="form-group">
                                           <label for="exampleInputPassword1">Cargo:</label>
                                           <input class="form-control" value="{{$exam->company_office}}"
                                                  style=" -webkit-border-radius: 10px; "/>
                                       </div>

                                       <div class="form-group">
                                       <label for="exampleInputPassword1">Emitida o CAT:</label>
                                       <select class="form-control" disabled style=" -webkit-border-radius: 10px;">
                                           @foreach ($cats as $cat)
                                               <option {{ $exam->cat == $cat->id ? 'selected' : ''}}
                                               >{{ $neoplasm->name }}</option>
                                           @endforeach
                                       <select />
                                   </div>
                               </div>


                        @empty
                            <tr class="text-center">
                                <td colspan="2" style="font-weight: 700; font-size: 18px; color: #ff4c30;">Não existe exame cadastrado!</td>
                            </tr>
                        @endforelse
                        @endforeach
                    </table>
                </div>
        </div>
    </div>
    </div>
</div>

@endsection
