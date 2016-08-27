@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Order Details
                    <small>List</small>
                </h1>
            </div>
            @include('admin.error.flash_message')
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>#</th>
                        <th>Transaction ID</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 0 ?>
                    @foreach ($orderDetail as $item)
                        <?php $stt++ ?>
                        <tr class="odd gradeX" align="center">
                            <td>{{ $stt }}</td>
                            <td>{{ $item->transaction_id }}</td>
                            <td>
                                <?php $product = DB::table('products')->where('id',$item->product_id)->first(); ?>
                                @if (isset($product))
                                    <a href="{{ route('admin.product.getDetail',$product->id) }}">{{ $product->name }}</a>
                                @endif
                            </td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ number_format($item->amount,0,',','.') }} VNĐ</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection()
