@extends('front.master')
@section('title','Chi Tiết Sản Phẩm')
@section('content')
	<div class="header @if ($image_header->filter == 1)
		header-filter
	@endif" style="background-image: url('{{ asset("upload/pages/$image_header->id/".$image_header->image) }}');">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="brand">
						<h1>Product Detail.</h1>
						<h3>Chi Tiết Sản Phẩm. {{ $product['name'] }}</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="main main-raised">
		<div class="section section-basic">
			<div class="container">
				@include('front.blocks.left-sidebar')
				<div class="product-detail">
					<div class="img-detail">
						<div class="col-md-3 col-md-offset-1">
							<div class="card card-raised card-carousel">
								<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
									<div class="carousel slide" data-ride="carousel">

										<!-- Indicators -->
										<ol class="carousel-indicators">
											<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
											<li data-target="#carousel-example-generic" data-slide-to="1"></li>
											<li data-target="#carousel-example-generic" data-slide-to="2"></li>
										</ol>

										<!-- Wrapper for slides -->
										<div class="carousel-inner">
											<div class="item active">
												<img src="{{ asset('upload/product_img/'.$product['id'].'/'.$product['image']) }}" alt="Awesome Image">
											</div>
											@foreach ($img_details as $item)
												<div class="item">
													<img src="{{ asset('upload/product_img/'.$product['id'].'/img_detail/'.$item['image']) }}" alt="Awesome Image">
												</div>
											@endforeach
										</div>

										<!-- Controls -->
										<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
											<i class="material-icons">keyboard_arrow_left</i>
										</a>
										<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
											<i class="material-icons">keyboard_arrow_right</i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="info-detail">
						<div class="col-sm-5">
							<h2>{{ $product['name'] }}</h2>
							@if ($product['price'] > $product['newPrice'])
	                    		<img src="{{ asset('front/assets/img/sale.png') }}" class="new" alt="" />
	                    		<h3 class="text-danger">{{ number_format($product['newPrice'],0,',','.') }} VNĐ</h3>
	                    		<p style="text-decoration: line-through;">{{ number_format($product['price'],0,',','.') }} VNĐ</p>
	                    	@else
								<h3 class="text-danger">{{ number_format($product['price'],0,',','.') }} VNĐ</h3>
	                    	@endif
							<p class="text-success">Tình Trạng: @if ($product['qty_input'] > 0)
								Còn Hàng
							@else
								<span class="text-danger">Tạm hết hàng</span>
							@endif</p>
							<p>{{ $product['description'] }}</p>
							<div class="form-group col-sm-5">
								<form action="{{ route('addCart',$product['id']) }}" method="GET">
									<input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
									<div class="form-group label-floating">
										<label class="control-label">Số Lượng</label>
										<input type="number" name="txtQty" value="1" min="1" max="{{ $product['qty_input'] }}" class="form-control">
									</div>
									@if ($product['qty_input'] > 0)
										<button type="submit" class="btn btn-primary">Mua hàng</button>
									@else
										<button class="btn btn-default" disabled="disabled">Tạm hết hàng</button>
									@endif
									
								</form>
								
							</div>

						</div>
					</div>
					<div class="intro-detail">
						<div class="col-md-8 col-md-offset-1">
							<div class="card card-nav-tabs card-plain">
								<div class="header header-primary">
									<div class="nav-tabs-navigation">
										<div class="nav-tabs-wrapper">
											<ul class="nav nav-tabs" data-tabs="tabs">
												<li class="active"><a href="#info" data-toggle="tab">Thông Tin Sản Phẩm</a></li>
												<li><a href="#guide" data-toggle="tab">Hướng Dẫn Mua Hàng</a></li>
												<li><a href="#tags" data-toggle="tab">Tags</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="content">
									<div class="tab-content text-center">
										<div class="tab-pane active" id="info">
											{!! $product['intro'] !!}
										</div>
										<div class="tab-pane" id="guide">
											@if (!empty($shopping->content))
												{!! $shopping->content !!}
											@endif
										</div>
										<div class="tab-pane" id="tags">
											<i class="fa fa-tags"> Ao</i></br>
											<i class="fa fa-tags"> Quan</i></br>
											<i class="fa fa-tags"> Style</i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="kind_product">
					<div class="col-md-8 col-md-offset-1">
						<a href="{{ route('cate',[$product['cate_id'],'san-pham-lien-quan']) }}"><h3 class="text-primary">Sản Phẩm Cùng Loại</h3></a>
						@foreach ($product_cates as $item)
							@if ($item['id'] != $product['id'])
								<div class="col-md-3 single-product">
			                    	<div>
			                    		<a href="{{ route('product',[$item['id'],$item['alias']]) }}">
			                    			<figure><img src="{{ asset('upload/product_img/'.$item['id'].'/'.$item['image']) }}" class="img-rounded img-responsive" /></figure>
			                    		</a>
			                    	</div>
			                    	@if ($item['price'] > $item['newPrice'])
			                    		<img src="{{ asset('front/assets/img/sale.png') }}" class="new" alt="" />
			                    	@endif
			                    	<div class="detail">
			                    		<h4>{{ $item['name'] }}</h4>
			                    		@if ($item['price'] > $item['newPrice'])
		                    			<p class="text-info">{{ number_format($item['newPrice'],0,',','.') }} VNĐ <i style="text-decoration: line-through; color: black;">{{ number_format($item['price'],0,',','.') }}đ</i></p>
		                    		@else
										<p class="text-info">{{ number_format($item['price'],0,',','.') }} VNĐ</p>
		                    		@endif
			                    		<a href="{{ route('product',[$item['id'],$item['alias']]) }}"><button class="btn btn-primary"><i class="fa fa-eye"></i>&nbsp;Xem Chi Tiết</button></a>
			                    	</div>
			                    </div>
							@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection()

