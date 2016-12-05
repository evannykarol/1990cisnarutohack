<div class="wrapper wrapper-content" ng-controller="MessagesCtrl">
<div class="row">
<div class="col-lg-3">
    <div class="ibox float-e-margins">
        <div class="ibox-content mailbox-content">
            <div class="file-manager">
                <button class="btn btn-block btn-primary compose-mail" ng-click="ComposeMessage()">{{'COMPOSE_MESSAGE' | translate}}</button>
                <div class="space-25"></div>
                <h5>Folders</h5>
                <ul class="folder-list m-b-md" style="padding: 0">
                    <li><a ng-click="inbox()"> <i class="fa fa-inbox"></i> {{'Inbox' | translate}} <span class="label label-warning pull-right">{{messages.inbox}}</span> </a></li>
                    <li><a ui-sref="inbox"> <i class="fa fa-envelope-o"></i> {{'Send_Message' | translate}}</a></li>
                    <li><a ui-sref="inbox"> <i class="fa fa-certificate"></i> {{'Important' | translate}}</a></li>
                    <li><a ui-sref="inbox"> <i class="fa fa-file-text-o"></i> {{'Drafts' | translate}}<span class="label label-danger pull-right">2</span></a></li>
                    <li><a ui-sref="inbox"> <i class="fa fa-trash-o"></i> {{'Trash' | translate}}</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-9 animated fadeInRight" ng-if="'yes'==listmessages">
<div class="mail-box-header">

    <form method="get" action="index.html" class="pull-right mail-search">
        <div class="input-group">
            <input type="text" class="form-control input-sm" name="search" placeholder="{{'Search_Message' | translate}}">

            <div class="input-group-btn">
                <button type="button" class="btn btn-sm btn-primary" ng-click="Search()">
                    {{'Search' | translate}} 
                </button>
            </div>
        </div>
    </form>
    <h2>
        {{'Inbox' | translate}} ({{messages.inbox}})
    </h2>

    <div class="mail-tools tooltip-demo m-t-md">
        <div class="btn-group pull-right">
            <button class="btn btn-white btn-sm"><i class="fa fa-arrow-left"></i></button>
            <button class="btn btn-white btn-sm"><i class="fa fa-arrow-right"></i></button>
        </div>
        <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left" title="Refresh inbox" ng-click="Refresh()"><i class="fa fa-refresh"></i> {{'Refresh' | translate}}</button>
        <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as read"><i class="fa fa-eye"></i></button>
        <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as important"><i class="fa fa-exclamation"></i></button>
        <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i></button>
    </div>
</div>
<div class="mail-box">

    <table class="table table-hover table-mail">
        <tbody>
        <tr ng-repeat="data in messages.messages" ng-class="{'read': data.read == true , 'unread': data.read == false}" ng-click="select(data.id)">
            <td class="check-mail">
                <input icheck type="checkbox" ng-model="data.check">
            </td>
            <td class="mail-ontact"><a ui-sref="email_view">{{data.users}}</a></td>
            <td class="mail-subject"><a ui-sref="email_view">{{data.subject}}</a></td>
            <td class=""></td>
            <td class="text-right mail-date">{{data.date}}</td>
        </tr>
        </tbody>
    </table>

</div>
</div>



<div class="col-lg-9 animated fadeInRight" ng-if="'yes'==newmessages">
    <div class="mail-box-header">
        <div class="pull-right tooltip-demo">
            <a ui-sref="inbox" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to draft folder"><i class="fa fa-pencil"></i> Draft</a>
            <a ui-sref="inbox" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Discard email"><i class="fa fa-times"></i> Discard</a>
        </div>
        <h2>
            {{'COMPOSE_MESSAGE' | translate}}
        </h2>
    </div>
    <div class="mail-box">


        <div class="mail-body">

            <form class="form-horizontal" method="get">
                <div class="form-group"><label class="col-sm-2 control-label">{{'To' | translate}}:</label>

                    <div class="col-sm-10"><input type="text" class="form-control" value="alex.smith@corporat.com"></div>
                </div>
                <div class="form-group"><label class="col-sm-2 control-label">{{'Subject' | translate}}:</label>

                    <div class="col-sm-10"><input type="text" class="form-control" value=""></div>
                </div>
            </form>

        </div>

        <div class="mail-text h-200">
            <textarea  class="form-control" ng-model='main.Description' ckeditor required></textarea>
            <div class="clearfix"></div>
        </div>
        <div class="mail-body tooltip-demo">
            <a ui-sref="inbox" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Send"><i class="fa fa-reply"></i> {{'Send' | translate}}</a>
            <a ui-sref="inbox" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Discard email"><i class="fa fa-times"></i> Discard</a>
            <a ui-sref="inbox" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to draft folder"><i class="fa fa-pencil"></i> Draft</a>
        </div>
        <div class="clearfix"></div>


    </div>
</div>

<div class="col-lg-9 animated fadeInRight" ng-if="'yes'==viewmessages">
    <div class="mail-box-header">
        <div class="pull-right tooltip-demo">
            <a ui-sref="inbox" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Reply"><i class="fa fa-reply"></i> Reply</a>
            <a href="" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Print email"><i class="fa fa-print"></i> </a>
            <a ui-sref="inbox" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </a>
        </div>
        <h2>
            {{'View_Message' | translate}}
        </h2>

        <div class="mail-tools tooltip-demo m-t-md">


            <h3>
                <span class="font-noraml">{{'Subject' | translate}}: </span>{{subject}}
            </h3>
            <h5>
                <span class="pull-right font-noraml">{{date}}</span>
                <span class="font-noraml">From: </span>{{from}}
            </h5>
        </div>
    </div>
    <div class="mail-box">


        <div class="mail-body">
            <div ng-bind-html="body"></div>
        </div>

        <div class="mail-body text-right tooltip-demo">
            <a class="btn btn-sm btn-white" ui-sref="email_compose"><i class="fa fa-reply"></i> Reply</a>
            <a class="btn btn-sm btn-white" ui-sref="email_compose"><i class="fa fa-arrow-right"></i> Forward</a>
            <button title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Print" class="btn btn-sm btn-white"><i class="fa fa-print"></i> Print</button>
            <button title="" data-placement="top" data-toggle="tooltip" data-original-title="Trash" class="btn btn-sm btn-white"><i class="fa fa-trash-o"></i> Remove</button>
        </div>
        <div class="clearfix"></div>


    </div>
</div>


</div>
</div>
