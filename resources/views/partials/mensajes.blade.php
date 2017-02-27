@if(Session::has('save'))
	<div class="alert alert-dismissible alert-success">
	  	<button type="button" class="close" data-dismiss="alert">&times;</button>
	  	{!!Session::get('save')!!}
	</div>
@endif

@if(Session::has('update'))
	<div class="alert alert-dismissible alert-info">
	  	<button type="button" class="close" data-dismiss="alert">&times;</button>
	  	{!!Session::get('update')!!}
	</div>
@endif

@if(Session::has('delete'))
	<div class="alert alert-dismissible alert-danger">
	  	<button type="button" class="close" data-dismiss="alert">&times;</button>
	  	{!!Session::get('delete')!!}
	</div>
@endif