<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{ route('admin.getDashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-credit-card fa-fw"></i> Transaction<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin.transaction.getList') }}"><i class="fa fa-chevron-circle-right"></i> List Transaction</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.transaction.getListOrderDetail') }}"><i class="fa fa-chevron-circle-right"></i> List Oder Detail</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-thumb-tack fa-fw"></i> Category<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin.cate.getList') }}"><i class="fa fa-chevron-circle-right"></i> List Category</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.cate.getAdd') }}"><i class="fa fa-chevron-circle-right"></i> Add Category</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-cube fa-fw"></i> Product<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin.product.getList') }}"><i class="fa fa-chevron-circle-right"></i> List Product</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.product.getAdd') }}"><i class="fa fa-chevron-circle-right"></i> Add Product</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.product.getSale') }}"><i class="fa fa-chevron-circle-right"></i> Sale</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.product.getListSale') }}"><i class="fa fa-chevron-circle-right"></i> List Products Sale</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.product.getOutofStock') }}"><i class="fa fa-chevron-circle-right"></i> Out of Stock</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-user-md fa-fw"></i> User<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin.user.getList') }}"><i class="fa fa-chevron-circle-right"></i> List User</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.user.getAdd') }}"><i class="fa fa-chevron-circle-right"></i> Add User</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> Customer<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin.customer.getList') }}"><i class="fa fa-chevron-circle-right"></i> List Customer</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.customer.totalGuest') }}"><i class="fa fa-chevron-circle-right"></i> Total Guests</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-desktop"></i> Pages<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin.display.getImagePageIndex') }}"><i class="fa fa-chevron-circle-right"></i> Images Header</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.display.getIntro') }}"><i class="fa fa-chevron-circle-right"></i> Intro Page</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.display.contactPage') }}"><i class="fa fa-chevron-circle-right"></i> Footer-Contact Page</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.display.getPolicy') }}"><i class="fa fa-chevron-circle-right"></i> Policy</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-comment fa-fw"></i> Comment<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin.comment.getList') }}"><i class="fa fa-chevron-circle-right"></i> List Comment</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-deviantart fa-fw"></i> Advertise<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-chevron-circle-right"></i> List Advertise</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-chevron-circle-right"></i> Add Advertise</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-tree fa-fw"></i> Province<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin.province.getList') }}"><i class="fa fa-chevron-circle-right"></i> List Province</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.province.getAdd') }}"><i class="fa fa-chevron-circle-right"></i> Add Province</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>