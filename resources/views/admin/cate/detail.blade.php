@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>Detail</small>
                    <a style="margin-left: 50px;" href="{{ route('admin.cate.getList') }}"><button type="button" class="btn btn-outline btn-primary">List Category</button></a>
                    <a style="margin-left: 50px;" href="{{ route('admin.cate.getEdit',$cate->id) }}"><button type="button" class="btn btn-outline btn-primary">Edit Category</button></a>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @include('admin.error.flash_message')
                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3>Category Name: {{ $cate->name }}</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Category Parent</label>
                                    <?php $cate_parent = DB::table('categories')->where('id',$cate->parent_id)->first(); ?>
                                    <input class="form-control" readonly="readonly" value="{!! isset($cate_parent) ? $cate_parent->name : null !!}"/>
                            </div>
                            <div class="form-group">
                                <label>Category Order</label>
                                <input class="form-control" readonly="readonly" value="{!! isset($cate->order) ? $cate->order : null !!}"/>
                            </div>
                            <div class="form-group">
                                <label>Category Keywords</label>
                                <input class="form-control" readonly="readonly" value="{!! isset($cate->keywords) ? $cate->keywords : null !!}"/>
                            </div>
                            <div class="form-group">
                                <label>Category Description</label>
                                <textarea class="form-control" readonly="readonly" rows="3">{!! isset($cate->description) ? $cate->description : null !!}</textarea>
                            </div>
                        </div>
                        <div class="panel-footer">
                            Category Detail ID: {{ $cate->id }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection()
