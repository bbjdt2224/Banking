<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	    <!-- CSRF Token -->
	    <meta name="csrf-token" content="{{ csrf_token() }}">

	    <title>My Banking</title>

	    <!-- Styles -->
	    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	</head>
	<body>
		<div class="container">
			<div class="jumbotron">
				<h1>
					{{$account->name}}
				<h2>
					@yield('total')
				</h2>
				<div class="btn-group btn-group-justified">
					<a href="{{route('depositeAccount', ['account' => $account->id])}}" class='btn btn-success'>Add Deposite</a>
					<a href="#" class="btn"></a>
					<a href="{{route('withdrawAccount', ['account' => $account->id])}}" class="btn btn-danger">Add Withdraw</a>
				</div>
				<br/>
				@yield('search')
				<br/>
				@yield('budget')
			</div>
			@yield('table')
		</div>
	</body>
</html>


