<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transactions;
use App\Accounts;

class AccountsController extends Controller
{

	public function index(){
		$accounts = Accounts::all();

		return view('welcome', compact('accounts'));
	}

    public function account($account){

    	$transactions = Transactions::orderBy('date', 'desc')->where('account', '=', $account)->get();
        
    	$account = Accounts::find($account);

    	return view('account', compact('transactions', 'account'));
    }

    public function new(){
    	return view('account.newAccount');
    }

    public function create(){
    	$catagories = array_filter(request('catagory'));
    	$keys = array_keys($catagories);
    	$budget = "";
    	foreach($keys as $key){
    		$budget .= ",".request('budget')[$key];
    	}
    	$budget .= ",".request('budget')[9].",".request('budget')[10];
    	$catagories = "All,".implode(',', $catagories);
    	$catagories .= ",Transfer,Other";

    	Accounts::create([
    		'name' => request('name'),
    		'type' => request('type'),
    		'catagories' => $catagories,
    		'budget' => $budget,
    		'initial' => request('initial'),
    	]);

    	return redirect(route('home'));
    }
}
