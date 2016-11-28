<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>INICIO</h2>
        <ol class="breadcrumb">
            <li class="active">
                <strong>INICIO</strong>
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
                        <span>USUARIOS & ROLES</span>
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
                        <span> MODULS </span>

                        <h2 class="font-bold">10</h2>
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
                        <span> New messages </span>

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
                        <span> Alerts </span>

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
                        Ticket
                    </h3>
                </div>

                <div class="m-t-sm">

                    <div class="row">
                        <div class="col-md-10" ng-controller="chartJsCtrl as chart">
                            <div>
                                <canvas linechart options="chart.lineOptions" data="chart.lineDataDashboard4" height="114" responsive=true ></canvas>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <ul class="stat-list m-t-lg">
                                <li>
                                    <h2 class="no-margins">2,346</h2>
                                    <small>Total tickets in period</small>
                                    <div class="progress progress-mini">
                                        <div class="progress-bar" style="width: 48%;"></div>
                                    </div>
                                </li>
                                <li>
                                    <h2 class="no-margins ">4,422</h2>
                                    <small>Tickets in last month</small>
                                    <div class="progress progress-mini">
                                        <div class="progress-bar" style="width: 60%;"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="m-t-md">
                    <small class="pull-right">
                        <i class="fa fa-clock-o"> </i>
                        Update on 16.07.2015
                    </small>
                    <small>
                        <strong>Analysis of sales:</strong> The value has been changed over time, and last month reached a level over $50,000.
                    </small>
                </div>

            </div>
        </div>
     </div>

    </div>



</div>