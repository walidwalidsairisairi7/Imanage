<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show()
    {
        return view('payment');
    }



    public function create(){
        //return "Payment Create";
    }



    public function store(Request $request){

    }



    public function show(string $id){

    }
}
