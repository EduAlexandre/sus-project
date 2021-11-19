@extends('layouts.main')

@section('title', 'SAIPM - Registro(s) ')

@section('content')

            <div class="card">  <!-- START template search -->
                <div class="card-header">
                    <h4 class="card-title">Pesquisar policial</h4>
                </div>
                <div class="card-content">
                    <form method="GET" action="{{route('register-occurrences.show')}}" id="seacrhForm" role="search">
                          <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" class="form-control border-input" name="fullname" placeholder="name completo" value="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Nome de guerra</label>
                                    <input type="text" class="form-control border-input" name="warname" placeholder="nome de guerra" value="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Matrícula</label>
                                    <input type="number" name="register" class="form-control border-input" placeholder="matrícula" value="">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd">Pesquisar</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div><!-- END template search -->

            @if(($condition ?? '') == 'found')

                <div class="row"><!-- START template table -->
                    <div class="col-md-12">
                       <div class="card">
                            <div class="card-content">
                                <div class="toolbar">
                                    <!--Here you can write extra buttons/actions for the toolbar-->
                                </div>
                                <div class="fresh-datatables">
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Nome Completo</th>
                                            <th>Nome de Guerra</th>
                                            <th>Graduação</th>
                                            <th>Matrícula</th>
                                            <th class="text-center">Ações</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($searchPoliceman as $searchPolicemans)
                                        <tr>
                                            <td>{{$searchPolicemans->fullname}}</td>
                                            <td>{{$searchPolicemans->warname}}</td>
                                            <td>{{$searchPolicemans->graduate}}</td>
                                            <td>{{$searchPolicemans->register}}</td>

                                            <td class="td-actions text-center">
                                                <a href="register-occurrences.edit/{{$searchPolicemans->id}}"
                                                   rel="tooltip"
                                                   data-toggle="modal"
                                                   data-target="#exampleModal"
                                                   title="Visualizar Cadastro"
                                                   class="btn btn-success btn-simple btn-xs">
                                                    <i class="ti-user"></i>
                                                </a>
                                                <a href="register-occurrences.edit/{{$searchPolicemans->id}}"
                                                   rel="tooltip" data-toggle="modal"
                                                   data-target="#exampleModalOccurrences"
                                                   title="Cadastrar ficha"
                                                   class="btn btn-warning btn-simple btn-xs">
                                                    <i class="ti-pencil-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div><!--  end card  -->
                    </div> <!-- end col-md-12 -->
                </div><!-- END template table -->


            @elseif(($condition ?? '') == 'not_found')
                <p>policial não encontrado,
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        clique aqui para realizar o cadastro
                    </button>
                </p>
            @else
                <p></p>
            @endif

            <!-- start Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{($searchPolicemans->id ?? '') ? 'Editar dados' : 'Cadastro'}}  do policial</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form method="POST">
                                @csrf
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
                                               value="{{$searchPolicemans->register ?? ''}}"
                                        />
                                    </div>
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
                                           value="{{$searchPolicemans->fullname ?? ''}}"
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
                                           value="{{$searchPolicemans->warname ?? ''}}"
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
                                           value="{{$searchPolicemans->admissiondate ?? ''}}"
                                    />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Sexo <star>*</star>
                                    </label>
                                    <select class="selectpicker" required="true" name="sex" title="Selecione"  data-size="2">
                                        <option {{($searchPolicemans->sex ?? '')  == 'MASCULINO' ? 'selected' : ''}} value="MASCULINO">MASCULINO</option>
                                        <option {{($searchPolicemans->sex ?? '') == 'FEMININA' ? 'selected' : ''}} value="FEMININA">FEMININA</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Graduação<star>*</star>
                                    </label>
                                    <select class="selectpicker" required="true" name="graduate" title="Selecione"  data-size="5">
                                        @if($allGraduate ?? '')
                                            @foreach($allGraduate as $key => $allGraduates)
                                                <option value="{{$allGraduates->abbreviation}}" {{$allGraduates->abbreviation == ($searchPolicemans->graduate ?? '') ? 'selected' : ''}}>{{$allGraduates->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Quadro<star>*</star>
                                    </label>
                                    <select class="selectpicker" required="true" name="painting"  data-size="5">
                                        @if($allPolicemanPainting ?? '')
                                            @foreach($allPolicemanPainting as $key => $allPolicemanPaintings)
                                                <option value="{{$allPolicemanPaintings->name}}" {{$allPolicemanPaintings->name == ($searchPolicemans->painting ?? '') ? 'selected' : ''}}>{{$allPolicemanPaintings->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Situação <star>*</star>
                                    </label>
                                    <select class="selectpicker" required="true" name="situation" title="Selecione"  data-size="2">
                                        <option {{($searchPolicemans->situation ?? '') == 'ATIVO' ? 'selected' : ''}} value="ATIVO">ATIVO</option>
                                        <option {{($searchPolicemans->situation ?? '') == 'INATIVO' ? 'selected' : ''}} value="INATIVO">INATIVO</option>
                                    </select>
                                </div>
                                <div class="category"><star>*</star> Campos Obrigatórios</div>
                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="button" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </div>
                </div>
            </div><!-- end Modal -->


            <!-- start Modal occurrences -->
            <div class="modal fade" id="exampleModalOccurrences" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cadastro de na Ficha do policial</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                <div class="modal-body">
                    <div class="card-content">
                        <div id="acordeon">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-border panel-default">
                                    <a data-toggle="collapse" href="#collapseOne">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                Default Collapsible Item 1
                                                <i class="ti-angle-down"></i>
                                            </h4>
                                        </div>
                                    </a>
                                    <div id="collapseOne" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-border panel-default">
                                    <a data-toggle="collapse" href="#collapseTwo">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                Default Collapsible Item 1
                                                <i class="ti-angle-down"></i>
                                            </h4>
                                        </div>
                                    </a>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-border panel-default">
                                    <a data-toggle="collapse" href="#collapseThree">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                Default Collapsible Item 1
                                                <i class="ti-angle-down"></i>
                                            </h4>
                                        </div>
                                    </a>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--  end acordeon -->
                    </div>
                </div>
            </div><!-- end Modal occurrences  -->
@include('sweetalert::alert')
@endsection

