<div class="search">
	<form action="{{ route('search') }}" method="GET">
		{{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"></input> --}}
		<div class="col-sm-3 col-sm-offset-8">
			<div class="form-group label-floating">
				<label class="control-label">Tìm Kiếm...</label>
				<input type="text" name="txtSearch" class="form-control">
			</div>
		</div>
		<div class="col-sm-1">
			<button type="submit" class="form-group btn btn-primary btn-round">
				<i class="material-icons">search</i>
			</button>
		</div>
	</form>
</div>