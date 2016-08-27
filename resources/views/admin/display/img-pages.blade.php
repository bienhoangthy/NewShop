@extends('admin.master')
@section('content')
<style type="text/css">
    .img img {
        width: 700px; height: auto; box-shadow: 10px 10px 15px 0px rgba(0,0,0,0.40);
    }
    .panel-heading span {color: black;}
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
                <h1 class="page-header">Home Page
                    <small>Slide</small>
                    <a style="margin-left: 50px;" href="{{ route('home') }}" target="_target"><button type="button" class="btn btn-outline btn-primary">See Page</button></a>
                    @include('admin.blocks.img-pages')
                </h1>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Carousel Slide - Đây là slide của trang chủ hiện tại có 3 ảnh, bạn có thể tùy chỉnh ảnh phù hợp với Shop. <span>Chú ý mỗi lần Update một hình!</span>
                    </div>
                    <!-- .panel-heading -->
                    <div class="panel-body">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Current Slide: 1</a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="slide">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label>Current Slide: 1</label>
                                                    <div class="img">
                                                        @if ($index1->image)
                                                            <img src="{{ asset("upload/pages/index/$index1->id/".$index1->image) }}" class="img-responsive">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="panel panel-info">
                                                    <div class="panel-heading">
                                                        Choose Replace Image
                                                    </div>
                                                    <div class="panel-body">
                                                        <form action="{{ route('admin.display.postImagePageIndex') }}" method="POST" enctype="multipart/form-data">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                                                            <div class="form-group">
                                                                <input type="file" name="fImages" required="required">
                                                            </div>
                                                            <input type="hidden" name="idImgCurrent" value="1"></input>
                                                            <button type="submit" class="btn btn-success">Update Image</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Current Slide: 2</a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="slide">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label>Current Slide: 2</label>
                                                    <div class="img">
                                                        @if ($index2->image)
                                                            <img src="{{ asset("upload/pages/index/$index2->id/".$index2->image) }}" class="img-responsive">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="panel panel-info">
                                                    <div class="panel-heading">
                                                        Choose Replace Image
                                                    </div>
                                                    <div class="panel-body">
                                                        <form action="{{ route('admin.display.postImagePageIndex') }}" method="POST" enctype="multipart/form-data">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                                                            <div class="form-group">
                                                                <input type="file" name="fImages" required="required">
                                                            </div>
                                                            <input type="hidden" name="idImgCurrent" value="2"></input>
                                                            <button type="submit" class="btn btn-success">Update Image</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Current Slide: 3</a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="slide">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label>Current Slide: 3</label>
                                                    <div class="img">
                                                        @if ($index3->image)
                                                            <img src="{{ asset("upload/pages/index/$index3->id/".$index3->image) }}" class="img-responsive">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="panel panel-info">
                                                    <div class="panel-heading">
                                                        Choose Replace Image
                                                    </div>
                                                    <div class="panel-body">
                                                        <form action="{{ route('admin.display.postImagePageIndex') }}" method="POST" enctype="multipart/form-data">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                                                            <div class="form-group">
                                                                <input type="file" name="fImages" required="required">
                                                            </div>
                                                            <input type="hidden" name="idImgCurrent" value="3"></input>
                                                            <button type="submit" class="btn btn-success">Update Image</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection()
