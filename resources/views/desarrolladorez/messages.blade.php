<div class="wrapper wrapper-content" ng-controller="MessagesCtrl">
<div class="row">
<div class="col-lg-3">
    <div class="ibox float-e-margins">
        <div class="ibox-content mailbox-content">
            <div class="file-manager">
                <a class="btn btn-block btn-primary compose-mail" ui-sref="email_compose">Compose Mail</a>

                <div class="space-25"></div>
                <h5>Folders</h5>
                <ul class="folder-list m-b-md" style="padding: 0">
                    <li><a ui-sref="inbox"> <i class="fa fa-inbox "></i> Inbox <span class="label label-warning pull-right">{{messages.count}}</span> </a></li>
                    <li><a ui-sref="inbox"> <i class="fa fa-envelope-o"></i> Send Mail</a></li>
                    <li><a ui-sref="inbox"> <i class="fa fa-certificate"></i> Important</a></li>
                    <li><a ui-sref="inbox"> <i class="fa fa-file-text-o"></i> Drafts <span class="label label-danger pull-right">2</span></a></li>
                    <li><a ui-sref="inbox"> <i class="fa fa-trash-o"></i> Trash</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-9 animated fadeInRight">
<div class="mail-box-header">

    <form method="get" action="index.html" class="pull-right mail-search">
        <div class="input-group">
            <input type="text" class="form-control input-sm" name="search" placeholder="Search email">

            <div class="input-group-btn">
                <button type="submit" class="btn btn-sm btn-primary">
                    Search
                </button>
            </div>
        </div>
    </form>
    <h2>
        Inbox ({{messages.count}})
    </h2>

    <div class="mail-tools tooltip-demo m-t-md">
        <div class="btn-group pull-right">
            <button class="btn btn-white btn-sm"><i class="fa fa-arrow-left"></i></button>
            <button class="btn btn-white btn-sm"><i class="fa fa-arrow-right"></i></button>

        </div>
        <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left" title="Refresh inbox"><i class="fa fa-refresh"></i> Refresh</button>
        <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as read"><i class="fa fa-eye"></i></button>
        <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as important"><i class="fa fa-exclamation"></i></button>
        <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i></button>

    </div>
</div>
<div class="mail-box">

    <table class="table table-hover table-mail">
        <tbody>
        <tr class="unread">
            <td class="check-mail">
                <input icheck type="checkbox" ng-model="main.checkOne">
            </td>
            <td class="mail-ontact"><a ui-sref="email_view">Anna Smith</a></td>
            <td class="mail-subject"><a ui-sref="email_view">Lorem ipsum dolor noretek imit set.</a></td>
            <td class=""><i class="fa fa-paperclip"></i></td>
            <td class="text-right mail-date">6.10 AM</td>
        </tr>
        </tbody>
    </table>


</div>
</div>
</div>
</div>