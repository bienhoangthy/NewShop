@extends('admin.master')
@section('content')
<style type="text/css">
    .img img {
        width: 700px; height: auto; box-shadow: 10px 10px 15px 0px rgba(0,0,0,0.40);
    }
    .message {padding-top: 20px;}
</style>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 message">
                @include('admin.error.error')
                @include('admin.error.flash_message')
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ $page->page }} Page
                    <small>Image</small>
                    @include('admin.blocks.img-pages')
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-8" style="padding-bottom:120px">
                <div class="form-group">
                    <label>Current Image: </label>@if ($page->filter == 1)
                        <span>Filter Header</span>
                    @endif
                    <div class="img">
                         @if ($page->image)
                            <img src="{{ asset("upload/pages/$page->id/".$page->image) }}" class="img-responsive">
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Note
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('admin.display.postImagePage') }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                            <div class="form-group">
                                <input type="file" name="fImages">
                            </div>
                            <div class="form-group">
                                <label>Header Filter</label>
                                <label class="radio-inline">
                                    <input type="radio" name="radioFilter" value="0" checked>None
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="radioFilter" value="1">Filter
                                </label>
                            </div>
                            <input type="hidden" name="idImgCurrent" value="{{ $page->id }}"></input>
                            <button type="submit" class="btn btn-success">Update Image</button>
                        </form>
                        </br>
                        <p>Đây là ảnh background đầu trang {{ $page->page }}, bạn có thể tùy chỉnh ảnh phù hợp với Shop. Bạn cũng có thể chọn mục filter để làm nổi chữ đầu trang!</p>
                    </div>
                    <div class="panel-footer">
                    @if ($page->route != null)
                        <a href="{!! route("$page->route") !!}" target="_target"><button type="button" class="btn btn-default">See Page</button></a>
                    @else
                        <p>Trang này cần truy cập cụ thể, ví dụ trang: Sản phẩm, Loại sản phẩm, Tài khoản...</p>
                    @endif
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection()
