@extends('layouts.main')
@section('title', 'SA - Dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-6 col-sm-6">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col-xs-7">
                            <div class="numbers pull-left">
                                {{ @$employees}}
                            </div>
                        </div>
                        <div class="col-xs-5">
                        </div>
                    </div>
                    <h6 class="big-title">Total de funcionários  cadastrados </h6>
                    <div id="chartTotalEarnings"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col-xs-7">
                            <div class="numbers pull-left">
                                {{ @$exams}}
                            </div>
                        </div>
                        <div class="col-xs-5">
                        </div>
                    </div>
                    <h6 class="big-title">Total d exames cadastrados</h6>
                    <div id="chartTotalSubscriptions"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
