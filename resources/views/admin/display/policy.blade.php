@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Policy
                    <small>Home Page</small>
                    <a style="margin-left: 50px;" href="{{ route('home') }}" target="_target"><button type="button" class="btn btn-outline btn-primary">See Page</button></a>
                    @include('admin.blocks.img-pages')
                </h1>
            </div>
            <div class="col-lg-6">
                @include('admin.error.error')
            @include('admin.error.flash_message')
            </div>
            <div class="col-lg-12">
                <?php $stt = 0 ?>
                @foreach ($policy as $item)
                    <?php $stt++ ?>
                    <form method="POST" action="{{ route('admin.display.postPolicy') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                        <div class="col-md-4 ">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Policy {{ $stt }}
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input class="form-control" name="txtTitle" placeholder="Please Enter Title" value="{!! isset($item->title) ? $item->title : null !!}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Content</label>
                                        <textarea class="form-control" rows="4" name="txtContent">{!! isset($item->content) ? $item->content : null !!}</textarea>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <input type="hidden" name="txtStt" value="{{ $stt }}"></input>
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <button type="reset" class="btn btn-default">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection()
