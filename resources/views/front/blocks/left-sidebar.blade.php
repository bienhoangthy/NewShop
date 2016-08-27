<div class="left-sidebar">
	<div class="col-sm-3">
		<div class="title">
			<h4>DANH MỤC SẢN PHẨM</h4>
		</div>
		<div class="panel-group category-products" id="accordian">
			@foreach ($cates as $key => $item)
				<?php $child = DB::table('categories')->where('parent_id',$item['id'])->count();?>
				<div class="panel panel-default">
					@if ($item['parent_id'] == 0)
						<div class="panel-heading">
							<h4 class="panel-title">
							@if ($child > 0)
								<a data-toggle="collapse" data-parent="#accordian" href="#{{ $item['id'] }}">
									<span class="badge pull-right"><i class="fa fa-plus"></i></span>
									{{ $item['name'] }}
								</a>
							@elseif($child == 0)
								<a href="{{ route('intro') }}">{{ $item['name'] }}</a>
							@endif
							</h4>
						</div>
					@endif
					<?php unset($cates[$key]); ?>
					@if ($child > 0)
						<div id="{{ $item['id'] }}" class="panel-collapse collapse">
							<div class="panel-body">
								<ul>
									@foreach ($cates as $e)
										@if ($e['parent_id'] == $item['id'])
											<li><a href="{{ route('cate',[$e['id'],$e['alias']]) }}">{{ $e['name'] }}</a></li>
										@endif
									@endforeach
								</ul>
							</div>
						</div>
					@endif
				</div>
			@endforeach
		</div>
	
		<div class="support">
			<span class="label label-primary">Hỗ Trợ Trực Tuyến</span>
			<div class="input-group">
				<span class="input-group-addon">
					<i class="fa fa-phone fa-2x"></i>
				</span>
				<input type="text" readonly="readonly" class="form-control" value="Hotline: {{ $contact->tel }}">
			</div>
		</div>

		<div class="adv">
			<div class="hovereffect">
		        <img class="img-responsive img-rounded" src="{{ asset("upload/pages/$sale->id/".$sale->image) }}" alt="">
		        <div class="overlay">
		            <h2>Sale Off</h2>
		            <a class="info" href="{{ route('sale') }}">See Now!</a>
		        </div>
		    </div>
		</div>
	</div>
</div>