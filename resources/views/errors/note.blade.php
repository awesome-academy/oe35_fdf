@if(Session()->has('error'))
<<<<<<< HEAD
	<p class="alert alert-danger">{{Session::get('error')}}</p>
@endif


@foreach($errors->all() as $error)
	<p class="alert alert-danger">{{$error}}</p>
@endforeach
=======

	<p class="alert alert-danger">{{Session::get('error')}}</p>

@endif

@foreach($errors->all() as $error)

	<p class="alert alert-danger">{{$error}}</p>

@endforeach

>>>>>>> 7a79e16... Manager Categories
