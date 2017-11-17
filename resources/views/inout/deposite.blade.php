@extends('layouts.general')

@section('content')
	<style>
		input{
			margin-top: 50px;
			margin-bottom: 50px;
		}
		select{
			margin-top: 50px;
			margin-bottom: 50px;

		}
	</style>
	<form method="post" action="{{route('deposite')}}">
		{{ csrf_field()}}
		<input type="hidden" name="account" value="{{$account->id}}">
		<input type='date' class='form-control' name='date'>
		<input type='number' class='form-control' name='amount'>
		<select class='form-control' name='catagory'>
			@foreach(explode(',', $account->catagories) as $catagory)
				<option>{{$catagory}}</option>
			@endforeach
		</select>
		<input type='text' class='form-control' name='store'>
		<input type='text' class='form-control' name='description'>
		<input type='file' class='form-control' name='receipt'>
		<button type="submit" class="btn tbn-info">Add</button>
	</form>
@endsection