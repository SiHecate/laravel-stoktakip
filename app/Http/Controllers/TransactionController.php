<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\TransactionService;

class TransactionController extends Controller
{

    protected $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    // list all transactions
    public function list()
    {
        return $this->transactionService->list();
    }

    // show spesific transaction
    public function show($id)
    {
        return $this->transactionService->show($id);
    }

    public function destroy($id)
    {
        return $this->transactionService->destroy($id);
    }

    public function update(Request $request,$id) {
        return $this->transactionService->update($request,$id);
    }

    // get transaction by id
    public function getTransaction($id)
    {
        return $this->transactionService->getTransaction($id);
    }

    // get transaction by user
    public function getTransactionByUser(Request $request)
    {
        $user_id = $request->user()->id;
        return $this->transactionService->getTransactionByUser($user_id);
    }
}

/*
    Parametreler:
        $user_id
        $stock_id
        $type
        $amount
*/
