@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Transaction
                    <small>Detail</small>
                    <a style="margin-left: 50px;" href="{{ route('admin.transaction.getList') }}"><button type="button" class="btn btn-outline btn-primary">List Transactions</button></a>
                </h1>
            </div>
            @include('admin.error.flash_message')
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Products Order
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $stt = 0 ?>
                                    @foreach ($orderDetails as $item)
                                    <?php $stt++ ?>
                                        <tr>
                                            <td>{{ $stt }}</td>
                                            <td>
                                                <?php $product = DB::table('products')->where('id',$item['product_id'])->first(); ?>
                                                @if (isset($product))
                                                    <a href="{{ route('admin.product.getDetail',$product->id) }}">{{ $product->name }}</a>
                                                @endif
                                            </td>
                                            <td>{{ $item['qty'] }}</td>
                                            <td>{{ number_format($item['amount'],0,',','.') }} VNĐ</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h3>Total: {{ number_format($transaction->amount,0,',','.') }} VNĐ</h3>
                            <div class="form-group">
                                <label>Ship: <span class="text-info" id="priceShip">@if (isset($ship->price_ship) && $ship->price_ship != 0)
                                    {{ number_format($ship->price_ship,0,',','.')."đ" }}
                                @else
                                    Free
                                @endif</span></label>
                                <input class="form-control ship" type="number" min="0" step="5000" placeholder="Input Price Ship">
                                <a href="javascript:void(0)" id="saveShip" idTran="{{ $transaction->id }}"><button type="button" class="btn btn-info">Save</button></a><span id="checkShip"></span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        Customer's Cart
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Handling
                    </div>
                    <div class="panel-body">
                        <h4><label>Status: &nbsp @if ($transaction->status == 1)
                            <span class="text-danger">Unsent</span>
                        @else
                            <i class="fa fa-check" aria-hidden="true"></i>Sent
                        @endif</label></h4>
                        <div class="pull-right">
                            @if ($transaction->status == 1)
                                <a href="{{ route('admin.transaction.sent',$transaction->id) }}"><button type="button" class="btn btn-success">Send Orders</button></a>
                            @else
                                <a href="{{ route('admin.transaction.delay',$transaction->id) }}"><button type="button" class="btn btn-default">Delay</button></a>
                                <a href="{{ route('admin.transaction.delete',$transaction->id) }}" onclick="return confirm_delete('Are You Sure Delete This Transaction!')"><button type="button" class="btn btn-danger">Delete</button></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        Infomation Order
                    </div>
                    <div class="panel-body">
                        <table style="font-size: 18px;">
                            <tr>
                                <th><label>Fullname: </label></th>
                                <td><label class="text-info">&nbsp;{{ $customer->fullname }}</label></td>
                            </tr>
                            <tr>
                                <th><label>Phone: </label></th>
                                <td><label class="text-info">&nbsp;{{ $customer->tel }}</label></td>
                            </tr>
                            <tr>
                                <th><label>Province: </label></th>
                                <td><label class="text-info">&nbsp;{{ $customer->province }}</label></td>
                            </tr>
                            <tr>
                                <th><label>Address: </label></th>
                                <td><label class="text-info">&nbsp;{{ $customer->address }}</label></td>
                            </tr>
                            <tr>
                                <th><label>Email: </label></th>
                                <td><label class="text-info">&nbsp;{{ isset($customer->email) ? $customer->email :null }}</label></td>
                            </tr>
                        </table>
                        <h4 class="text-success">@if ($customer->guest_id == null)
                                Member
                            @else
                                Guest
                            @endif</h4>
                        <div class="well">
                            <h4>Message:</h4>
                            <p class="text-danger">{{ $transaction->message }}</p>
                        </div>
                    </div>
                    <div class="panel-footer">
                        Customer's Info
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection()
