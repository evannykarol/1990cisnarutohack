<form  class="form-horizontal" ng-submit="submit()">
<div class="inmodal">
    <div class="modal-header">
        <h4 class="modal-title">{{ 'SERVICEHOSTING' | translate }}</h4>
    </div>
    <div class="modal-body"> 
        <div class="row">
         <div class="col-lg-12">            
            <div class="form-group">
                <input type="hidden" ng-model='servicehosting.Id'>
                <label class="col-sm-3 control-label">{{ 'ADMINISTRATOR' | translate }}:</label>
                <div class="col-sm-7"><input type="text" class="form-control" ng-model='servicehosting.Administrator'></div>
            </div>  
         </div>
         <div class="col-lg-12">            
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ 'USER' | translate }}:</label>
                <div class="col-sm-7"><input type="text" class="form-control" ng-model='servicehosting.User'></div>
            </div>  
         </div>
         <div class="col-lg-12">            
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ 'PASSWORD' | translate }}:</label>
                <div class="col-sm-7"><input type="text" class="form-control" ng-model='servicehosting.Password'></div>
            </div> 
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ 'NOTE' | translate }}:</label>
                <div class="col-sm-7"><textarea class="form-control" ng-model='servicehosting.Note'></textarea></div>
            </div>  
         </div>
        </div>  
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-white" ng-click="this.cancel()">{{ 'CLOSE' | translate }}</button>
        <button type="submit" class="btn btn-primary">{{ 'SAVE' | translate }}</button>
    </div>
</div>
</form> 
