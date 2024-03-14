<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment');
    }
    public function create()
    {
    }
    public function store(Request $request)
    {

    }
    public function show(string $id)
    {
        
    }
}
