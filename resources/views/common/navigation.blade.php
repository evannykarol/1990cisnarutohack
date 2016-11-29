<nav class="navbar-default navbar-static-side" role="navigation" ng-controller="PerfilCtrl">
    <div class="sidebar-collapse">
        <ul side-navigation class="nav metismenu" id="side-menu">
            <li class="nav-header">
             <center>
                <div class="spiner-example" ng-if="navperfilload">
                    <div class="sk-spinner sk-spinner-chasing-dots">
                        <div class="sk-dot1"></div>
                        <div class="sk-dot2"></div>
                    </div>
                </div>
                <div class="profile-element" uib-dropdown ng-if="navperfil == 'yes'">
                    <img alt="image" class="img-circle" ng-src="img/perfil/{{Photo}}" width="70px" />
                    <a uib-dropdown-toggle href>
                            <span class="clear">
                                <span class="block m-t-xs">
                                    <strong class="font-bold">{{Name}}</strong>
                             </span>
                                <span class="text-muted text-xs block">{{Area}}<b class="caret"></b></span>
                            </span>
                    </a>
                    <ul uib-dropdown-menu="" class="animated fadeInRight m-t-xs">
                        <li><a href="" ui-sref="index.profile">Perfil</a></li>
                        <li><a href="">{{ 'Logout' | translate }}</a></li>                        
                    </ul>
                </div>
                <div class="logo-element">
                    <img class="img-circle" src="<% URL::asset('img/perfil/'.Auth::user()->photo) %>" width="40px">
                </div>
             </center>
            </li>
            <li ui-sref-active="active">
                <a ui-sref="index.main"><i class="fa fa-dashboard"></i> <span class="nav-label">{{ 'Dashboard' | translate }}</span> </a>
            </li>
            @foreach($groups as $group)
            <?php 
                $moduls = DB::table("moduls")
                            ->where("is_active",1)     
                            ->where("id_moduls_group",$group->id)->get();
            ?>
            @if($group->is_group==1)
            <li ng-class="{active: $state.includes('index')}">
                <a href=""><i class="fa fa-gear"></i> <span class="nav-label"><%$group->name_group%></span></a>
                <ul class="nav nav-second-level collapse" ng-class="{in: $state.includes('index')}">
            @endif

                @foreach($moduls as $modul)          
                    <li ui-sref-active="active"><a ui-sref="index.<%$modul->path%>"><i class="fa fa-user"></i> <span class="nav-label"><%$modul->name%></span> </a></li>                     
                @endforeach     

            @if($group->is_group==1)
                </ul>
            </li> 
            @endif

            @endforeach

            @foreach($catalog as $catalogsss)
            <li ui-sref-active="active">
                <a ui-sref="<% $catalogsss->viewcatalog %>"><i class="fa <% $catalogsss->icon %>" title="<% $catalogsss->catalogs %>"></i> <span class="nav-label"><% $catalogsss->description %></span> </a>
            </li>
            @endforeach            
              <!-- <li ui-sref-active="active"><a ui-sref="index.modulosedit"><i class="fa fa-user"></i> <span class="nav-label">modulos</span> </a></li>        -->
        </ul>
    </div>
</nav>