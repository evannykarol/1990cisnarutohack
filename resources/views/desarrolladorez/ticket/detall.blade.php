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
    <div class="col-lg-9 col-lg-offset-2" ng-if="viewticket == 'yes'">
    <div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox">
    <div class="ibox-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="m-b-md">
                <h2><b>Ticket</b></h2>
            </div>
            <dl class="dl-horizontal">
                <dt>{{'STATUS' | translate}}:</dt>
                <dd>
                    <select class="form-control" convert-to-number ng-model="Status">
                        <option value="1">{{ 'New ' | translate }}</option>
                        <option value="1">{{ 'Wait ' | translate }}</option>
                        <option value="1">{{ 'Resolved ' | translate }}</option>
                        <option value="1">{{ 'Close ' | translate }}</option>
                    </select> 
                </dd>
            </dl>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5">
            <dl class="dl-horizontal">
                <dt>{{ 'CLIENT' | translate }}:</dt>
                <dd>{{Client}}</dd>
                <dt>{{'DEPARTMENT' | translate }}:</dt>
                <dd>{{Department}}</dd>
                <dt>{{'TYPE' | translate }}:</dt>
                <dd>{{Type | translate}}</dd>
                <dt>{{'PRIORITY' | translate }}:</dt>
                <dd>{{Priority | translate }}</dd>            
            </dl>
        </div>
        <div class="col-lg-7" id="cluster_info">
            <dl class="dl-horizontal">
                <dt>{{ 'LAST_UPDATED' | translate }}:</dt>
                <dd>{{LastUpdate}}</dd>
                <dt>{{'CREATED' | translate }}:</dt>
                <dd>{{Created}}</dd>
                <dt>{{'ASSIGNED_TO_TECHNICIAN' | translate }}:</dt>
                <dd>{{Technician}}</dd>
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
                                    <div ng-click="Open()" ng-if="open == 'yes'">Haz clic aquí para responder a este ticket.</div>
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
