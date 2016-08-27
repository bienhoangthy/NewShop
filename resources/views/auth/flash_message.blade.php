@if (Session::has('flash_message'))
	<div class="alert alert-{{ Session::get('flash_status') }}">
	    <div class="container-fluid">
		  <div class="alert-icon">
		    <i class="material-icons">error_outline</i>
		  </div>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true"><i class="material-icons">clear</i></span>
		  </button>
	      <b>{{ Session::get('flash_return') }}</b> {{ Session::get('flash_message') }}
	    </div>
	</div>
@endif


