@extends('front.master')
@section('title','Nhận Email Thành Công')
@section('content')
	<div class="header @if ($image_header->filter == 1)
		header-filter
	@endif" style="background-image: url('{{ asset("upload/pages/$image_header->id/".$image_header->image) }}');">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="brand">
						<h1>Complete.</h1>
						<h3>Gửi Email thành công.</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="main main-raised">
		<div class="section section-basic">
			<div class="container">
				<div class="thanks" style="text-align: center;">
					<h3 class="text-success">Cảm ơn quý khách đã quan tâm tới Shop của chúng tôi</h3>
					<p>Chúng tôi đã gửi thông tin liên hệ qua Email của quý khách, mọi thông tin hoặc thắc mắc quý khách có thể gửi qua Email này!.</p>
				</div>
			</div>
		</div>
	</div>
@endsection()

