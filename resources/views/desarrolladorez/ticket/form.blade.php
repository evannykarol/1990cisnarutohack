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
                <strong>{{ 'CREATE ' | translate }}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight" ng-controller="TicketCtrl">
    <div class="row" ng-if="'yes'==load">
        <div class="spiner-example">
            <div class="sk-spinner sk-spinner-chasing-dots">
                <div class="sk-dot1"></div>
                <div class="sk-dot2"></div>
            </div>
        </div>
    </div>     
    <div class="row" ng-if="'yes'==viewticket">
     <div class="col-lg-12">
        <div class="tabs-container">
            <uib-tabset>
                <uib-tab>
                    <uib-tab-heading>
                        <i class="fa fa-ticket"></i> {{'NEW_TICKET' | translate}} 
                    </uib-tab-heading>
                    <div class="panel-body">
                        <form  class="form-horizontal" ng-submit="submit()">
                            <div class="row">                            
                             <% csrf_field() %>
                             <div class="col-sm-12">            
                                <div class="form-group">
                                    <input type="hidden" ng-model="ticket.IdTicket">
                                    <label class="col-sm-2 control-label">{{'TITLE' | translate}}:</label>
                                    <div class="col-sm-4"><input type="text" class="form-control" ng-model='Ticket.Title' required></div>
                                    <label class="col-sm-2 control-label">{{'DEPARTMENT' | translate}}:</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" ng-model='Ticket.Department' convert-to-number required>
                                            <option ng-repeat="option in DepartmentList" value="{{option.id}}">{{option.name}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{'TYPE' | translate}}:</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" ng-model='Ticket.Type' convert-to-number required>
                                            <option value="1">{{'Incident' | translate}}</option>
                                            <option value="2">{{'Request' | translate}}</option>
                                        </select>
                                    </div>
                                    <label class="col-sm-2 control-label">{{'PRIORITY' | translate}}:</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" ng-model='Ticket.Priority' convert-to-number required>
                                            <option value="1">{{'Low' | translate}}</option>
                                            <option value="2">{{'Medium' | translate}}</option>
                                            <option value="3">{{'High' | translate}}</option>
                                            <option value="4">{{'Urgent' | translate}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{'DESCRIPTION' | translate}}:</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" ng-model='Ticket.Description' ckeditor required></textarea>
                                    </div>
                                </div>   
                             </div>
                            </div>
                            <div class="row">
                             <div class="col-sm-9 col-sm-offset-3">
                                <button type="submit" class="ladda-button btn btn-success" ladda="btnload"><i class="fa fa-save"></i> {{ 'SAVE' | translate }}</button>
                             </div> 
                            </div>
                        </form>
                    </div>
                </uib-tab>                  
            </uib-tabset>
        </div>
     </div>
    </div>

</div>