<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class="container ">
		<div class="row">
			@if($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
				
			</div>
			@endif
			@if(session()->has("studentmessage"))
			<div class="alert alert-success">
				<p>{{ session()->get("studentmessage")}}</p>
				@endif
				
			</div>
		
			
			
		</div>
		
	</div>
	@section("body")
			@show

</body>
</html>