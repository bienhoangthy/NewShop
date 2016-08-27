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
    
    .add_img {margin-top: 10px;}
    .img .icon_del {
      position: relative;
      left: 60px;
      top: -280px; }
    .img .icon_del:hover {
      background: #DD0000;
      color: #fff; }
      .page-header a {margin-left: 50px;}
</style>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Edit</small>
                    <a href="{{ route('admin.product.getList') }}"><button type="button" class="btn btn-outline btn-primary">List Product</button></a>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <form action="" method="POST" enctype="multipart/form-data" name="frmEditProduct">
                <div class="col-lg-7" style="padding-bottom:120px">
                    @include('admin.error.error')
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="sltParent">
                            <option value="">Please Choose Category</option>
                            {!! cate_parent($cates,0,'',$product->cate_id) !!}
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="txtName" placeholder="Please Enter Product Name" value="{!! old('txtName', isset($product) ? $product->name : null) !!}" />
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" name="txtPrice" placeholder="Please Enter Price" value="{!! old('txtPrice', isset($product) ? $product->price : null) !!}" />
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input class="form-control" name="txtQuantity" placeholder="Please Enter Quantity" value="{!! old('txtQuantity', isset($product) ? $product->qty_input : null) !!}" />
                    </div>
                    <div class="form-group">
                        <label>Intro</label>
                        <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro', isset($product) ? $product->intro : null) !!}</textarea>
                        <script type="text/javascript">ckeditor("txtIntro")</script>
                    </div>
                    <div class="form-group">
                        <label>Current Image: </label>
                        <div class="img">
                            <img src="{{ asset("upload/product_img/$product->id/".$product->image) }}" class="img-responsive">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" name="fImages">
                    </div>
                    <div class="form-group">
                        <label>Product Keywords</label>
                        <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="{!! old('txtKeywords', isset($product) ? $product->keywords : null) !!}" />
                    </div>
                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription', isset($product) ? $product->description : null) !!}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Product Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
                <div class="col-lg-4 col-lg-offset-1">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            List Current
                        </div>
                        <div class="panel-body">
                            @foreach ($img_details as $key => $e)
                                <div class="img" id="{{ $key }}">
                                    <img id="{{ $key }}" idImg="{{ $e['id'] }}" class="img-responsive" src="{{ asset("upload/product_img/$product->id/img_detail/".$e['image']) }}">
                                    <a href="javascript:void(0)" type="button" id="del_image" class="btn btn-default  btn-circle icon_del"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </div>
                            @endforeach
                        </div>
                        <div class="panel-footer">
                            Product Image Details
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-lg-offset-1">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Add
                        </div>
                        <div class="panel-body">
                            <a href="javascript:void(0)" id="add_image">
                                <button type="button" class="btn btn-outline btn-primary btn-block">Add Product Image Details</button>
                            </a>
                            <div id="insert">
                            </div>
                        </div>
                        <div class="panel-footer">
                            Product Image Details
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