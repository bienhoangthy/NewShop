@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Add</small>
                    <a style="margin-left: 50px;" href="{{ route('admin.product.getList') }}"><button type="button" class="btn btn-outline btn-primary">List Product</button></a>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="col-lg-7" style="padding-bottom:120px">
                    @include('admin.error.error')
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="sltParent">
                            <option value="">Please Choose Category</option>
                            {!! cate_parent($cates,0,'',old('sltParent')) !!}
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="txtName" placeholder="Please Enter Product Name" value="{{ old('txtName') }}" />
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" name="txtPrice" placeholder="Please Enter Price" value="{{ old('txtPrice') }}"/>
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input class="form-control" name="txtQuantity" placeholder="Please Enter Quantity" value="{{ old('txtQuantity') }}"/>
                    </div>
                    <div class="form-group">
                        <label>Intro</label>
                        <textarea class="form-control" rows="3" name="txtIntro">{{ old('txtIntro') }}</textarea>
                        <script type="text/javascript">ckeditor("txtIntro")</script>
                    </div>
                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" name="fImages" value="{{ old('fImages') }}">
                    </div>
                    <div class="form-group">
                        <label>Product Keywords</label>
                        <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="{{ old('txtKeywords') }}"/>
                    </div>
                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" rows="3" name="txtDescription">{{ old('txtDescription') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Product Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
                <div class="col-lg-4 col-lg-offset-1">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Product Image Details
                        </div>
                        <div class="panel-body">
                            @for ($i = 0; $i < 4; $i++)
                                <input type="file" name="fProductDetail[]" style="padding-bottom: 20px;"></input>
                            @endfor
                        </div>
                        <div class="panel-footer">
                            Images
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
