<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{ 'TICKET_SYSTEM ' | translate }}</h2>
        <ol class="breadcrumb">
            <li>
                <a ui-sref="index.main">{{ 'HOME ' | translate }}</a>
            </li>
            <li>
                <a ui-sref="index.ticket">{{ 'TICKET_SYSTEM ' | translate }}</a>
            </li>
            <li class="active">
                <strong>{{ 'DETALL ' | translate }}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="row form-horizontal" ng-controller="TicketEditCtrl">
    <div class="row" ng-if="'yes'==loading">
        <div class="spiner-example">
            <div class="sk-spinner sk-spinner-chasing-dots">
                <div class="sk-dot1"></div>
                <div class="sk-dot2"></div>
            </div>
        </div>
    </div>    
    <div class="col-lg-10 col-lg-offset-1" ng-if="viewticket == 'yes'">
    <div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox">
    <div class="ibox-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="m-b-md">
                <h2><b>Ticket #0001 <button type="button" class="btn btn-primary pull-right">Actualizar</button></b></h2>
            </div>
        </div>
    </div>        
    <div class="row">   
        <div class="col-lg-6">
            <div class="form-group">
                <input type="hidden" ng-model='roles.Id'>
                <label class="col-sm-4 control-label">{{ 'TITLE' | translate }}:</label>
                <div class="col-sm-8"><input type="text" class="form-control" ng-model='roles.Name' required></div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <input type="hidden" ng-model='roles.Id'>
                <label class="col-sm-4 control-label">{{ 'DEPARTAMENT' | translate }}:</label>
                <div class="col-sm-8"><input type="text" class="form-control" ng-model='roles.Name' required></div>
            </div>
        </div>
    </div>
    <div class="row">   
        <div class="col-lg-6">
            <div class="form-group">
                <input type="hidden" ng-model='roles.Id'>
                <label class="col-sm-4 control-label">{{ 'TYPE' | translate }}:</label>
                <div class="col-sm-8"><input type="text" class="form-control" ng-model='roles.Name' required></div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <input type="hidden" ng-model='roles.Id'>
                <label class="col-sm-4 control-label">{{ 'PRIORITY' | translate }}:</label>
                <div class="col-sm-8"><input type="text" class="form-control" ng-model='roles.Name' required></div>
            </div>
        </div>
    </div>
    <div class="row">   
        <div class="col-lg-6">
            <div class="form-group">
                <input type="hidden" ng-model='roles.Id'>
                <label class="col-sm-4 control-label">{{ 'CLIENT' | translate }}:</label>
                <div class="col-sm-8"><input type="text" class="form-control" ng-model='roles.Name' required></div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <input type="hidden" ng-model='roles.Id'>
                <label class="col-sm-4 control-label">{{ 'ASSIGNED_TO_TECHNICIAN' | translate }}:</label>
                <div class="col-sm-8"><input type="text" class="form-control" ng-model='roles.Name' required></div>
            </div>
        </div>
    </div>
    <div class="row">   
        <div class="col-lg-6">
            <div class="form-group">
                <input type="hidden" ng-model='roles.Id'>
                <label class="col-sm-4 control-label">{{ 'STATUS' | translate }}:</label>
                <div class="col-sm-8"><input type="text" class="form-control" ng-model='roles.Name' required></div>
            </div>
        </div>
        <div class="col-lg-6">

        </div>
    </div>                    
    <div class="row">
        <div class="col-lg-5">
            <dl class="dl-horizontal">
                <dt>{{ 'CREATED' | translate }}:</dt>
                <dd>{{Created}}</dd>         
            </dl>
        </div>
        <div class="col-lg-7" id="cluster_info">
            <dl class="dl-horizontal">
                <dt>{{ 'LAST_UPDATED' | translate }}:</dt>
                <dd>{{LastUpdate}}</dd>
            </dl>
        </div>
    </div>
    <div class="row m-t-sm">
     <div class="col-lg-12">
        <div class="panel blank-panel ui-tab">
            <uib-tabset>
                <uib-tab heading="Informado" active="tab.active" class="dsads">
                    <div class="feed-activity-list">
                        <div class="feed-element">
                            <a href="" class="pull-left">
                                <img alt="image" class="img-circle" ng-src="img/perfil/{{Photo}}">
                            </a>

                            <div class="media-body ">
                                <small class="pull-right">2h ago</small>
                                <strong>{{Client}}</strong><br>
                                <small class="text-muted">{{Created}}</small>
                                <div class="well" ng-bind-html="Description">
                                </div>
                            </div>
                        </div>

                        <div class="feed-element" ng-repeat="data in message">
                            <a href="" class="pull-left">
                                <img alt="image" class="img-circle" ng-src="img/perfil/{{data.photo}}">
                            </a>

                            <div class="media-body ">
                                <small class="pull-right">2h ago</small>
                                <strong>{{data.users}}</strong><br>
                                <small class="text-muted">{{data.created}}</small>
                                <div class="well" ng-bind-html="data.comment">
                                </div>
                            </div>
                        </div>            

                        <div class="feed-element">
                            <a href="" class="pull-left">
                                <img alt="image" class="img-circle" ng-src="img/perfil/{{User.photo}}">
                            </a>

                            <div class="media-body ">
                                <strong>{{User.User}}</strong><br>
                                <div class="well">
                                    <div ng-click="Open()" ng-if="open == 'yes'">{{'Click_Ticket'| translate}}</div>
                                    <div ng-if="openresponde == 'yes'">
                                     <form  class="form-horizontal" ng-submit="submit()">
                                        <textarea  class="form-control" ng-model="Ticket.Description" ckeditor required></textarea>
                                        <button type="submit" class="btn btn-primary">{{ 'REPLAY' | translate }}</button>
                                        <button type="button" ng-click="Close()" class="btn btn-danger">{{ 'CANCEL' | translate }}</button>
                                     </form> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </uib-tab>
            </uib-tabset>
        </div>
     </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</div>
