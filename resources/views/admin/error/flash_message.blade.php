<div class="col-lg-7">
	@if (Session::has('flash_message'))
		<div class="alert alert-{{ Session::get('flash_status') }} alert-dismissable">
	    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	    	{{ Session::get('flash_message') }}
		</div>
	@endif
</div>

