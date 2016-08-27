@extends('front.master')
@section('title','Thông Tin Tài Khoản')
@section('content')
	<div class="header @if ($image_header->filter == 1)
		header-filter
	@endif" style="background-image: url('{{ asset("upload/pages/$image_header->id/".$image_header->image) }}');">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="brand">
						<h1>User Infomation</h1>
						<h3>Xin chào {{ isset($user->fullname) ? $user->fullname : $user->name }}.</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="main main-raised">
		<div class="section section-basic">
			<div class="container">
				<div class="userinfo">
					<div class="name">
	                    <h3 class="title text-center">User Name: {{ $user->name }}</h3>
						<h5 class="text-center">@if ($user->role == 1)
							Admin
						@else
							Member
						@endif</h5>
	                </div>
	                <div class="col-sm-6 col-sm-offset-3">
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
	                	@if (Session::has('flash_message'))
	                		<div class="alert alert-success">
							    <div class="container-fluid">
								  <div class="alert-icon">
									<i class="material-icons">check</i>
								  </div>
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true"><i class="material-icons">clear</i></span>
								  </button>
							      <b>Success Alert:</b> {{ Session::get('flash_message') }}
							    </div>
							</div>
	                	@endif
	                </div>
	                <div class="userinfo">
	                	<form method="POST" action="{{ route('postUserinfo') }}">
	                		<input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
	                		<div class="col-sm-4 col-sm-offset-2">
	                			<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-user-secret fa-lg"></i>
									</span>
									<input type="text" name="txtFullName" class="form-control" placeholder="Họ và Tên" value="{{ isset($customer->fullname) ? $customer->fullname : null }}">
								</div>
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-mobile fa-lg"></i>
									</span>
									<input type="text" name="txtPhone" class="form-control" placeholder="Số Điện Thoại" value="{{ isset($customer->tel) ? $customer->tel : null }}">
								</div>
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-envelope fa-lg"></i>
									</span>
									<input type="email" name="txtEmail" readonly="readonly" class="form-control" placeholder="Email" value="{{ isset($user->email) ? $user->email: null }}">
								</div>
	                		</div>
	                		<div class="col-sm-4 col-sm-offset-2">
	                			<div class="form-group">
									<label class="text-default">Tỉnh</label>
									<select name="sltProvince">
										@foreach ($provinces as $e)
											@if ($customer)
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
									<label class="control-label">Địa Chỉ</label>
									<input type="text" name="txtAddress" class="form-control" value="{{ isset($customer->address) ? $customer->address : null }}">
								</div>
								<input type="hidden" name="txtId" value="{{ $user->id }}"></input>
								<input type="hidden" name="txtUser" value="{{ $user->name }}"></input>
								<button type="submit" class="btn btn-success">Cặp Nhật Thông Tin</button>
	                		</div>
	                	</form>
	                </div>
				</div>
			</div>
		</div>
	</div>
@endsection()

