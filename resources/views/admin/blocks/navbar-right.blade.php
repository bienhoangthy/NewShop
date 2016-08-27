<ul class="nav navbar-nav">
    <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-plus-square fa-lg"></i>
    <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="{{ route('admin.cate.getAdd') }}">New Category</a></li>
          <li><a href="{{ route('admin.product.getAdd') }}">New Product</a></li>
          <li><a href="{{ route('admin.user.getAdd') }}">New User</a></li> 
        </ul>
    </li>
</ul>
<ul class="nav navbar-top-links navbar-right">
<!-- /.dropdown -->
<span class="text-muted">{!! \Carbon\Carbon::today()->toDateString(); !!}</span>
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fa fa-user fa-fw"></i> {{ Auth::user()->fullname }}  <i class="fa fa-caret-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-user">
        <li><a href="{{ route('admin.user.getDetail',Auth::user()->id) }}"><i class="fa fa-user fa-fw"></i> User Profile</a>
        </li>
        <li><a href="{{ route('admin.user.getEdit',Auth::user()->id) }}"><i class="fa fa-gear fa-fw"></i> Settings</a>
        </li>
        <li class="divider"></li>
        <li><a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
        </li>
    </ul>
    <!-- /.dropdown-user -->
</li>
<!-- /.dropdown -->
</ul>