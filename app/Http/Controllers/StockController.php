<?php

namespace App\Http\Controllers;

use App\Service\StockService;
use Illuminate\Http\Request;

class StockController extends Controller
{
    protected $stockService;

    public function __construct(StockService $stockService)
    {
        $this->stockService = $stockService;
    }

    public function store(){

    }

    public function search(){

    }

    public function update(){

    }

    public function destroy($id){

    }

    public function show(){

    }
}
