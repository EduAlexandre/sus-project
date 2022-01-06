@extends('layouts.main')

@section('title', 'SA/SUS - Usuários')

@section('content')
<div class="container-fluid">
        <div class="row">
            <form action="{{$action}}" method="post">
                @csrf

        @isset($employee)
            @method('PUT')
        @endisset
                <div class="col-lg-6 col-sm-6">
                    <div class="card">
                        <ul id="erros_form"></ul>
                        <div class="card-header">
                            <h4 class="card-title">
                                <u><strong>{{@$employee ? 'Atualizar dados' : 'Cadastrar Funcionário'}}</strong></u>
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="form-group">
                                <label class="control-label">
                                    Nome
                                    <star>*</star>
                                </label>
                                <input class="form-control @error('name') error @enderror"
                                    name="name"
                                    value="{{old('name', $employee->name ?? '')}}"
                                    type="text"
                                    autocomplete="off"
                                    onkeyup="changeUppercase(this)"

                                />
                            @error('name')
                                <p style="color: red">{{$message}}</p>
                            @enderror

                            </div>

                            <div class="form-group">
                                <label class="control-label">
                                    Nome da mãe
                                    <star>*</star>
                                </label>
                                <input class="form-control @error('mother') error @enderror"
                                    name="mother"
                                    value="{{old('mother', $employee->mother ?? '')}}"
                                    type="text"
                                    autocomplete="off"
                                    onkeyup="changeUppercase(this)"
                                />
                            @error('mother')
                                <p style="color: red">{{$message}}</p>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label">
                                    CPF
                                    <star>*</star>
                                </label>
                                <input class="form-control @error('cpf') error @enderror"
                                    id="cpf"
                                    name="cpf"
                                    value="{{old('cpf', $employee->cpf ?? '')}}"
                                    type="text"
                                    autocomplete="off"
                                    oninput="mascara(this)"
                                />
                            @error('cpf')
                                <p style="color: red">{{$message}}</p>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label">
                                    RG
                                    <star>*</star>
                                </label>
                                <input class="form-control @error('rg') error @enderror"
                                    id="rg"
                                    name="rg"
                                    value="{{old('rg', $employee->rg ?? '')}}"
                                    type="number"
                                    autocomplete="off"
                                />
                            @error('rg')
                                <p style="color: red">{{$message}}</p>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label">
                                    Número cartão do SUS
                                    <star>*</star>
                                </label>
                                <input class="form-control @error('sus_card') error @enderror"
                                    id="sus_card"
                                    name="sus_card"
                                    value="{{old('sus_card', $employee->sus_card ?? '')}}"
                                    type="number"
                                    autocomplete="off"
                                />
                            @error('sus_card')
                                <p style="color: red">{{$message}}</p>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label @error('isAlive') error @enderror">
                                    Situação do trabalhador
                                    <star>*</star>
                                </label>
                                @foreach ($situations as $situation)
                                    <label>
                                        <input type="radio" name="isAlive" value="{{$situation->id}}"
                                            {{old('isAlive', $employee->isAlive ?? '') == $situation->id ? 'checked' : ''}}/>
                                        <span>{{$situation->name}}</span>
                                    </label>
                                @endforeach
                            @error('isAlive')
                                <p style="color: red">{{$message}}</p>
                            @enderror
                            </div>

                        </div>

                    </div>
                </div><!--end div col-lg-6 -->


                <div class="col-lg-6 col-sm-6">
                    <ul id="erros_form"></ul>
                    <div class="card">
                        <div class="card-content">

                            <div class="form-group">
                                <label for="exampleInputPassword1"> Informe as possiveis causas do falecimento: </label>
                                <textarea
                                    class="form-control"
                                    onkeyup="changeUppercase(this)"
                                    id="deathCause"
                                    name="deathCause"

                                    rows="3" cols="3"
                                >
                                    {{old('death_cause', $employee->deathCause ?? '')}}
                                </textarea>

                            @error('deathCause')
                                <p style="color: red">{{$message}}</p>
                            @enderror
                            </div>


                            <div class="form-group">
                                <label class="control-label">
                                    Logradouro
                                    <star>*</star>
                                </label>
                                <input class="form-control @error('address') error @enderror"
                                    name="address"
                                    value="{{old('address', $employee->address ?? '')}}"
                                    type="text"
                                    autocomplete="off"
                                    onkeyup="changeUppercase(this)"
                                />
                            @error('address')
                                <p style="color: red">{{$message}}</p>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label">
                                    Bairro
                                    <star>*</star>
                                </label>
                                <input class="form-control @error('district') error @enderror"
                                    name="district"
                                    value="{{old('district', $employee->district ?? '')}}"
                                    type="text"
                                    autocomplete="off"
                                    onkeyup="changeUppercase(this)"
                                />
                            @error('district')
                                <p style="color: red">{{$message}}</p>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label">
                                    Cidade
                                    <star>*</star>
                                </label>
                                <input class="form-control @error('city') error @enderror"
                                    name="city"
                                    value="{{old('city', $employee->city ?? '')}}"
                                    type="text"
                                    autocomplete="off"
                                    onkeyup="changeUppercase(this)"
                                />
                            @error('city')
                                <p style="color: red">{{$message}}</p>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label">
                                    Estado
                                    <star>*</star>
                                </label>
                                <select class="selectpicker" name="state" title="Selecione" data-size="5">
                                    @foreach($states as $states)
                                        <option value="{{$states->abbreviation}}" {{old('state', $employee->state ?? '' ) == $states->abbreviation ? 'selected' : ''}}>{{$states->name}}</option>
                                    @endforeach
                                </select>
                            @error('state')
                                <p style="color: red">{{$message}}</p>
                            @enderror
                            </div>
                            <div class="category">
                                <star>*</star>
                                Campos Obrigatórios
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit"  class="btn btn-info btn-fill pull-right">{{@$employee ? 'Atualizar' : 'Cadastrar'}}</button>
                            <a href="{{route("employees.index")}}" style="margin-right:8px; " class="btn btn-warning btn-fill pull-right">Voltar</a>
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
