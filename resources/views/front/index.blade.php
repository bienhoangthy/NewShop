@extends('front.master')
@section('title','New Shop')
@section('content')
	<div class="header" id="carousel">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="full-width-div">
							<!-- Carousel Card -->
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
												<img src="{{ asset("upload/pages/index/$index1->id/".$index1->image) }}" alt="Awesome Image" class="img-responsive">
												<div class="carousel-caption">
													<h4><i class="material-icons">add_shopping_cart</i> Womans</h4>
												</div>
											</div>
											<div class="item">
												<img src="{{ asset("upload/pages/index/$index2->id/".$index2->image) }}" alt="Awesome Image" class="img-responsive">
												<div class="carousel-caption">
													<h4><i class="material-icons">add_shopping_cart</i> Mans</h4>
												</div>
											</div>
											<div class="item">
												<img src="{{ asset("upload/pages/index/$index3->id/".$index3->image) }}" alt="Awesome Image" class="img-responsive">
												<div class="carousel-caption">
													<h4><i class="material-icons">add_shopping_cart</i> Shoes</h4>
												</div>
											</div>
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
							<!-- End Carousel Card -->
						</div>
						

					</div>
				</div>
			</div>
	</div>
	<div class="main main-raised">
		<div class="section section-basic">
			<div class="container">
				@include('front.blocks.search')
				@include('front.blocks.left-sidebar')
				<div class="new-products">
					<div class="col-md-9">
						 <div class="tim-typo">
	                        <h2><span class="tim-note"></span>SẢN PHẨM MỚI</h2>
	                    </div>
	                    @foreach ($new_products as $item)
	                    	<div class="col-md-4 single-product">
		                    	<div>
		                    		<a href="{{ route('product',[$item['id'],$item['alias']]) }}"><figure><img src="{{ asset('upload/product_img/'.$item['id'].'/'.$item['image']) }}" class="img-rounded img-responsive" /></figure></a>
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
		                    		@if ($item['qty_input'] > 0)
		                    			<div  id="add{{ $item['id'] }}">
			                    			<a href="javascript:void(0)" id="addtoCart" idP="{{ $item['id'] }}"><button class="btn btn-primary"><i class="fa fa-cart-plus"></i>&nbsp;Thêm vào giỏ hàng</button></a>
			                    		</div>
			                    	@else
			                    		<a href="#"><button class="btn btn-default" disabled="disabled"><i class="fa fa-archive"></i>&nbsp;Tạm hết hàng</button></a>
		                    		@endif
		                    	</div>
		                    </div>
	                    @endforeach
					</div>
				</div>
				<div class="features">
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-4">
								<div class="info">
									<div class="icon icon-primary">
										<i class="material-icons">autorenew</i>
									</div>
									<h4 class="info-title">{{ $policy1->title }}</h4>
									<p>{{ $policy1->content }}</p>
								</div>
		                    </div>
		                    <div class="col-md-4">
								<div class="info">
									<div class="icon icon-success">
										<i class="material-icons">motorcycle</i>
									</div>
									<h4 class="info-title">{{ $policy2->title }}</h4>
									<p>{{ $policy2->content }}</p>
								</div>
		                    </div>
		                    <div class="col-md-4">
								<div class="info">
									<div class="icon icon-danger">
										<i class="material-icons">perm_phone_msg</i>
									</div>
									<h4 class="info-title">{{ $policy3->title }}</h4>
									<p>{{ $policy3->content }}</p>
								</div>
		                    </div>
						</div>
	                </div>
				</div>
				<div class="categories">
					<div class="row">
						<div class="col-md-12">
							<div class="card card-nav-tabs">
								<div class="header header-info">
									<div class="nav-tabs-navigation">
										<div class="nav-tabs-wrapper">
											<ul class="nav nav-tabs" data-tabs="tabs">
												<?php $count1 = 0 ?>
												@foreach ($cates as $key => $item)
													@if ($item['parent_id'] == 1 || $item['parent_id'] == 2)
														<?php $count1++ ?>
														<li class="<?php if($count1 == 1){echo 'active';} ?>">
															<a href="#{{ $item['id'] }}" data-toggle="tab">
																<i class="material-icons">redeem</i>
																{{ $item['name'] }}
															</a>
														</li>
													@endif
												@endforeach
											</ul>
										</div>
									</div>
								</div>
								<div class="content">
									<div class="tab-content text-center">
										<?php $count2 = 0 ?>
										@foreach ($cates as $item)
											@if ($item['parent_id'] == 1 || $item['parent_id'] == 2)
												<?php $count2++ ?>
												<div class="tab-pane <?php if ($count2 == 1) {
													echo "active";
												} ?>" id="{{ $item['id'] }}">
													<?php $count3 = 0 ?>
													@foreach ($products as $e)
														@if ($e['cate_id'] == $item['id'])
															<?php $count3++ ?>
															<?php if($count3 == 5)break; ?>
															<div class="col-md-3 single-product">
										                    	<div>
										                    		<a href="{{ route('product',[$e['id'],$e['alias']]) }}"><figure><img src="{{ asset('upload/product_img/'.$e['id'].'/'.$e['image']) }}" class="img-rounded img-responsive" /></figure></a>
										                    	</div>
										                    	@if ($e['price'] > $e['newPrice'])
										                    		<img src="{{ asset('front/assets/img/sale.png') }}" class="new" alt="" />
										                    	@endif
										                    	<div class="detail">
										                    		<h4>{{ $e['name'] }}</h4>
										                    		@if ($e['price'] > $e['newPrice'])
										                    			<p class="text-info">{{ number_format($e['newPrice'],0,',','.') }} VNĐ <i style="text-decoration: line-through; color: black;">{{ number_format($e['price'],0,',','.') }}đ</i></p>
										                    		@else
																		<p class="text-info">{{ number_format($e['price'],0,',','.') }} VNĐ</p>
										                    		@endif
										                    		<a href="{{ route('product',[$e['id'],$e['alias']]) }}"><button class="btn btn-primary"><i class="fa fa-eye"></i>&nbsp;Xem Chi Tiết</button></a>
										                    	</div>
										                    </div>
														@endif
													@endforeach
												</div>
											@endif
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection()		