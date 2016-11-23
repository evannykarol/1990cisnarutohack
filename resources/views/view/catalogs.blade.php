<div class="wrapper wrapper-content animated fadeInRight" ng-controller="CatalogCtrl as showCase">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{{ 'CATALOG' | translate }}
                    </h5>
                </div>
                <div class="ibox-content">

                    <table datatable="" dt-options="showCase.dtOptions" dt-columns="showCase.dtColumns" dt-instance="showCase.dtInstance" class="table table-striped table-bordered table-hover dataTables-example" width="100%">
                        <thead>
                        <tr>
                            <th>ACTION</th> 
                            <th>CATALOG</th>                            
                            <th>DESCRIPTION</th>
                            <th>VIEW</th>
                            <th>ICON</th>
                            <th>STATUS</th>
                        </tr>
                        </thead>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>