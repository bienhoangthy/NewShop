@extends('front.master')
@section('title','Giỏ Hàng')
@section('content')
	<div class="header @if ($image_header->filter == 1)
		header-filter
	@endif" style="background-image: url('{{ asset("upload/pages/$image_header->id/".$image_header->image) }}');">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="brand">
						<h1>Carts.</h1>
						<h3>Kiểm tra giỏ hàng của bạn.</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="main main-raised">
		<div class="section section-basic">
			<div class="container">
				<div class="cart"  id="cart_content">
					<div class="col-md-12">
						<p><a class="text-success" href="{{ route('home') }}">Trang Chủ</a>/Giỏ Hàng</p>
						<h2>Giỏ Hàng (<span class="text-danger">{{ $count_cart }}</span>)</h2>
						<div class="table-responsive">
							<table class="table">
							    <thead>
							        <tr>
							            <th class="col-sm-1 text-center">#</th>
							            <th class="col-sm-2">HÌNH ẢNH</th>
							            <th class="col-sm-2">TÊN SẢN PHẨM</th>
							            <th class="col-sm-1 text-left">ĐƠN GIÁ</th>
							            <th class="col-sm-2 text-center">SỐ LƯỢNG</th>
							            <th class="col-sm-2 text-right">THÀNH TIỀN</th>
							            <th class="col-sm-2 text-right">XÓA</th>
							        </tr>
							    </thead>
							    <tbody>
							    	@if ($count_cart == 0)
							    		<h4 class="text-danger">Giỏ hàng trống, hãy ghé <a href="{{ route('shop') }}">Shop</a> để xem các sản phẩm mới nhất!</h4>
							    	@endif
							    	<?php $stt = 0 ?>
							    	@foreach ($carts as $item)
							    		<?php $stt++ ?>
							    		<tr id="{{ $item->rowId }}">
								            <td class="text-center" style="padding-top:  50px;">{{ $stt }}</td>
								            <td class="img-cart">
								            	<img src="{{ asset('upload/product_img/'.$item->id.'/'.$item->options['image']) }}" alt="Rounded Image" class="img-rounded img-responsive">
								            </td>
								            <td style="padding-top:  50px;">{{ $item->name }}</td>
								            <td class="text-left" style="padding-top:  50px;">{{ number_format($item->price,0,',','.') }}đ</td>
								            <td class="input-group">
								            	<input class="form-control edit_Cart" style="margin-left: 30px;" type="number" min="1" value="{{ $item->qty }}">
												<span class="input-group-addon">
													<a href="javascript:void(0)" id="editCart" idP ="{{ $item->id }}" idRow="{{ $item->rowId }}"><button type="button" rel="tooltip" title="Cập Nhật Số Lượng" class="btn btn-success btn-simple btn-xs">
								                    <i class="fa fa-edit"></i>
								                	</button></a>
												</span>
								            </td>
											<td class="text-right" style="padding-top:  50px;">{{ number_format($item->price*$item->qty,0,',','.') }}đ</td>
								            <td class="td-actions text-right" style="padding-top:  35px;">
								                <a href="{{ route('delProductCart',$item->rowId) }}" onclick="return confirm_delete('Bạn muốn xóa sản phẩm này khỏi giỏ hàng?')"><button type="button" rel="tooltip" title="Xóa" class="btn btn-danger btn-simple btn-xs">
								                    <i class="fa fa-times"></i>
								                </button></a>
								                
								            </td>
								        </tr>
							    	@endforeach
							    </tbody>
							</table>
						</div>
						<a href="{{ route('shop') }}"><button class="btn btn-primary">Tiếp Tục Mua Hàng</button></a>
						@if ($count_cart > 0)
							<a href="{{ route('delCart') }}" onclick="return confirm_delete('Bạn muốn xóa tất cả sản phẩm trong giỏ hàng?')"><button class="btn btn-primary">Xóa Giỏ Hàng</button></a>
						@endif
						<div class="pay pull-right">
							<h3>Tổng tiền: {{ $total }}đ</h3>
							<a href="{{ route('checkout') }}"><button class="btn btn-success" @if ($count_cart == 0)
								disabled="disabled" 
							@endif >Thanh Toán</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection()