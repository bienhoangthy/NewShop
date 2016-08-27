@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Out of Stock
                    <small>List</small>
                    <a style="margin-left: 50px;" href="{{ route('admin.product.getList') }}"><button type="button" class="btn btn-outline btn-primary">List Product</button></a>
                    <a style="margin-left: 50px;" href="{{ route('admin.product.getAdd') }}"><button type="button" class="btn btn-outline btn-primary">Add Product</button></a>
                </h1>
            </div>
            @include('admin.error.flash_message')
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Date</th>
                        <th>Category</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 0 ?>
                    @foreach ($products as $item)
                        <?php $stt = $stt + 1 ?>
                        <tr class="odd gradeX" align="center">
                            <td>{{ $stt }}</td>
                            <td>
                                <a href="{{ route('admin.product.getDetail',$item['id']) }}">{{ $item['name'] }}</a>
                            </td>
                            <td>{!! number_format($item['price'],0,',','.') !!} VNĐ</td>
                            <td>
                                @if ($item['qty_input'] == 0)
                                    <span style="color: red;">{{ $item['qty_input'] }}</span>
                                @else
                                    {{ $item['qty_input'] }}
                                @endif
                            </td>
                            <td>
                                {!! \Carbon\Carbon::createFromTimeStamp(strtotime($item["created_at"]))->diffForHumans() !!}
                            </td>
                            <td>
                                <?php $cate = DB::table('categories')->select('name')->where('id',$item['cate_id'])->first(); ?>
                                @if (!empty($cate))
                                    {{ $cate->name }}
                                @else
                                    None
                                @endif
                            </td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm_delete('Are you sure Delete this Product?')" href="{{ route('admin.product.getDelete',$item['id']) }}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('admin.product.getEdit',$item['id']) }}">Edit</a></td>
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
