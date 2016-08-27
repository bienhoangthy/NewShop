@extends('front.master')
@section('title','Nhận Xét Thành Công')
@section('content')
	<div class="header @if ($image_header->filter == 1)
		header-filter
	@endif" style="background-image: url('{{ asset("upload/pages/$image_header->id/".$image_header->image) }}');">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="brand">
						<h1>Thanks.</h1>
						<h3>Gửi nhận xét thành công.</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="main main-raised">
		<div class="section section-basic">
			<div class="container">
				<div class="thanks" style="text-align: center;">
					<h3 class="text-success">Cảm ơn {{ $name }} đã quan tâm và góp ý tới Shop của chúng tôi</h3>
					<p>Nhận xét, góp ý của {{ $name }} sẽ giúp chúng tôi phát triển Shop hoàn thiện hơn, cũng là động lực để chúng tôi thực hiện điều đó!</p>
					<p>Chúng tôi sẽ gửi các sản phẩm mới hoặc các chương trình khuyến mãi qua email {{ $email }} của bạn.</p>
				</div>
			</div>
		</div>
	</div>
@endsection()

