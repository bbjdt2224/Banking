@extends('layouts.general')

@section('content')
	<style>
		input{
			margin-top: 10px;
			margin-bottom: 10px;
		}
		select{
			margin-top: 10px;
			margin-bottom: 10px;

		}
	</style>
	<form method="post" action="{{route('withdraw')}}">
		{{ csrf_field()}}
		<input type="hidden" name="account" value="{{$account->id}}">
		Date
		<input type='date' class='form-control' name='date'>
		Amount
		<input type='number' class='form-control' name='amount' step="0.01">
		Catagory
		<select class='form-control' name='catagory'>
			@foreach(explode(',', $account->catagories) as $catagory)
				<option>{{$catagory}}</option>
			@endforeach
		</select>
		Store
		<input type='text' class='form-control' name='store'>
		Description
		<input type='text' class='form-control' name='description'>
		Receipt
		<input type='file' class='form-control' name='receipt'>
		<br/>
		<button type="submit" class="btn tbn-info">Add</button>
	</form>
@endsection