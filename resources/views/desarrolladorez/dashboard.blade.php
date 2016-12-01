<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>INICIO</h2>
        <ol class="breadcrumb">
            <li class="active">
                <strong>{{ 'HOME ' | translate }}</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight" ng-controller="DashboardCtrl">
    <div class="row" ng-if="'yes'==loading">
        <div class="spiner-example">
            <div class="sk-spinner sk-spinner-chasing-dots">
                <div class="sk-dot1"></div>
                <div class="sk-dot2"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
          <a ui-sref="index.user">
            <div class="widget style1 navy-bg">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <span>{{ 'USER_ROLES ' | translate }}</span>
                        <h2 class="font-bold">{{dashboard.user}}</h2>
                    </div>
                </div>
            </div>
          </a>
        </div>    
        <div class="col-lg-3">            
          <a ui-sref="index.module_generator">    
            <div class="widget style1 navy-bg">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-cube fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <span> {{ 'MODULS ' | translate }} </span>

                        <h2 class="font-bold">{{dashboard.moduls}}</h2>
                    </div>
                </div>
            </div>
           </a> 
        </div>
        <div class="col-lg-3">
            <div class="widget style1 lazur-bg">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-envelope-o fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <span> {{ 'NEW_MESSAGE' | translate }} </span>

                        <h2 class="font-bold">{{dashboard.messages}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="widget style1 yellow-bg">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-bell fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <span> {{ 'ALERTS' | translate }} </span>

                        <h2 class="font-bold">12</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
     <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div>
                    <h3 class="font-bold no-margins">
                        {{'SUPPORT_TICKET' | translate}} EN 2016
                    </h3>
                </div>

                <div class="m-t-sm">

                    <div class="row">
                        <div class="col-md-9">
                            <div>
                                <canvas id="line" class="chart chart-line" chart-data="data" chart-labels="labels" chart-series="series" chart-options="options" chart-dataset-override="datasetOverride" chart-click="onClick"></canvas> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2 class="no-margins">{{dashboard.totalTicket}}</h2>
                                        <small>Total tickets in period</small>
                                        <div class="progress progress-mini">
                                        <div class="progress-bar" style="width: 48%;"></div>
                                    </div> 
                                </div>
                            </div>    
                                <br>
                            <div class="row">
                                <div class="col-lg-12">                                 
                                     <table class="table">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <button type="button" class="btn btn-info m-r-sm">12</button>
                                                Total Nuevo
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button" class="btn btn-warning m-r-sm">12</button>
                                                Total En espera
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button" class="btn btn-success m-r-sm">12</button>
                                                Total Resuelto
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button" class="btn btn-danger m-r-sm">12</button>
                                                Total Cerrado
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
     </div>

    </div>



</div>