@extends('layouts.general')

@section('content')
    <form method="post" action="{{route('createAccount')}}">
    	{{ csrf_field()}}
    	Account Name
    	<input type="text" name="name" class="form-control" required>
    	Account Type
    	<select name="type" class="form-control">
    		<option>Savings</option>
    		<option>Checking</option>
    		<option>Credit</option>
    	</select>
    	<div class="row">
    		<div class="col-sm-6">
    			Catagories
    		</div>
    		<div class="col-sm-6">
    			Budget Per Month
    		</div>
    	</div>
    	@for($i = 0; $i < 9; $i ++)
    		<div class="row">
	    		<div class="col-sm-6">
	    			<input type="text" name="catagory[]" class="form-control">
	    		</div>
	    		<div class="col-sm-6">
	    			<input type="number" name="budget[]" class="form-control" step="0.01" value="0.00">
	    		</div>
	    	</div>
    	@endfor
    	<div class="col-sm-6">
			Transfer
		</div>
		<div class="col-sm-6">
			<input type="number" name="budget[]" class="form-control" step="0.01" value="0.00">
		</div>
    	<br/>
    	<div class="col-sm-6">
			Other
		</div>
		<div class="col-sm-6">
			<input type="number" name="budget[]" class="form-control" step="0.01" value="0.00">
		</div>
    	<br/>
    	<br/>
    	Current Balance
    	<input type="number" name="initial" class="form-control" step="0.01">
    	<br/>
    	<button type="submit" class="btn btn-info">Create Account</button>
    </form>
@endsection