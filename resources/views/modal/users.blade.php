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
         <div class="col-lg-12">            
            <div class="form-group">
                <input type="hidden" ng-model='user.Id'>
                <label class="col-sm-3 control-label">{{ 'NAME' | translate }}:</label>
                <div class="col-sm-7"><input type="text" class="form-control" ng-model='user.Name' required></div>
            </div>  
         </div>
         <div class="col-lg-12">            
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ 'EMAIL' | translate }}:</label>
                <div class="col-sm-7"><input type="text" class="form-control" ng-model='user.Email' required></div>
            </div>  
         </div>
         <div class="col-lg-12">            
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ 'AREA' | translate }}:</label>
                <div class="col-sm-7"><input type="text" class="form-control" ng-model='user.Area' required></div>
            </div> 
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ 'PASSWORD' | translate }}:</label>
                <div class="col-sm-7"><input type="text" class="form-control" ng-model='user.Password'></div>
            </div>  
         </div>
        </div>  
    </div>
    <div class="modal-footer">
        <button type="submit" class="ladda-button btn btn-primary" ladda="btnload" data-style="expand-right">{{ 'SAVE' | translate }}</button>
        <button type="button" class="btn btn-danger" ng-if="'yes' == delete" ng-click="this.btndelete(user.id)">{{ 'DELETE' | translate }}</button>        
        <button type="button" class="btn btn-white" ng-click="this.cancel()">{{ 'CLOSE' | translate }}</button>
    </div>
</div>
</form> 
