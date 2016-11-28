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
                <div class="form-group">
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                     <thead>
                        <tr>
                            <td>Name</td><td> Create</td><td>Read</td><td>Update</td><td>Delete</td>
                        </tr>
                     </thead>
                     <tbody>
                        <tr ng-repeat="n in roles.Permission">
                            <td>{{n.Name}}</td>
                            <td><input icheck type="checkbox" ng-model="n.Create"></td>
                            <td><input icheck type="checkbox" ng-model="n.Read"></td>
                            <td><input icheck type="checkbox" ng-model="n.Update"></td>
                            <td><input icheck type="checkbox" ng-model="n.Delete"></td>
                        </tr>
                     </tbody>
                    </table>    
                </div>               
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
