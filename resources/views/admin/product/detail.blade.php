@extends('admin.master')
@section('content')
<style type="text/css">
    .img {
        text-align: center;
        margin-bottom: 10px;
        padding-top: 10px;
    }
    .img img {
        width: 200px; height: auto; box-shadow: 10px 10px 15px 0px rgba(0,0,0,0.63);
    }
    .page-header a {margin-left: 50px;}
</style>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Detail</small>
                    <a href="{{ route('admin.product.getList') }}"><button type="button" class="btn btn-outline btn-primary">List Product</button></a>
                    <a href="{{ route('admin.product.getOutofStock') }}"><button type="button" class="btn btn-outline btn-primary">Out of Stock</button></a>
                    <a href="{{ route('admin.product.getEdit',$product->id) }}"><button type="button" class="btn btn-outline btn-primary">Edit Product</button></a>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <form>
                <div class="col-lg-7" style="padding-bottom:120px">
                    @include('admin.error.flash_message')
                    <div class="col-lg-12">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3>Product Name: {{ $product->name }}</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Category</label>
                                    <?php $cate = DB::table('categories')->where('id',$product->cate_id)->first() ?>
                                    @if (!empty($cate))
                                        <input class="form-control" readonly="readonly" value="{!! isset($product) ? $product->name : null !!}" />
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input class="form-control" readonly="readonly" value="{!! isset($product) ? $product->price : null !!}" />
                                </div>
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input class="form-control" readonly="readonly" value="{!! isset($product) ? $product->qty_input : null !!}" />
                                </div>
                                <div class="form-group" readonly="readonly">
                                    <label>Intro</label>
                                    {!! $product->intro !!}
                                </div>
                                <div class="form-group">
                                    <label>Current Image: </label>
                                    <div class="img">
                                        <img src="{{ asset("upload/product_img/$product->id/".$product->image) }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Product Keywords</label>
                                    <input class="form-control" readonly="readonly" value="{!! isset($product) ? $product->keywords : null !!}" />
                                </div>
                                <div class="form-group">
                                    <label>Product Description</label>
                                    <textarea class="form-control" readonly="readonly" rows="3">{!! isset($product) ? $product->description : null !!}</textarea>
                                </div>
                            </div>
                            <div class="panel-footer">
                                Product Detail ID: {{ $product->id }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-lg-offset-1">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            List Current
                        </div>
                        <div class="panel-body">
                            @foreach ($img_details as $e)
                                <div class="img">
                                    <img src="{{ asset("upload/product_img/$product->id/img_detail/".$e['image']) }}">
                                </div>
                            @endforeach
                        </div>
                        <div class="panel-footer">
                            Product Image Details
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-lg-offset-1">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Sale
                        </div>
                        <div class="panel-body">
                            <td>
                                <input type="number" min="0" max="{{ $product->price }}" step="10000" name="txtSale" class="form-control price_sale" placeholder="Enter Sale Price" value="{{ isset($product->newPrice) ? $product->newPrice : null }}">
                                <p id="check{{ $product->id }}" style="color: blue;"></p>
                            </td>
                            <td class="center"><a id="saveSale" idP="{{ $product->id }}" href="javascript:void(0)"><button type="button" class="btn btn-info">Save</button></a></td>
                        </div>
                        <div class="panel-footer">
                            Set Sale Price
                        </div>
                    </div>
                </div>
            <form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection()