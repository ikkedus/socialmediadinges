<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="/images/avatar.png" class="user-image" alt="User Image">
        <span class="hidden-xs">{{CurrentUser::GetUser()->getCaptilizedFullName()}}</span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <img src="/images/avatar.png" class="img-circle" alt="User Image">

            <p>
                {{CurrentUser::GetUser()->getCaptilizedFullName()}}
            </p>
        </li>
        <!-- Menu Body -->
        <li class="user-body">
            <div class="row">
                <div class="col-xs-4 text-center">
                </div>
                <div class="col-xs-4 text-center">
                </div>
                <div class="col-xs-4 text-center">
                </div>
            </div>
            <!-- /.row -->
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
                <a href="#" class="btn btn-default btn-flat">Sign out</a>
            </div>
        </li>
    </ul>
</li>