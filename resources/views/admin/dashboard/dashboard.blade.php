@extends('admin.master')
@section('content')
<style type="text/css">
    .panel-body table tr th {padding-bottom: 20px;}
    .panel-body table tr td {padding-bottom: 20px;}
    .panel-body a:hover {text-decoration: none;}
</style>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hi! {{ Auth::user()->fullname }}
                <small>Dashboard</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ isset($count_order) ? $count_order : null }}</div>
                                    <div>New Orders!</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin.transaction.getList') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ isset($count_comment) ? $count_comment : null }}</div>
                                    <div>New Comments!</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin.comment.getList') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-warning fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ isset($count_out_of_stock) ? $count_out_of_stock : null }}</div>
                                    <div>Out of Stock</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin.product.getOutofStock') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-gift fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ isset($count_product_sale) ? $count_product_sale : null }}</div>
                                    <div>Products Sale</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin.product.getListSale') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Total
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="{{ route('admin.transaction.getList') }}" class="list-group-item">
                                    <i class="fa fa-credit-card fa-fw"></i> Transaction
                                    <span class="pull-right text-muted small">{{ isset($count_all_transaction) ? $count_all_transaction : null }}
                                    </span>
                                </a>
                                <a href="{{ route('admin.cate.getList') }}" class="list-group-item">
                                    <i class="fa fa-thumb-tack fa-fw"></i> Category
                                    <span class="pull-right text-muted small">{{ isset($count_all_category) ? $count_all_category : null }}
                                    </span>
                                </a>
                                <a href="{{ route('admin.product.getList') }}" class="list-group-item">
                                    <i class="fa fa-cube fa-fw"></i> Product
                                    <span class="pull-right text-muted small">{{ isset($count_all_product) ? $count_all_product : null }}
                                    </span>
                                </a>
                                <a href="{{ route('admin.user.getList') }}" class="list-group-item">
                                    <i class="fa fa-user-md fa-fw"></i> User
                                    <span class="pull-right text-muted small">{{ isset($count_all_user) ? $count_all_user : null }}
                                    </span>
                                </a>
                                <a href="{{ route('admin.customer.getList') }}" class="list-group-item">
                                    <i class="fa fa-users fa-fw"></i> Customer
                                    <span class="pull-right text-muted small">{{ isset($count_all_customer) ? $count_all_customer : null }}
                                    </span>
                                </a>
                                <a href="{{ route('admin.customer.totalGuest') }}" class="list-group-item">
                                    <i class="fa fa-user fa-fw"></i> Guest
                                    <span class="pull-right text-muted small">{{ isset($total_all_guest) ? $total_all_guest : null }}
                                    </span>
                                </a>
                                <a href="{{ route('admin.comment.getList') }}" class="list-group-item">
                                    <i class="fa fa-comment fa-fw"></i> Comment
                                    <span class="pull-right text-muted small">{{ isset($count_all_comment) ? $count_all_comment : null }}
                                    </span>
                                </a>
                                <a href="{{ route('admin.province.getList') }}" class="list-group-item">
                                    <i class="fa fa-tree fa-fw"></i> Province
                                    <span class="pull-right text-muted small">{{ isset($count_all_province) ? $count_all_province : null }}
                                    </span>
                                </a>
                            </div>
                            <!-- /.list-group -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Next Steps
                        </div>
                        <div class="panel-body">
                            <table>
                                <tr>
                                    <th><i class="fa fa-pencil-square-o fa-lg"></i></th>
                                    <td><a href="{{ route('admin.display.getIntro') }}">&nbsp; Edit Introduction and Shopping Guide</a></td>
                                </tr>
                                <tr>
                                    <th><i class="fa fa-photo fa-lg"></i></th>
                                    <td><a href="{{ route('admin.display.getImagePageIndex') }}">&nbsp; Edit Images Header</a></td>
                                </tr>
                                <tr>
                                    <th><i class="fa fa-envelope-o fa-lg"></i></th>
                                    <td><a href="{{ route('admin.display.contactPage') }}">&nbsp; Edit Contact Information</a></td>
                                </tr>
                                <tr>
                                    <th><i class="fa fa-eye fa-lg"></i></th>
                                    <td><a href="{{ route('home') }}" target="_target">&nbsp; View your site</a></td>
                                </tr>
                            </table>
                        </div>
                        <div class="panel-footer">
                            Linked
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            More Actions
                        </div>
                        <div class="panel-body">
                            <table>
                                <tr>
                                    <th><i class="fa fa-plus-circle fa-lg"></i></th>
                                    <td><a href="{{ route('admin.cate.getAdd') }}">&nbsp; New Category</a></td>
                                </tr>
                                <tr>
                                    <th><i class="fa fa-plus-circle fa-lg"></i></th>
                                    <td><a href="{{ route('admin.product.getAdd') }}">&nbsp; New Product</a></td>
                                </tr>
                                <tr>
                                    <th><i class="fa fa-plus-circle fa-lg"></i></th>
                                    <td><a href="{{ route('admin.user.getAdd') }}">&nbsp; New User</a></td>
                                </tr>
                                <tr>
                                    <th><i class="fa fa-plus-circle fa-lg"></i></th>
                                    <td><a href="{{ route('admin.province.getAdd') }}">&nbsp; Add Province</a></td>
                                </tr>
                            </table>
                        </div>
                        <div class="panel-footer">
                            New Item
                        </div>
                    </div>
                </div>
                <div class="col-sm-8" >
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <i class="fa fa-money fa-lg"></i>
                        </div>
                        <div class="panel-body table-responsive">
                            <table>
                                <tr>
                                    <th><h4>Today: </h4></th>
                                    <td><h4 class="text-danger">&nbsp;{{ number_format($total_amount_today,0,',','.') }} VNĐ</h4></td>
                                </tr>
                                <tr>
                                    <th><h4>This Month: </h4></th>
                                    <td><h4 class="text-danger">&nbsp;{{ number_format($total_amount_month,0,',','.') }} VNĐ</h4></td>
                                </tr>
                                <tr>
                                    <th><h4>Total: </h4></th>
                                    <td><h4 class="text-danger">&nbsp;{{ number_format($total_amount,0,',','.') }} VNĐ</h4></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
@endsection()

