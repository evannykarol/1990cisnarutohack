<div class="middle-box text-center loginscreen  animated fadeInDown" ng-controller="LoginCtrl">
    <div>
        <div>
            <h1 class="logo-name"><img src="img/logos.png"></h1>
        </div>
        <h3>{{ 'WELCOME' | translate }}</h3>
        <form class="m-t" role="form" ng-submit="submit()">
            <% csrf_field() %>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="{{ 'USER' | translate }}" required="" ng-model="login.email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="{{ 'PASSWORD' | translate }}" required=""  ng-model="login.password">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">{{ 'LOGIN' | translate }}</button>

            <a ui-sref="forgot_password"><small>{{ 'FORGOTPASSWORD' | translate }}</small></a>
        </form>
        <p class="m-t"> <small>Copyright SERVICRECE & BIT S.A. DE C.V. &copy; 2014-2016</small> </p>
    </div>
</div>