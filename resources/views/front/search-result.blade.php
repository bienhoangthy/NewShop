@extends('front.master')
@section('title','Tìm Kiếm')
@section('content')
	<div class="header @if ($image_header->filter == 1)
		header-filter
	@endif" style="background-image: url('{{ asset("upload/pages/$image_header->id/".$image_header->image) }}');">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="brand">
						<h1>Search Result.</h1>
						<h3>Kết quả tìm kiếm trả về!</h3>
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
	                        <h2><span class="tim-note"></span>Tìm kiếm</h2>
	                    </div>
	                    @if (count($products) == 0)
	                    	<h5>Không tìm thấy sản phẩm cho từ khóa <i class="text-danger">{{ $search }}.</i></h5>
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
					</div>
				</div>
			</div>
		</div>>
	</div>
@endsection()
