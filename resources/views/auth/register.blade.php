@extends('auth.layout')
@section('title','Register')
@section('content')
	<nav class="navbar navbar-transparent navbar-absolute">
    	<div class="container">
        	<!-- Brand and toggle get grouped for better mobile display -->
        	<div class="navbar-header">
        		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
            		<span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
        		</button>
        		<a class="navbar-brand" href="{{ route('home') }}">New Shop</a>
        	</div>

        	<div class="collapse navbar-collapse" id="navigation-example">
        		<ul class="nav navbar-nav navbar-right">
					<li>
    					<a href="{{ url('auth/login') }}">
    						ĐĂNG NHẬP
    					</a>
    				</li>
    				<li>
						<a href="{{ route('home') }}">
							<i class="material-icons">home</i> TRANG CHỦ
						</a>
    				</li>
		            <li>
		                <a href="{{ url('facebook') }}" target="_blank" class="btn btn-simple btn-white btn-just-icon">
							<i class="fa fa-facebook-square"></i>
						</a>
		            </li>
					<li>
		                <a href="{{ url('google') }}" target="_blank" class="btn btn-simple btn-white btn-just-icon">
							<i class="fa fa-google-plus"></i>
						</a>
		            </li>
        		</ul>
        	</div>
    	</div>
    </nav>

    <div class="wrapper">
		<div class="header header-filter" style="background-image: url('{{ asset('front/auth/img/bg.jpg') }}'); background-size: cover; background-position: top center;">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div class="card card-signup">
							<form class="form" method="POST" action="">
								<input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
								<div class="header header-success text-center">
									<h4>Đăng Ký</h4>
									<div class="logo-home">
										<img src="{{ asset('front/assets/img/logo.jpg') }}" alt="Raised Image" class="img-rounded img-responsive img-raised">
									</div>
									{{-- <div class="social-line">
										<a href="#" class="btn btn-simple btn-just-icon">
											<i class="fa fa-facebook-square"></i>
										</a>
										<a href="#" class="btn btn-simple btn-just-icon">
											<i class="fa fa-google-plus"></i>
										</a>
									</div> --}}
								</div>
								<div class="alert alert-success">
								    <div class="container-fluid">
									  <div class="alert-icon">
										<i class="material-icons">check</i>
									  </div>
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true"><i class="material-icons">clear</i></span>
									  </button>
								      <b>Email:</b> Chúng tôi khuyên bạn nên dùng địa chỉ Email thật!
								    </div>
								</div>
								@include('auth.error')
								<p class="text-divider"></p>
								<div class="content">

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">face</i>
										</span>
										<input type="text" class="form-control" name="txtUser" value="{{ old('txtUser') }}" placeholder="Tên Đăng Nhập">
									</div>
									
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
										<input type="text" name="txtEmail" class="form-control" value="{{ old('txtEmail') }}" placeholder="Email">
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<input type="password" name="txtPass" placeholder="Mật Khẩu" class="form-control" />
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<input type="password" name="txtRePass" placeholder="Nhập Lại Mật Khẩu" class="form-control" />
									</div>

									<div class="footer text-center">
										<button type="submit" class="btn btn-success">Register</button>
									</div>
								</div>
								<div class="footer text-center">
									<a href="{{ url('password/reset') }}" class="btn btn-simple btn-success btn-lg">Quên mật khẩu</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<footer class="footer">
		        <div class="container">
		            <nav class="pull-left">
						<ul>
							<li>
								<a href="{{ route('home') }}">
									Hoàng Thy
								</a>
							</li>
							<li>
								<a href="{{ route('intro') }}">
								   Giới Thiệu
								</a>
							</li>
						</ul>
		            </nav>
		            <div class="copyright pull-right">
		                &copy; 2016, Newshop <i class="fa fa-heartbeat"></i></a>
		            </div>
		        </div>
		    </footer>

		</div>

    </div>
@endsection()