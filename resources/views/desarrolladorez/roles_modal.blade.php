<form  class="form-horizontal" ng-submit="submit()">
<div class="inmodal">
    <div class="modal-header">
        <h4 class="modal-title">{{ 'ROLES' | translate }}</h4>
    </div>
    <div class="modal-body">
        <div class="row" ng-if="'yes'==load">
                <div class="spiner-example">
                    <div class="sk-spinner sk-spinner-chasing-dots">
                        <div class="sk-dot1"></div>
                        <div class="sk-dot2"></div>
                    </div>
                </div>
        </div>      
        <div class="row" ng-if="'yes'==view">
             <div class="col-lg-12">            
                <div class="form-group">
                    <input type="hidden" ng-model='roles.Id'>
                    <label class="col-sm-2 control-label">{{ 'NAME' | translate }}:</label>
                    <div class="col-sm-6"><input type="text" class="form-control" ng-model='roles.Name' required></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">{{ 'DESCRIPTION' | translate }}:</label>
                    <div class="col-sm-6"><input type="text" class="form-control" ng-model='roles.Description' required></div>
                </div>
                <div class="tabs-container" >
                 <uib-tabset>
                    <uib-tab>
                        <uib-tab-heading>
                            <i class="fa fa-block"></i> {{'CRUD' | translate}} 
                        </uib-tab-heading>
                        <div class="panel-body">
                         <div class="form-group">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                             <thead>
                                <tr>
                                    <td>{{ 'NAME' | translate }}</td>
                                    <td class="text-center">{{ 'CREATE' | translate }}</td>
                                    <td class="text-center">{{ 'READ' | translate }}</td>
                                    <td class="text-center">{{ 'UPDATE' | translate }}</td>
                                    <td class="text-center">{{ 'DELETE' | translate }}</td>
                                </tr>
                             </thead>
                             <tbody>
                                <tr ng-repeat="n in roles.Permission">
                                    <td>{{n.Name}}</td>
                                    <td class="text-center"><input icheck type="checkbox" ng-model="n.Create"></td>
                                    <td class="text-center"><input icheck type="checkbox" ng-model="n.Read"></td>
                                    <td class="text-center"><input icheck type="checkbox" ng-model="n.Update"></td>
                                    <td class="text-center"><input icheck type="checkbox" ng-model="n.Delete"></td>
                                </tr>
                             </tbody>
                            </table>    
                         </div>  
                        </div>
                    </uib-tab>
                    <uib-tab>
                        <uib-tab-heading>
                            <i class="fa fa-list-alt"></i> {{'MENUS' | translate}} 
                        </uib-tab-heading>
                        <div class="panel-body">
                         <div class="form-group">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                             <thead>
                                <tr>
                                    <td>{{ 'NAME' | translate }}</td>
                                    <td class="text-center">{{ 'CREATE' | translate }}</td>
                                    <td class="text-center">{{ 'READ' | translate }}</td>
                                    <td class="text-center">{{ 'UPDATE' | translate }}</td>
                                    <td class="text-center">{{ 'DELETE' | translate }}</td>
                                </tr>
                             </thead>
                             <tbody>
<!--                                 <tr>
                                    <td>Usuarios</td>
                                    <td class="text-center"><input icheck type="checkbox"></td>
                                    <td class="text-center"><input icheck type="checkbox"></td>
                                    <td class="text-center"><input icheck type="checkbox"></td>
                                    <td class="text-center"><input icheck type="checkbox"></td>
                                </tr>
                                <tr>
                                    <td>Ticket</td>
                                    <td class="text-center"><input icheck type="checkbox"></td>
                                    <td class="text-center"><input icheck type="checkbox"></td>
                                    <td class="text-center"><input icheck type="checkbox"></td>
                                    <td class="text-center"><input icheck type="checkbox"></td>
                                </tr> -->
                             </tbody>
                            </table>
                         </div>  
                        </div>
                    </uib-tab> 
                    <uib-tab>
                        <uib-tab-heading>
                            <i class="fa fa-ticket"></i> {{'TICKET' | translate}} 
                        </uib-tab-heading>
                        <div class="panel-body">
                         <div class="form-group">
                            <div class="setings-item">
                                    <span>
                                         Ticket Admin
                                    </span>
                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" class="onoffswitch-checkbox" id="IsAdmin" ng-model='roles.IsAdmin'>
                                        <label class="onoffswitch-label" for="IsAdmin">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="setings-item">
                                    <span>
                                         Ticket Usuarios indivual
                                    </span>
                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" class="onoffswitch-checkbox" id="IsTicket" ng-model='roles.IsTicket'>
                                        <label class="onoffswitch-label" for="IsTicket">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                         </div>  
                        </div>
                    </uib-tab>                                       
                 </uib-tabset>
                </div>  
                <pre ng-bind="roles|json"></pre>
             </div>
        </div>
    </div>    
    <div class="modal-footer">
        <button type="submit" class="ladda-button btn btn-primary" ladda="btnload" data-style="expand-right">{{ 'SAVE' | translate }}</button>
        <button type="button" class="btn btn-danger" ng-if="'yes' == delete" ng-click="this.btndelete(roles.Id)">{{ 'DELETE' | translate }}</button>        
        <button type="button" class="btn btn-white" ng-click="this.cancel()">{{ 'CLOSE' | translate }}</button>
    </div>
    
</div>
</form> 
