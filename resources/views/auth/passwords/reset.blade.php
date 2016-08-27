@extends('auth.layout')
@section('title','Reset Password')
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
    					<a href="{{ url('auth/register') }}">
    						ĐĂNG KÝ
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
		<div class="header header-filter" style="background-image: url('{{ asset('front/auth/img/bg2.jpg') }}'); background-size: cover; background-position: top center;">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div class="card card-signup">
							<form class="form" method="POST" action="{{ url('/password/reset') }}">
								{{ csrf_field() }}
								<input type="hidden" name="token" value="{{ $token }}">
								<div class="header header-info text-center">
									<h4>Đặt Lại Mật Khẩu</h4>
									<div class="logo-home">
										<img src="{{ asset('front/assets/img/logo.jpg') }}" alt="Raised Image" class="img-rounded img-responsive img-raised">
									</div>
								</div>
								@include('auth.error')
								@include('auth.flash_message')
								<p class="text-divider"></p>
								<div class="content">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
										<input type="email" id="email" name="email" value="{{ $email or old('email') }}" class="form-control" />
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<input type="password" name="password" id="password" placeholder="Mật Khẩu" class="form-control" />
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<input type="password" id="password-confirm" name="password_confirmation" placeholder="Nhập Lại Mật Khẩu" class="form-control" />
									</div>

									<div class="footer text-center">
										<button type="submit" class="btn btn-info">Đổi lại mật khẩu</button>
									</div>
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