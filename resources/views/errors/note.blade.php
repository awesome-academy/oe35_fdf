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

>>>>>>> 5b0610dc359bd88c2d9cb44e7b560559e35342b5
