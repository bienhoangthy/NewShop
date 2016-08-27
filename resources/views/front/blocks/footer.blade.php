<footer class="footer">
    <div class="main-footer">
    	<div class="container">
    		<div class="row">
    			<div class="companyinfo">
    				<div class="col-sm-3">
    					<a href="{{ route('home') }}"><img src="{{ asset('front/assets/img/logo.jpg') }}" alt="Circle Image" class="img-circle img-responsive"></a>
						<p>{{ $contact->slogan }}</p>
                    </div>
    			</div>
    			<div class="linked">
    				<div class="col-sm-3">
    					<div class="title-footer">
    						<h4>LIÊN KẾT</h4>
    					</div>
    					<a href="{{ route('home') }}"><p class="text-muted">Trang Chủ</p></a>
    					<a href="{{ route('intro') }}"><p class="text-muted">Giới Thiệu</p></a>
                        <a href="{{ route('shop') }}"><p class="text-muted">Sản Phẩm</p></a>
    					<a href="{{ route('sale') }}"><p class="text-muted">Sale off</p></a>
    					<a href="{{ route('contact') }}"><p class="text-muted">Liên Hệ</p></a>
    				</div>
    			</div>
    			<div class="sendemail">
    				<div class="col-sm-3">
    					<div class="title-footer">
    						<h4>ĐĂNG KÝ NHẬN TIN</h4>	
    					</div>
                            <form method="GET" action="{{ route('mail') }}">
                                <div class="form-group label-floating col-sm-10">
                                    <label class="control-label">Nhập Email</label>
                                    <input type="email" name="txtMail" class="form-control">
                                </div>
                                <button type="submit" class="form-group btn btn-default">Send    
                                &nbsp;<i class="fa fa-share"></i></button>
                            </form>
    				</div>
    			</div>
				<div class="contactus">
					<div class="col-sm-3">
						<div class="title-footer">
    						<h4>LIÊN HỆ</h4>	
    					</div>
    					<p>Nếu bạn có thắc mắc hãy liên hệ với chúng tôi theo các cách dưới đây.</P>
						<a target="_blank" href="{{ url('facebook') }}"><i class="fa fa-facebook-square fa-lg"></i></a>
						<a target="_blank" href="{{ url('google') }}"><i class="fa fa-google-plus fa-lg"></i></a>
	                    <div class="address">
	                    	<p><i class="fa fa-map-marker fa-lg" aria-hidden="true"></i> {{ $contact->address }}</p>
	                    	<p><i class="fa fa-mobile fa-lg" aria-hidden="true"></i> {{ $contact->tel }}</p>
	                    	<p><i class="fa fa-envelope fa-lg" aria-hidden="true"></i> {{ $contact->email }}</p>
	                    </div>
					</div>
				</div>
    		</div>
    	</div>
    </div>
    <div class="bot-footer">
    	<div class="container">
    		<div class="row">
    			<p class="pull-left">Copyright © 2016 NEW-SHOP. (Sản phẩm web mẫu, không phải là hình thức kinh doanh online)</p>
				<p class="pull-right">Designed by <span><a target="_blank" href="{{ url('facebook') }}">Thy Biện</a></span></p>
    		</div>
    	</div>
    </div>
</footer>