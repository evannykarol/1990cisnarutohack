
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>LISTA DE TICKETS</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Soporte</a>
            </li>
            <li class="active">
                <strong>LISTA DE TICKETS</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="row m-t-lg">
    <div class="col-lg-8 col-md-offset-2">
        <div class="ibox float-e-margins">
            <div class="ibox-content" ng-controller="TicketCtrl">
            	<div id="detalleticket"></div>
            	<div class="hr-line-dashed"></div>
                <div class="chat-form">
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Message" ng-model="CommentTicket" required></textarea>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-sm btn-primary m-t-n-xs" ng-click="submitticket()"><strong>Enviar Mensaje</strong></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>