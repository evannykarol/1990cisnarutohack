<form  class="form-horizontal" ng-submit="submit()">
<div class="inmodal">
    <div class="modal-header">
        <h4 class="modal-title">{{ 'USER' | translate }}</h4>
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
         <div class="col-lg-6">            
            <div class="form-group">
                <input type="hidden" ng-model='user.Id'>
                <label class="col-sm-4 control-label">{{ 'USER' | translate }}:</label>
                <div class="col-sm-8"><input type="text" class="form-control" ng-model='user.User' required></div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">{{ 'NAME' | translate }}:</label>
                <div class="col-sm-8"><input type="text" class="form-control" ng-model='user.Name' required></div>
            </div> 
            <div class="form-group">
                <label class="col-sm-4 control-label">{{ 'FIRST_NAME' | translate }}:</label>
                <div class="col-sm-8"><input type="text" class="form-control" ng-model='user.FirstName' required></div>
            </div>                        
            <div class="form-group">
                <label class="col-sm-4 control-label">{{ 'EMAIL' | translate }}:</label>
                <div class="col-sm-8"><input type="text" class="form-control" ng-model='user.Email' required></div>
            </div>            
            <div class="form-group">
                <label class="col-sm-4 control-label">{{ 'AREA' | translate }}:</label>
                <div class="col-sm-8"><input type="text" class="form-control" ng-model='user.Area' required></div>
            </div>             
            <div class="form-group">
                <label class="col-sm-4 control-label">{{ 'ROLES' | translate }}:</label>
                <div class="col-sm-8">
                <select class="form-control" ng-model='user.Roles' convert-to-number required>
                    <option ng-repeat="option in RolesList" value="{{option.id}}">{{option.name}}</option>
                </select>
                </div>  
            </div>         
            <div class="form-group">
                <label class="col-sm-4 control-label">{{ 'LANGUAJE' | translate }}:</label>
                <div class="col-sm-8">
                    <select class="form-control" ng-model='user.Languaje' required>
                        <option value="es">Español</option>
                        <option value="en">Ingles</option>
                    </select>
                </div>
            </div>             
            <div class="form-group">
                <label class="col-sm-4 control-label">{{ 'STATUS' | translate }}:</label>
                <div class="col-sm-8">
                        <label class="checkbox-inline"> <input icheck type="radio" ng-model="user.Status" value="active" ng-required="!user.Status"> active</label>
                        <label class="checkbox-inline"> <input icheck type="radio" ng-model="user.Status" value="inactive" ng-required="!user.Status"> Inactive</label>                        
                </div>
            </div>  
         </div>         
      
         <div class="col-lg-6">            
            <div class="form-group">
                <label class="col-sm-5 control-label">{{ 'NEW_PASSWORD' | translate }}:</label>
                <div class="col-sm-7"><input type="text" class="form-control" ng-model='user.New_Password'></div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 control-label">{{ 'CONFIRM_PASSWORD' | translate }}:</label>
                <div class="col-sm-7"><input type="text" class="form-control" ng-model='user.Confirm_Password'></div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 control-label">{{ 'PHOTO' | translate }}:</label>
                <div class="col-sm-7"><input type="file" ng-model='user.Photo'></div>
            </div>
            <div class="form-group">
                <div class="col-sm-12 text-center"><img ng-src="img/perfil/{{user.PhotoV}}" width="240px"/></div>
            </div>               
         </div>         
        </div>  
    </div>
    <div class="modal-footer">
        <button type="submit" class="ladda-button btn btn-primary" ladda="btnload" data-style="expand-right">{{ 'SAVE' | translate }}</button>
        <button type="button" class="btn btn-danger" ng-if="'yes' == delete" ng-click="this.btndelete(user.Id)">{{ 'DELETE' | translate }}</button>        
        <button type="button" class="btn btn-white" ng-click="this.cancel()">{{ 'CLOSE' | translate }}</button>
    </div>
</div>
</form> 
