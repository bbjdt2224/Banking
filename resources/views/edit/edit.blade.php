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
	<form method="post" action="{{route('editTransaction')}}">
		{{ csrf_field()}}
		<input type="hidden" name="id" value="{{$transaction->id}}">
		<input type="hidden" name="account" value="{{$account->id}}">
		Date
		<input type='date' class='form-control' name='date' value="{{$transaction->date}}">
		Amount
		<input type='number' class='form-control' name='amount' step="0.01" value="{{$transaction->amount}}">
		Catagory
		<select class='form-control' name='catagory'>
			@foreach(explode(',', $account->catagories) as $catagory)
				@if($catagory == $transaction->catagory)
					<option selected>{{$catagory}}</option>
				@else
					<option>{{$catagory}}</option>
				@endif
			@endforeach
		</select>
		Store
		<input type='text' class='form-control' name='store' value="{{$transaction->store}}">
		Description
		<input type='text' class='form-control' name='description' value="{{$transaction->description}}">
		Receipt
		<input type='file' class='form-control' name='receipt' value="{{$transaction->reciept}}">
		<button type="submit" class="btn tbn-info">Edit</button>
	</form>
@endsection