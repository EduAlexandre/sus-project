@extends('layouts.main')

@section('title', 'SA/SUS - Editar - Registro(s) ')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <form method="POST" id="update_data_policeman">
                <input type="hidden" id="data_id" value="{{$data->id}}">
                @csrf
                <div class="col-lg-6 col-sm-6">
                    <div class="card">
                        <ul id="erros_form"></ul>
                        <div class="card-header">
                            <h4 class="card-title">
                                <u><strong>Edição de dados</strong></u>
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
                                       value="{{$data->name ?? ''}}"
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
                                       value="{{$data->mother ?? ''}}"
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
                                       value="{{$data->cpf ?? ''}}"
                                       type="text"
                                       required="true"
                                       autocomplete="off"
                                       oninput="mascara(this)"
                                />
                                <p style="color: red">{{$errors->has('cpf') ? $errors->first('cpf') : ''}}</p>
                            </div>

                            <div class="form-group">
                                <label class="control-label">
                                    RG
                                    <star>*</star>
                                </label>
                                <input class="form-control"
                                       id="rg"
                                       name="rg"
                                       value="{{$data->rg ?? ''}}"
                                       type="number"
                                       required="true"
                                       autocomplete="off"
                                />
                                <p style="color: red">{{$errors->has('rg') ? $errors->first('rg') : ''}}</p>
                            </div>

                            <div class="form-group">
                                <label class="control-label">
                                    Número cartão do SUS
                                    <star>*</star>
                                </label>
                                <input class="form-control"
                                       id="sus_card"
                                       name="sus_card"
                                       value="{{$data->sus_card ?? ''}}"
                                       type="number"
                                       required="true"
                                       autocomplete="off"
                                />
                                <p style="color: red">{{$errors->has('sus_card') ? $errors->first('sus_card') : ''}}</p>
                            </div>

                            <div class="form-group">
                                <label class="control-label">
                                    Situação do trabalhador
                                    <star>*</star>
                                </label>
                                <div class="radio">
                                    <input
                                        required
                                        type="radio"
                                        name="is_alive"
                                        value="SIM"
                                        id="radio1"
                                        {{$data->isAlive == 'SIM' ? 'checked' : ''}}
                                        onclick="if(document.getElementById('death_cause').disabled==false)
                                        {
                                            document.getElementById('death_cause').disabled=true
                                            clearContent()
                                        }"
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
                                        value="NAO"
                                        id="radio2"
                                        {{$data->isAlive == 'NAO' ? 'checked' : ''}}
                                        onclick="if(document.getElementById('death_cause').disabled==true){document.getElementById('death_cause').disabled=false }"
                                    >
                                    <label for="radio2">
                                        Óbito
                                    </label>
                                </div>
                                <p style="color: red">{{$errors->has('is_alive') ? $errors->first('is_alive') : ''}}</p>
                            </div>

                        </div>

                    </div>
                </div><!--end div col-lg-6 -->


                <div class="col-lg-6 col-sm-6">
                    <ul id="erros_form"></ul>
                    <div class="card">
                        <div class="card-content">

                            <div class="form-group">
                                <label class="control-label"> Informe as possiveis causas do falecimento: </label>
                                <textarea style="resize: vertical" class="form-control" onkeyup="changeUppercase(this)" id="death_cause" name="death_cause" {{$data->isAlive == 'NAO' ? : 'disabled'}}>
                                     {{$data->deathCause ?? ''}}
                                </textarea>

                                <p style="color: red">{{$errors->has('death_cause') ? $errors->first('death_cause') : ''}}</p>
                            </div>


                            <div class="form-group">
                                <label class="control-label">
                                    Logradouro
                                    <star>*</star>
                                </label>
                                <input class="form-control"
                                       name="address"
                                       value="{{$data->address ?? ''}}"
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
                                       value="{{$data->district ?? ''}}"
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
                                       value="{{$data->city ?? ''}}"
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
                                    @foreach($listStates as $key => $allStates)
                                        <option value="{{$allStates->abbreviation}}" {{$data->state == $allStates->abbreviation ? 'selected' : ''}}>{{$allStates->name}}</option>
                                    @endforeach
                                </select>
                                <p style="color: red">{{$errors->has('state') ? $errors->first('state') : ''}}</p>
                            </div>
                            <div class="category">
                                <star>*</star>
                                Campos Obrigatórios
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" id="update_button_data" class="btn btn-info btn-fill pull-right">Editar</button>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div><!-- END CARD DIV -->
            </form>


        </div><!--END DIV ROW -->

    </div><!--END DIV FLUID -->



@include('sweetalert::alert')
@endsection
@section('add_cpf_mask')
    <script>

        function clearContent()
        {
            document.getElementById("death_cause").value='';
        }
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
@section('edit_employee_data')
    <script>
        $(document).ready(function (){
            var id = $('#data_id').val()
            $(document).on('submit', '#update_data_policeman', function (e) {
                e.preventDefault()
                let formData = new FormData($('#update_data_policeman')[0])
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: `/employee/update/${id}`,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.status == 400)
                        {
                            $('#erros_form').html("")
                            $('#erros_form').addClass('alert alert-danger')
                            $.each(response.errors, function (key, err_values){
                                $('#erros_form').append('<li>'+err_values+'</li>')
                            })
                        }else{
                            $('#success_message').html("")
                            sweetAlert('Dados', 'Atualizado com sucesso!', 'success')
                            $('#erros_form').removeClass('alert alert-danger')
                            $('#erros_form').html("")
                            setTimeout(() => { window.location.href = `/employee/list/${id}`}, 1000);
                        }
                    },
                    error: function (res){
                        alert(res)
                    }
                })
            })
            // INICIO - função resposavel para capturar se o campo foi ou não clicado para ativar o botão de atualizar dados
            $(function () {
                var $inputs = $("input, select", "#update_data_policeman"),
                    $button = $("#update_button_data");
                var limpos = 0;
                // verificação inicial
                $inputs.each(function () {
                    var $this = $(this);
                    var val = $this.val();
                    val || limpos++;
                });
                $button.prop("disabled", !!limpos);
                $inputs.on("change, change keyup mouseup, click", function () {
                    var $this = $(this);
                    var val = $this.val();
                    limpos += (val != '' ? 0 : 1)
                    $button.prop("disabled", false);
                });
            });
            // FIM - função resposavel para capturar se o campo foi ou não clicado para ativar o botão de atualizar dados
        })
    </script>
@endsection


