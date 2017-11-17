<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transactions;
use App\Accounts;

class TransactionsController extends Controller
{
    public function addDeposite($account){
       $account = Accounts::find($account);
    	return view('inout.deposite', compact('account'));
    }

    public function addWithdraw($account){
;        $account = Accounts::find($account);
    	return view('inout.withdraw', compact('account'));
    }

    public function deposite(){

    	Transactions::create([
    		'date' => request('date'),
    		'amount' => request('amount'),
    		'catagory' => request('catagory'),
    		'store' => request('store'),
    		'description' => request('description'),
            'reciept' => request('receipt'),
    		'account' => request('account'),
    	]);

    	return redirect(route('account', ['account' => request('account')]));
    }

    public function withdraw(){

    	Transactions::create([
    		'date' => request('date'),
    		'amount' => -request('amount'),
    		'catagory' => request('catagory'),
    		'store' => request('store'),
    		'description' => request('description'),
            'reciept' => request('receipt'),
    		'account' => request('account'),
    	]);

    	return redirect(route('account', ['account' => request('account')]));
    }

    public function edit($account, $id){
        $transaction = Transactions::find($id);
        $account = Accounts::find($account);
        return view('edit.edit', compact('account', 'transaction'));
    }

    public function editTransaction(){
        Transactions::find(request('id'))->update([
            'date' => request('date'),
            'amount' => request('amount'),
            'catagory' => request('catagory'),
            'store' => request('store'),
            'description' => request('description'),
            'reciept' => request('receipt'),
        ]);
        return redirect(route('account', ['account' => request('account')]));
    }

    public function search(){
        if(request('date') != null){
            $transactions = Transactions::orderBy('date', 'desc')->where('account', '=', request('account'))->where('date', '=', request('date'))->get();
        
            $account = Accounts::find(request("account"));

            return view('account', compact('transactions', 'account'));
        }
        if(request('amount') != null){
            $transactions = Transactions::orderBy('date', 'desc')->where('account', '=', request('account'))->whereBetween('amount', [floor(request('amount')), ceil(request('amount'))])->get();

            $account = Accounts::find(request("account"));

            return view('account', compact('transactions', 'account'));
        }

        if(request('store') != null){
            $transactions = Transactions::orderBy('date', 'desc')->where('account', '=', request('account'))->where('store', 'LIKE', "%".request('store')."%")->get();
        
            $account = Accounts::find(request("account"));

            return view('account', compact('transactions', 'account'));
        }

        if(request('description') != null){
            $transactions = Transactions::orderBy('date', 'desc')->where('account', '=', request('account'))->where('description', 'LIKE', '%'.request('description').'%')->get();
        
            $account = Accounts::find(request("account"));

            return view('account', compact('transactions', 'account'));
        }

        $transactions = Transactions::orderBy('date', 'desc')->where('account', '=', request('account'))->where('catagory', '=', request('catagory'))->get();
    
        $account = Accounts::find(request("account"));

        return view('account', compact('transactions', 'account'));
    }

}
