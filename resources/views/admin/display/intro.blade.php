@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Introduction and Shopping Guide
                    <small>Display</small>
                </h1>
            </div>
            <div class="col-lg-9">
                @include('admin.error.error')
                @include('admin.error.flash_message')
            </div>
            <!-- /.col-lg-12 -->
            <form action="{{ route('admin.display.postIntroduction') }}" method="POST" enctype="multipart/form-data">
                <div class="col-lg-9" style="padding-bottom:120px">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                    <div class="form-group">
                        <label>Intro</label>
                        <textarea class="form-control" name="txtIntro">{!! old('txtIntro', isset($intro->content) ? $intro->content : null) !!}</textarea>
                        <script type="text/javascript">ckeditor("txtIntro")</script>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
            <div class="col-lg-3">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Note
                    </div>
                    <div class="panel-body">
                        <p>Nội dung biên soạn này sẽ hiện thị ở trang Introduction (Giới Thiệu), phần này bạn sẽ giới thiệu về shop, phương châm, sản phẩm bán, đối tượng phục vụ... Khách hàng sẽ đánh giá sự chuyên nghiệp của shop, và sẽ hiểu rõ hơn về shop. Dựa vào phần này!</p>
                    </div>
                    <div class="panel-footer">
                        <a href="{{ route('intro') }}" target="_target"><button type="button" class="btn btn-success">Xem trang</button></a>
                    </div>
                </div>
            </div>
            <form action="{{ route('admin.display.postShopping') }}" method="POST" enctype="multipart/form-data">
                <div class="col-lg-9" style="padding-bottom:120px">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                    <div class="form-group">
                        <label>Shopping Guide</label>
                        <textarea class="form-control" name="txtShopping">{!! old('txtShopping', isset($shopping->content) ? $shopping->content : null) !!}</textarea>
                        <script type="text/javascript">ckeditor("txtShopping")</script>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
            <div class="col-lg-3">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Note
                    </div>
                    <div class="panel-body">
                        <p>Nội dung biên soạn phần, này sẽ hiển thị ở trang chi tiết sản phầm, phầm hướng dẫn mua hàng. Bạn sẽ viết từng bước hướng dẫn mua hàng, các hình thức thanh toán cho khách hàng dễ nắm bắt. Hình thức Ship bạn cũng có thể thêm vào phần này</p>
                    </div>
                    <div class="panel-footer">
                        Click vào một sản phẩm, chọn mục "HƯỚNG DẪN MUA HÀNG".
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection()
