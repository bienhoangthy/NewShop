@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Edit</small>
                    <a style="margin-left: 50px;" href="{{ route('admin.user.getList') }}"><button type="button" class="btn btn-outline btn-primary">List User</button></a>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @include('admin.error.error')
                <form action="" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" name="txtUser" readonly="readonly" placeholder="Please Enter Username" value="{{ old('txtUser', isset($user) ? $user->name : null) }}" />
                    </div>
                    <div class="form-group">
                        <label>Fullname</label>
                        <input class="form-control" name="txtFullname" placeholder="Please Enter Lastname and Firstname" value="{{ old('txtFullname', isset($user) ? $user->fullname : null) }}" />
                    </div>
                    <div class="form-group">
                        <button type="button" id="changePass" class="btn btn-outline btn-primary">Change Password</button>
                        <button type="button" id="notchangePass" class="btn btn-outline btn-primary">Do Not Change</button>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" disabled class="form-control pass" name="txtPass" placeholder="Please Enter Password" />
                    </div>
                    <div class="form-group">
                        <label>RePassword</label>
                        <input type="password" disabled class="form-control pass" name="txtRePass" placeholder="Please Enter RePassword" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="txtEmail" placeholder="Please Enter Email" value="{{ old('txtEmail', isset($user) ? $user->email : null) }}" />
                    </div>
                    @if (Auth::user()->id != $user->id)
                        <div class="form-group">
                            <label>User Level</label>
                            <label class="radio-inline">
                                <input name="rdoLevel" value="1" type="radio" @if ($user->role == 1)
                                    checked="checked" 
                                @endif>Admin
                            </label>
                            <label class="radio-inline">
                                <input name="rdoLevel" value="2" type="radio" @if ($user->role == 2)
                                    checked="checked" 
                                @endif>Member
                            </label>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-success">User Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection()

@section('script')
    <script>
        $(document).ready(function() {
            $("#changePass").click(function() {
                $(".pass").removeAttr('disabled');
            });
            $("#notchangePass").click(function() {
                $(".pass").attr('disabled','');
            });
        });
    </script>
@endsection()