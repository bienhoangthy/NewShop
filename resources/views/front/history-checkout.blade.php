@extends('front.master')
@section('title','Lịch sử giao dịch')
@section('content')
	<div class="header @if ($image_header->filter == 1)
		header-filter
	@endif" style="background-image: url('{{ asset("upload/pages/$image_header->id/".$image_header->image) }}');">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="brand">
						<h1>History.</h1>
						<h3>Lịch sử mua hàng của bạn.</h3>
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
						<p><a class="text-success" href="{{ route('home') }}">Trang Chủ</a>/Lịch sử giao dịch</p>
						<h2>Lịch Sử của {{ Auth::user()->fullname }}</h2>
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<div class="profile-tabs">
				                    <div class="nav-align-center">
										<ul class="nav nav-pills" role="tablist">
											<li class="active">
												<a href="#studio" role="tab" data-toggle="tab">
													<i class="material-icons">history</i>
													Lịch Sử
												</a>
											</li>
											<li>
					                            <a href="#work" role="tab" data-toggle="tab">
													<i class="material-icons">chrome_reader_mode</i>
													Chi Tiết
					                            </a>
					                        </li>
					                    </ul>

					                    <div class="tab-content gallery">
											<div class="tab-pane active" id="studio">
					                            <div class="row">
													<div class="table-responsive">
														<table class="table">
														    <thead>
														        <tr>
														            <th class=" text-center">#</th>
														            <th class=" text-center">Ngày</th>
														            <th class=" text-center">Tổng Tiền</th>
														        </tr>
														    </thead>
														    <tbody>
														    	@if (count($transactions) == 0)
																	<p class="text-info">Bạn chưa mua được sản phẩm nào tại Shop!</p>
																@else
																	<?php $stt = 0 ?>
															    	@foreach ($transactions as $item)
															    		<?php $stt++ ?>
															    		<tr>
																    		<td>{{ $stt }}</td>
																    		<td>{{ $item['created_at'] }}</td>
																    		<td>{{ number_format($item['amount'],0,',','.') }}đ</td>
																    	</tr>
															    	@endforeach
																@endif
														    </tbody>
														</table>
													</div>
					                            </div>
					                        </div>
					                        <div class="tab-pane text-center" id="work">
												<div class="row">
													<div class="table-responsive">
														<table class="table">
														    <thead>
														        <tr>
														            <th class="text-center">NGÀY</th>
														            <th class="text-center">HÌNH ẢNH</th>
														            <th class="text-center">TÊN SẢN PHẨM</th>
														            <th class="text-center">SỐ LƯỢNG</th>
														            <th class="text-center">THÀNH TIỀN</th>
														        </tr>
														    </thead>
														    <tbody>
														    	@if (count($transactions) == 0)
																	<p class="text-info">Bạn chưa mua được sản phẩm nào tại Shop!</p>
																@else
															    	@foreach ($transactions as $i)
															    		<?php $order_details = DB::table('order_details')->where('transaction_id',$i['id'])->get(); ?>
																    	@if (!empty($order_details))
																	    	@foreach ($order_details as $e)
																	    		<tr>
																		            <td class="text-center" style="padding-top:  50px;">{{ $i['created_at'] }}</td>
																	            	<?php $product = DB::table('products')->where('id',$e->product_id)->first(); ?>
																	            	@if (isset($product))
																	            		<td>
																	            			<img style="height: auto; width: 100px;" src="{{ asset('upload/product_img/'.$product->id.'/'.$product->image) }}" alt="Rounded Image" class="img-rounded img-responsive">
																	            		</td>
																	            		<td style="padding-top:  50px;">{{ $product->name }}</td>
																	            	@endif
																		            <td class="text-center" style="padding-top:  50px;">{{ $e->qty }}</td>
																					<td class="text-center" style="padding-top:  50px;">{{ number_format($e->amount,0,',','.') }}đ</td>
																		        </tr>
																	    	@endforeach
																    	@endif
															    	@endforeach
															    @endif
														    </tbody>
														</table>
													</div>
												</div>
					                        </div>

					                    </div>
									</div>
								</div>
								<!-- End Profile Tabs -->
							</div>
		                </div>

						<a href="{{ route('shop') }}"><button class="btn btn-primary">Tiếp Tục Mua Hàng</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection()