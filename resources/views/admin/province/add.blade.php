@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Province
                    <small>Add</small>
                    <a style="margin-left: 50px;" href="{{ route('admin.province.getList') }}"><button type="button" class="btn btn-outline btn-primary">List Province</button></a>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @include('admin.error.error')
                <form action="" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                    <div class="form-group">
                        <label>Province</label>
                        <input class="form-control" name="txtProvince" placeholder="Please Enter Province" />
                    </div>
                    <button type="submit" class="btn btn-success">Province Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection()