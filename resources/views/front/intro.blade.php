@extends('front.master')
@section('title','Giới Thiệu')
@section('content')
	<div class="header @if ($image_header->filter == 1)
		header-filter
	@endif" style="background-image: url('{{ asset("upload/pages/$image_header->id/".$image_header->image) }}');">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="brand">
						<h1>Introduction.</h1>
						<h3>Giới thiệu sơ lượt và tiêu chí của cửa hàng.</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="main main-raised">
		<div class="section section-basic">
			<div class="container">
				<p><a class="text-success" href="{{ route('home') }}">Trang Chủ</a>/Thanh Toán</p>
				<div class="intro">
					@if (!empty($intro->content))
						{!! $intro->content !!}
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection()

