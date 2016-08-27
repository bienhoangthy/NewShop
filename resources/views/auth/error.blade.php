@if (count($errors) > 0)
	<div class="alert alert-danger">
	    <div class="container-fluid">
		  <div class="alert-icon">
		    <i class="material-icons">error_outline</i>
		  </div>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true"><i class="material-icons">clear</i></span>
		  </button>
	      <b>Error: </b> 
	      <ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	    </div>
	</div>
@endif