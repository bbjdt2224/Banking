@extends('layouts.accounts')

<?php
	$total = $account->initial;
?>

@section('search')
	<form class="form-inline" id="search" method="post" action="{{route('search')}}">
		{{ csrf_field()}}
		<input type="hidden" name="account" value="{{$account->id}}">
		<input type='date' class='form-control' name='date' onchange="$('#search').submit();">
		<input type='number' class='form-control' name='amount' onchange="$('#search').submit();">
		<select class='form-control' name='catagory' onchange="$('#search').submit();">
			@foreach(explode(',', $account->catagories) as $catagory)
				<option>{{$catagory}}</option>
			@endforeach
		</select>
		<input type='text' class='form-control' name='store' onchange="$('#search').submit();">
		<input type='text' class='form-control' name='description' onchange="$('#search').submit();">
		<a href="{{route('account', ['account' => $account->id])}}" class="btn btn-info">Clear</a>
	</form>
@endsection

@section('budget')
	<?php
		$catagories = explode(',', $account->catagories);
		$budget = explode(',', $account->budget);
		$size = count($budget);
		$split = 12/$size;
		if($size > 6){
			$split = 2;
		}
		$totals = array();
		for($i = 0; $i < count($catagories); $i ++){
			$totals[$i] = 0.00;
		}
		foreach($transactions as $t){
			$totals[array_search($t->catagory, $catagories)] += $t->amount;
		}
	?>
	<div class='row'>
		@for($i = 1; $i < $size; $i ++)
			@if($i > 6)
				</div><div class="row">
			@endif
			<div class="col-sm-{{$split}}">			
				{{$catagories[$i].": ". number_format(($budget[$i] + $totals[$i]), 2, '.', '')}}
			</div>
		@endfor
	</div>
@endsection

@section('table')
	<table class="table">
		<thead>
			<th>Date</th>
			<th>Amount</th>
			<th>Catagory</th>
			<th>Store</th>
			<th>Description</th>
			<th>Receipt</th>
			<th></th>
		</thead>
		<tbody id="transactions">
			@foreach($transactions as $transaction)
				<tr>
					<td>{{ \Carbon\Carbon::parse($transaction->date)->toFormattedDateString()}}</td>
					<td>${{number_format($transaction->amount, 2)}}</td>
					<td>{{$transaction->catagory}}</td>
					<td>{{$transaction->store}}</td>
					<td>{{$transaction->description}}</td>
					<td><a href="{{$transaction->reciept}}" class="btn btn-primary">Reciept</a></td>
					<td>
						<a href="{{route("edit",["account"=> $transaction->account, "id"=>$transaction->id])}}" class="btn btn-primary">Edit</a>
						<a href="{{route("delete",["account"=> $transaction->account, "id"=>$transaction->id])}}" class="btn btn-danger">X</a>
					</td>
				</tr>
					
				<?php 
					$total += $transaction->amount;
				?>
			@endforeach
		</tbody>
	</table>
@endsection

@section('total')
${{$total}}
@endsection

@section('account')
{{$account->name}}
@endsection