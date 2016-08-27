@extends('front.master')
@section('title','Liên Hệ')
@section('content')
	<div class="header @if ($image_header->filter == 1)
		header-filter
	@endif" style="background-image: url('{{ asset("upload/pages/$image_header->id/".$image_header->image) }}');">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="brand">
						<h1>Contact-us.</h1>
						<h3>Bản đồ và thông tin liên hệ.</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="main main-raised">
		<div class="section section-basic">
			<div class="container">
				<div class="contact">
					<p><a href="{{ route('home') }}">Trang Chủ</a>/Liên Hệ</p>
					<h2>LIÊN HỆ</h2>
					<p class="text-danger">{{ $contact->address }}</p>
					<div class="map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.217212087273!2d109.30136871428526!3d13.085415915912426!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x316fec17046218f9%3A0x61ad3f8603e6e0f4!2zMTAwIFRy4bqnbiBIxrBuZyDEkOG6oW8sIFBoxrDhu51uZyAxLCB0cC4gVHV5IEjDsmEsIFBow7ogWcOqbiwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1470669750554" width="1140" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
					<div class="form-contact">
						<div class="col-sm-6">
							@include('front.errors.error')
							<h3>GÓP Ý</h3>
							<form action="{{ route('postContact') }}" method="POST">
								<input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
								<div class="form-group label-floating">
									<label class="control-label">Họ Và Tên*</label>
									<input type="text" name="txtName_Contact" class="form-control" value="{{ old('txtName_Contact') }}">
								</div>
								<div class="form-group label-floating">
									<label class="control-label">Email*</label>
									<input type="email" name="txtEmail_Contact" class="form-control" value="{{ old('txtEmail_Contact') }}">
								</div>
								<div class="form-group">
									<textarea class="form-control" name="txtMessage" placeholder="Bình luận*" rows="5">{{ old('txtMessage') }}</textarea>
								</div>
								<button type="submit" class="btn btn-primary form-group">Gửi Nhận Xét</button>
							</form>
						</div>
						<div class="col-sm-6">
							<div class="contact-add">
								<a href="#"><img src="{{ asset('front/assets/img/logo.jpg') }}" alt="Circle Image" class="img-circle img-responsive"></a>
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
		</div>
	</div>
@endsection()

