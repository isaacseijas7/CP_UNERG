@if (! $errors->isEmpty())
	<div class="alert alert-dismissible alert-danger">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	  	<strong>Oops!</strong> Please fix the following errors!
		<ul>
		@foreach($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
		</ul>
	</div>
@endif