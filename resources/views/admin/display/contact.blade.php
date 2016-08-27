@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Contact Information
                    <small>Page</small>
                    <a style="margin-left: 50px;" href="{{ route('contact') }}" target="_target"><button type="button" class="btn btn-outline btn-primary">See Page</button></a>
                </h1>
            </div>
            @include('admin.error.flash_message')
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @include('admin.error.error')
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Nội dung này sẽ hiển thị thông tin liên lạc của Shop ở toàn bộ Web
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('admin.display.postContactPage') }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                            <div class="form-group">
                                <label>Address</label>
                                <input class="form-control" name="txtAddress" value="{{ old('txtAddress', isset($contact) ? $contact->address : null) }}" />
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" name="txtPhone" value="{{ old('txtPhone', isset($contact) ? $contact->tel : null) }}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="txtEmail" value="{{ old('txtEmail', isset($contact) ? $contact->email : null) }}" />
                            </div>
                            <div class="form-group">
                                <label>Slogan</label>
                                <textarea class="form-control" rows="5" name="txtSlogan">{{ old('txtSlogan', isset($contact) ? $contact->slogan : null) }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Update</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                    <div class="panel-footer">
                        Footer and Contact Page
                    </div>
                </div>
                
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection()