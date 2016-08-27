@extends('front.master')
@section('title','Hoàn Thành Thanh Toán')
@section('content')
	<div class="header @if ($image_header->filter == 1)
		header-filter
	@endif" style="background-image: url('{{ asset("upload/pages/$image_header->id/".$image_header->image) }}');">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="brand">
						<h1>Complete.</h1>
						<h3>Đặt hàng thành công.</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="main main-raised">
		<div class="section section-basic">
			<div class="container">
				<div class="thanks" style="text-align: center;">
					<h3 class="text-success">Cảm ơn quý khách đã mua hàng tại Shop!</h3>
					<p>Chúng tôi sẽ liên lạc với bạn trong thời gian ngắn nhất.</p>
				</div>
			</div>
		</div>
	</div>
@endsection()

