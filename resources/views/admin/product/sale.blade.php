@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Sale</small>
                    <a style="margin-left: 50px;" href="{{ route('admin.product.getList') }}"><button type="button" class="btn btn-outline btn-primary">List Product</button></a>
                    <a style="margin-left: 50px;" href="{{ route('admin.product.getListSale') }}"><button type="button" class="btn btn-outline btn-primary">List Product Sale</button></a>
                    <a style="margin-left: 50px;" href="{{ route('admin.product.getAdd') }}"><button type="button" class="btn btn-outline btn-primary">Add Product</button></a>
                </h1>
            </div>
            @include('admin.error.flash_message')
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Sale Price Ex(540000)</th>
                        <th>Save</th>
                        <th>Restore Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 0 ?>
                    @foreach ($products as $item)
                        <?php $stt = $stt + 1 ?>
                        <tr class="odd gradeX" align="center">
                            <td>{{ $stt }}</td>
                            <td>
                                <img style="height: auto;width: 80px;" class="img-responsive" src="{{ asset('upload/product_img/'.$item['id'].'/'.$item['image']) }}">
                            <td>
                                <a href="{{ route('admin.product.getDetail',$item['id']) }}">{{ $item['name'] }}</a>
                            </td>
                            <td>{!! number_format($item['price'],0,',','.') !!} VNĐ</td>
                            <td>
                                <input type="number" min="0" max="{{ $item['price'] }}" step="10000" name="txtSale" class="form-control price_sale" placeholder="Enter Sale Price" value="{{ isset($item['newPrice']) ? $item['newPrice'] : null }}">
                                <p id="check{{ $item['id'] }}" style="color: blue;"></p>
                            </td>
                            <td class="center"><a id="saveSale" idP="{{ $item['id'] }}" href="javascript:void(0)"><button type="button" class="btn btn-info">Save</button></a></td>
                            @if ($item['price'] > $item['newPrice'])
                                <td><a href="{{ route('admin.product.restorePrice',$item['id']) }}"><button type="button" class="btn btn-default">Restore</button></a></td>
                            @else
                                <td></td>
                            @endif
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
