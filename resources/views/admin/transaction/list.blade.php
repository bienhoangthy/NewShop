@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Transaction
                    <small>List</small>
                </h1>
            </div>
            @include('admin.error.flash_message')
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>#</th>
                        <th>Customer</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Order Date</th>
                        <th>Handling</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 0 ?>
                    @foreach ($transactions as $item)
                        <?php $stt++ ?>
                        <tr class="odd gradeX" align="center">
                            <td>{{ $stt }}</td>
                            <td>
                                <?php $customer = DB::table('customers')->where('id',$item->customer_id)->first(); ?>
                                @if (isset($customer))
                                    {{ $customer->fullname }}
                                @endif
                            </td>
                            <td>{{ number_format($item->amount,0,',','.') }} VNĐ</td>
                            <td>
                                @if ($item->status == 1)
                                    <span style="color: red;">Unsent</span>
                                @else
                                    <i class="fa fa-check" aria-hidden="true"></i>Sent
                                @endif
                            </td>
                            <td>{{ $item->created_at->format('d/m/Y') }}</td>
                            <td><a href="{{ route('admin.transaction.orderDetail',$item->id) }}"><i class="fa fa-thumb-tack" aria-hidden="true"></i> Oder Detail</a></td>
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
