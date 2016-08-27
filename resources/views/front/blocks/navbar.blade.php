<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll">
	<div class="container">
        <div class="navbar-header">
	    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
        	<span class="sr-only">Toggle navigation</span>
        	<span class="icon-bar"></span>
        	<span class="icon-bar"></span>
        	<span class="icon-bar"></span>
    	</button>
    	<a href="{{ route('home') }}">
        	<div class="logo-container">
                <div class="logo">
                    <img src="{{ asset('front/assets/img/logo.jpg') }}" alt="" rel="tooltip" title="<b>NewShop</b> was Designed & Coded with NewShop <b>Thy</b>" data-placement="bottom" data-html="true">
                </div>
                <div class="brand">
                    New Shop
                </div>
			</div>
      	</a>
	    </div>

	    <div class="collapse navbar-collapse" id="navigation-index">
	    	<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="{{ route('home') }}">
						<i class="material-icons">store</i> Trang Chủ
					</a>
				</li>
				<li>
					<a href="{{ route('intro') }}">
						<i class="material-icons">today</i> Giới thiệu
					</a>
				</li>
				<li>
					<a href="{{ route('shop') }}">
						<i class="material-icons">shop_two</i> Sản Phẩm
					</a>
				</li>
				<li>
					<a href="{{ route('sale') }}">
						<i class="material-icons">monetization_on</i> Sale Off
					</a>
				</li>
				<li>
					<a href="{{ route('contact') }}">
						<i class="material-icons">contact_phone</i> Liên Hệ
					</a>
				</li>
				<li class="dropdown">
        			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="material-icons">lock_open</i> {!! (Auth::check()) ? Auth::user()->fullname : "Tài Khoản" !!} <b class="caret"></b></a>
        			<ul class="dropdown-menu">
        				@if (Auth::check())
        					@if (Auth::user()->role == 1)
				      			<li><a href="{{ route('admin.getDashboard') }}">Quản Lý Shop</a></li>
				      			<li class="divider"></li>
				      		@endif
        					<li><a href="{{ route('userinfo',[Auth::user()->id,Auth::user()->name]) }}">Chỉnh Sửa Thông Tin</a></li>
        					<li><a href="{{ route('historyCheckout') }}">Lịch sử mua hàng</a></li>
					  		<li class="divider"></li>
				      		<li><a href="{{ url('auth/logout') }}">Đăng Xuất</a></li>
				      	@else
				      		<li><a href="{{ url('auth/login') }}">Đăng Nhập</a></li>
					  		<li><a href="{{ url('auth/register') }}">Đăng Ký</a></li>
					  		<li class="divider"></li>
					  		<li><a href="{{ url('password/reset') }}">Quên Mật Khẩu</a></li>
        				@endif
        			</ul>
        		</li>
				<li style="padding-right: 10px; margin-top: -12px;">
					<a href="{{ route('cart') }}"><button type="button" class="btn btn-info btn-tooltip" data-toggle="tooltip" data-placement="bottom" data-container="body"><i class="fa fa-shopping-cart"></i> <span id="countCart">{{ isset($count_cart) ? $count_cart : 0 }}</span></button></a>
					
				</li>

	    	</ul>
	    </div>
	</div>
</nav>