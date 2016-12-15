<toaster-container></toaster-container>
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
<div class="row" ng-controller="TicketEditCtrl">
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
    <form class="form-horizontal" ng-submit="update()">
    <div class="row">
        <div class="col-lg-12">
            <div class="m-b-md">
                <h2><b>Ticket # {{ticket.IdTicket}} <button type="submit" class="btn btn-primary pull-right ladda-button" ladda="btnload" ng-if="privilegios.is_edit">Actualizar</button> 
                     <button type="button" class="btn btn-danger pull-right" ng-if="privilegios.is_delete">DELETE</button>
                </b></h2>
            </div>
        </div>
    </div>        
    <div class="row">   
        <div class="col-lg-6">
            <div class="form-group">
                <label class="col-sm-4 control-label">{{ 'TITLE' | translate }}:</label>
                <div class="col-sm-8"><input type="text" class="form-control" ng-model='ticket.Title' required ng-disabled="ticket.is_admin_ticket"></div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="col-sm-4 control-label">{{ 'DEPARTMENT' | translate }}:</label>
                <div class="col-sm-8">
                    <select class="form-control" ng-model='ticket.Departament' convert-to-number required ng-disabled="ticket.is_admin_ticket">
                        <option ng-repeat="option in departament" value="{{option.id}}">{{option.name}}</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">   
        <div class="col-lg-6">
            <div class="form-group">
                <label class="col-sm-4 control-label">{{ 'TYPE' | translate }}:</label>
                <div class="col-sm-8">
                    <select class="form-control" ng-model='ticket.Type' ng-disabled="ticket.is_admin_ticket">
                        <option value="1">{{'Incident' | translate}}</option>
                        <option value="2">{{'Request' | translate}}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="col-sm-4 control-label">{{ 'PRIORITY' | translate }}:</label>
                <div class="col-sm-8">
                    <select class="form-control" ng-model='ticket.Priority' ng-disabled="ticket.is_admin_ticket">
                        <option value="1">{{'Low' | translate}}</option>
                        <option value="2">{{'Medium' | translate}}</option>
                        <option value="3">{{'High' | translate}}</option>
                        <option value="4">{{'Urgent' | translate}}</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">   
        <div class="col-lg-6">
            <div class="form-group">
                <label class="col-sm-4 control-label">{{ 'CLIENT' | translate }}:</label>
                <div class="col-sm-8">
                    <ui-select ng-model="ticket.Client" theme="bootstrap" ng-disabled="true">
                        <ui-select-match>{{$select.selected.Name}}</ui-select-match>
                        <ui-select-choices repeat="item.Id as item in person  | filter: $select.search">
                            <div ng-bind-html="item.Name | highlight: $select.search"></div>
                            <small ng-bind-html="item.Email | highlight: $select.search"></small>
                        </ui-select-choices>
                    </ui-select>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="col-sm-4 control-label">{{ 'ASSIGNED_TO_TECHNICIAN' | translate }}:</label>
                <div class="col-sm-8">
                    <ui-select ng-model="ticket.Technician" theme="bootstrap" ng-disabled="ticket.is_admin_ticket">
                        <ui-select-match>{{$select.selected.Name}}</ui-select-match>
                        <ui-select-choices repeat="item.Id as item in person  | filter: $select.search">
                            <div ng-bind-html="item.Name | highlight: $select.search"></div>
                            <small ng-bind-html="item.Email | highlight: $select.search"></small>
                        </ui-select-choices>
                    </ui-select>                    
                </div>
            </div>
        </div>
    </div>
    <div class="row">   
        <div class="col-lg-6">
            <div class="form-group">
                <label class="col-sm-4 control-label">{{ 'STATUS' | translate }}:</label>
                <div class="col-sm-8">
                    <select class="form-control" ng-model='ticket.Status' ng-disabled="ticket.is_admin_ticket">
                        <option value="1">{{ 'New' | translate }}</option>
                        <option value="2">{{ 'Wait' | translate }}</option>
                        <option value="3">{{ 'Resolved' | translate }}</option>
                        <option value="4">{{ 'Close' | translate }}</option>
                    </select>
                </div>
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
    </form>
    <div class="row m-t-sm">
     <div class="col-lg-12">
        <div class="panel blank-panel ui-tab">
            <uib-tabset>
                <uib-tab heading="{{'Processing_ticket'| translate}}" active="tab.active" class="dsads">
                    <div class="feed-activity-list">
                        <div class="feed-element">
                            <a href="" class="pull-left">
                                <img alt="image" class="img-circle" ng-src="img/perfil/{{Photo}}">
                            </a>

                            <div class="media-body ">
                                <small class="pull-right"><span am-time-ago="Created"></span></small>
                                <strong>{{ticket.Name}}</strong><br>
                                <small class="text-muted">{{Created}}</small>
                                <div class="well" ng-bind-html="ticket.Description">
                                </div>
                            </div>
                        </div>

                        <div class="feed-element" ng-repeat="data in message">
                            <a href="" class="pull-left">
                                <img alt="image" class="img-circle" ng-src="img/perfil/{{data.photo}}">
                            </a>

                            <div class="media-body ">
                                <small class="pull-right"><span am-time-ago="data.created"></span></small>
                                <strong>{{data.users}}</strong><br>
                                <small class="text-muted">{{data.created | amDateFormat:'dddd, MMMM Do YYYY, h:mm:ss a'}}</small>
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
                                        <button type="submit" class="ladda-button btn btn-success" ladda="btnloadingreplay">{{ 'REPLAY' | translate }}</button>
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
