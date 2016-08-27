@extends('front.master')
@section('title','Thanh Toán')
@section('content')
	<div class="header @if ($image_header->filter == 1)
		header-filter
	@endif" style="background-image: url('{{ asset("upload/pages/$image_header->id/".$image_header->image) }}');">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="brand">
						<h1>Check-out.</h1>
						<h3>Nhập, kiểm tra thông tin và xác nhận thanh toán.</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="main main-raised">
		<div class="section section-basic">
			<div class="container">
				<div class="checkout">
					<div class="col-md-12">
						<p><a class="text-success" href="{{ route('home') }}">Trang Chủ</a>/Thanh Toán</p>
						<h2>Thanh Toán</h2>
						<div class="cart-content">
							<div class="col-md-6">
								<div class="table-responsive">
									<table class="table">
									    <thead>
									        <tr>
									            <th class="col-sm-4"><h4>Đơn Hàng (<span class="text-danger">{{ $count_cart }}</span>)</h4></th>
									            <th class="col-sm-3"></th>
									            <th class="col-sm-2"></th>
									            <th class="col-sm-3"></th>
									        </tr>
									    </thead>
									    <tbody>
									    	@if ($count_cart == 0)
									    		<h4 class="text-danger">Giỏ hàng trống, hãy ghé <a href="{{ route('shop') }}">Shop</a> để xem các sản phẩm mới nhất!</h4>
									    	@endif
									    	@foreach ($carts as $item)
									    		<tr>
										            <td>
										            	<img style="width: 50%; height: auto;" src="{{ asset('upload/product_img/'.$item->id.'/'.$item->options['image']) }}" alt="Rounded Image" class="img-rounded img-responsive">
										            </td>
										            <td>{{ $item->name }}</td>
										            <td>{{ $item->qty }}</td>
										            <td>{{ number_format($item->price*$item->qty,0,',','.') }}đ</td>
										        </tr>
									    	@endforeach
									        <tr>
									        	<td><h6 class="text-right">Tạm tính <i class="fa fa-hand-o-right"></i> </h6></td>
									        	<td></td>
									        	<td></td>
									        	<td><h6 class="text-primary text-right">{{ $total }}đ</h6></td>
									        </tr>
									        <tr>
									        	<td><h6 class="text-right">Phí vận chuyển <i class="fa fa-hand-o-right"></i> </h6></td>
									        	<td></td>
									        	<td></td>
									        	<td><h6 class="text-primary text-right">Tính Sau Hoặc Free Nếu Gần</h6></td>
									        </tr>
									        <tr>
									        	<td><h4 class="text-right">Tổng cộng <i class="fa fa-hand-o-right"></i> </h4></td>
									        	<td></td>
									        	<td></td>
									        	<td><h4 class="text-danger text-right">{{ $total }}đ</h4></td>
									        </tr>
									    </tbody>
									</table>
									<a href="{{ route('cart') }}"><button class="btn btn-primary">Quay Về Giỏ Hàng</button></a>
								</div>
							</div>
						</div>
						<div class="info-checkout">
							<div class="col-md-5 col-md-offset-1">
								<h3>Thông tin mua hàng</h3>
								@if (Auth::check())
									<p>Click vào <a href="#">Chỉnh sửa thông tin</a> để chúng tôi lưu thông tin của khách hàng giúp cho việc thanh toán nhanh hơn!</p>
								@else
									<p><a href="{{ url('auth/login') }}">Đăng Nhập</a> / <a href="{{ url('auth/register') }}">Đăng Ký Tài Khoản</a></p>
								<p class="text-danger">*Nếu bạn đăng nhập thì đơn hàng vừa tạo sẽ được lưu vào tài khoản của bạn</p>
								@endif
								@if (count($errors) > 0)
			                		@foreach ($errors->all() as $error)
			                			<div class="alert alert-danger">
										    <div class="container-fluid">
											  <div class="alert-icon">
											    <i class="material-icons">error_outline</i>
											  </div>
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true"><i class="material-icons">clear</i></span>
											  </button>
										      <b>Error Alert:</b> {{ $error }}
										    </div>
										</div>
			                		@endforeach
			                	@endif
								<form method="POST" action="{{ route('postCheckout') }}">
									<input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
									<div class="form-group label-floating">
										<label class="control-label">Họ Tên <span style="color: red;">*</span></label>
										<input type="text" class="form-control" name="txtFullName" value="{{ isset($customer->fullname) ? $customer->fullname : null }}">
									</div>
									<div class="form-group label-floating">
										<label class="control-label">Số Điện Thoại <span style="color: red;">*</span></label>
										<input type="text" class="form-control" name="txtPhone" value="{{ isset($customer->tel) ? $customer->tel : null }}">
									</div>
									<div class="form-group">
										<label class="text-default">Tỉnh <span style="color: red;">*</span></label>
										<select name="sltProvince">
											@foreach ($provinces as $e)
												@if (isset($customer))
													<option value="{{ $e->name }}" @if ($e->name == $customer->province)
														selected = 'selected'
													@endif >{{ $e->name }}</option>
												@else
													<option value="{{ $e->name }}" >{{ $e->name }}</option>
												@endif
												
											@endforeach
										</select>
									</div>
									<div class="form-group label-floating">
										<label class="control-label">Địa Chỉ <span style="color: red;">*</span></label>
										<input type="text" class="form-control" name="txtAddress" value="{{ isset($customer->address) ? $customer->address : null }}">
									</div>
									<div class="form-group label-floating">
										<label class="control-label">Email</label>
										<input type="email" class="form-control" name="txtEmail" value="{{ isset(Auth::user()->email) ? Auth::user()->email: null }}">
									</div>
									<div class="form-group">
										<textarea class="form-control" name="txtMessage" placeholder="Ghi chú: VD(Size, Màu sắc...)" rows="3"></textarea>
									</div>
									<div class="form-group pull-right">
										<button type="submit" @if ($count_cart == 0)
											disabled="disabled" 
										@endif class="btn btn-success">ĐẶT HÀNG</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection()
