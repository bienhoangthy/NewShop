@extends('front.master')
@section('title',"$cate->name")
@section('content')
	<div class="header @if ($image_header->filter == 1)
		header-filter
	@endif" style="background-image: url('{{ asset("upload/pages/$image_header->id/".$image_header->image) }}');">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="brand">
						<h1>Category.</h1>
						<h3>Danh mục sản phầm {{ $cate->name }}!</h3>
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
	                        <h2><span class="tim-note"></span>{{ $cate->name }}</h2>
	                    </div>
	                    @if (count($products) == 0)
	                    	<h5 class="text-danger">Danh mục sản phẩm {{ $cate->name }} đang trống, sẽ được cập nhật trong thời gian sớm nhất!</h5>
	                    @endif
	                    @foreach ($products as $item)
	                    	<div class="col-md-4 single-product">
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
	                @if (count($products) > 0)
	                	<div class="col-md-9 col-sm-offset-3">
							<ul class="pagination pagination-info">
								@if ($products->currentPage() != 1)
									<li><a href="{!! $products->url($products->currentPage() - 1) !!}"> prev</a></li>
								@endif
								
								@for ($i = 1; $i <= $products->lastPage() ; $i++)
									<li class="{!! ($products->currentPage() == $i) ? 'active' : '' !!}">
									<a href="{!! $products->url($i) !!}">{{ $i }}</a></li>
								@endfor
								@if ($products->currentPage() != $products->lastPage())
									<li><a href="{!! $products->url($products->currentPage() + 1) !!}">next </a></li>
								@endif
		                    </ul>
						</div>
	                @endif
					</div>
				</div>
			</div>
		</div>>
	</div>
@endsection()
