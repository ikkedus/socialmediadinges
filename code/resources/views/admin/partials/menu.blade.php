<ul class="sidebar-menu" data-widget="tree">
    <li class="">
        <a href="/admin">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">

            </span>
        </a>
    </li>
    @if(\App\Helpers\CurrentUser::IsAdmin())
        <li class="">
            <a href="/users">
                <i class="fa fa-user-circle-o"></i> <span>Users</span>
                <span class="pull-right-container">

            </span>
            </a>
        </li>
    @endif
    <li>
        <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Berichten</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
        </a>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-folder"></i> <span>Something</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Invoice</a></li>
        </ul>
    </li>
</ul>