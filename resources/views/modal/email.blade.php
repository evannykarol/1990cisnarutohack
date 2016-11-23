<form  class="form-horizontal" ng-submit="submit()">
<div class="inmodal">
    <div class="modal-header">
        <h4 class="modal-title">{{ 'CATALOG' | translate }}</h4>
    </div>
    <div class="modal-body"> 
        <div class="row">
         <div class="col-lg-12">            
            <div class="form-group">
                <input type="hidden" ng-model='catalog.Id'>
                <label class="col-sm-3 control-label">{{ 'CATALOG' | translate }}:</label>
                <div class="col-sm-7"><input type="text" class="form-control" ng-model='catalog.Catalog' required></div>
            </div>  
         </div>
         <div class="col-lg-12">            
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ 'DESCRIPTION' | translate }}:</label>
                <div class="col-sm-7"><input type="text" class="form-control" ng-model='catalog.Description' required></div>
            </div>  
         </div>
         <div class="col-lg-12">            
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ 'VIEW' | translate }}:</label>
                <div class="col-sm-7"><input type="text" class="form-control" ng-model='catalog.View' required></div>
            </div> 
         </div>
         <div class="col-lg-12">            
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ 'ICON' | translate }}:</label>
                <div class="col-sm-7"><input type="text" class="form-control" ng-model='catalog.Icon'></div>
            </div>  
         </div> 
         <div class="col-lg-12">            
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ 'STATUS' | translate }}:</label>
                <div class="col-sm-7"><input type="text" class="form-control" ng-model='catalog.Status'></div>
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
