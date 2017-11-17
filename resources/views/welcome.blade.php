@extends('layouts.general')

@section('content')
	<div class="jumbotron">
		<h1>My Accounts</h1>
	</div>
    <div class="list-group">
    	@foreach($accounts as $account)
	        <div class="list-group-item">
	            <a href="{{route('account', ['account' => $account->id])}}">{{$account->name}}</a>
	        </div>
       	@endforeach
       	<br/>
       	<a href="{{route('newAccount')}}" class="btn btn-default">New Account</a>
    </div>
@endsection