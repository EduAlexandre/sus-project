@extends('layouts.main')

@section('title', 'SA - Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-warning text-center">

                                <i class="ti-server"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>Acompanhamento</p>
                                57541
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <hr />
                    <div class="stats">
                        <div class="pull-right" style="position:relative; display:inline-block;"><i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" rel="tooltip" title="adasdasdasdasdasd adasdasdasdasdShows the total price of orders minus cost for ads."></i></div>
                        <i class="ti-clipboard"></i><div class="my-inline-block" id="campaign-name4"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-success text-center">
                                <i class="ti-wallet"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>Procedimentos - PAD</p>
                                1345
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <hr />
                    <div class="stats">
                        <i class="ti-calendar"></i> Last day
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-danger text-center">
                                <i class="ti-pulse"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>CREED</p>
                                230
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <hr />
                    <div class="stats">
                        <i class="ti-timer"></i> In the last hour
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-info text-center">
                                <i class="ti-twitter-alt"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>Intercorrência</p>
                                45
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <hr />
                    <div class="stats">
                        <i class="ti-reload"></i> Updated now
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-sm-6">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col-xs-7">
                            <div class="numbers pull-left">
                                34657
                            </div>
                        </div>
                        <div class="col-xs-5">
                            <div class="pull-right">
												<span class="label label-success">
		 											+18%
												</span>
                            </div>
                        </div>
                    </div>
                    <h6 class="big-title">Procedimentos <span class="text-muted">realizados </span> por <span class="text-muted"> ANO</span></h6>
                    <div id="chartTotalEarnings"></div>
                </div>
                <div class="card-footer">
                    <hr>
                    <div class="footer-title">Financial Statistics</div>
                    <div class="pull-right">
                        <button class="btn btn-info btn-fill btn-icon btn-sm">
                            <i class="ti-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col-xs-7">
                            <div class="numbers pull-left">
                                169
                            </div>
                        </div>
                        <div class="col-xs-5">
                            <div class="pull-right">
												<span class="label label-danger">
		 											-14%
												</span>
                            </div>
                        </div>
                    </div>
                    <h6 class="big-title">Total <span class="text-muted">de Intercorrência</span> por ANO</h6>
                    <div id="chartTotalSubscriptions"></div>
                </div>
                <div class="card-footer">
                    <hr>
                    <div class="footer-title">View all members</div>
                    <div class="pull-right">
                        <button class="btn btn-default btn-fill btn-icon btn-sm">
                            <i class="ti-angle-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-sm-6">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col-xs-7">
                            <div class="numbers pull-left">
                                8,960
                            </div>
                        </div>
                        <div class="col-xs-5">
                            <div class="pull-right">
												<span class="label label-warning">
		 											~51%
												</span>
                            </div>
                        </div>
                    </div>
                    <h6 class="big-title">Total da população <span class="text-muted">carcerária</span> por ANO</h6>
                    <div id="chartTotalDownloads" ></div>
                </div>
                <div class="card-footer">
                    <hr>
                    <div class="footer-title">View more details</div>
                    <div class="pull-right">
                        <button class="btn btn-success btn-fill btn-icon btn-sm">
                            <i class="ti-info"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
