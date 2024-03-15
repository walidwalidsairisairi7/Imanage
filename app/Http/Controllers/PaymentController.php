<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Models\Payment;
use App\Models\Student;


class PaymentController extends Controller
{
    public function index()
    {
        $payment=Payment::orderBy('created_at','ASC')->get();
        return view('payment', compact('payment'));
    }
    public function create()
    {
        $studentIds = Student::select('id', 'nom')->get();
        return view('createPayment', ['studentIds' => $studentIds]);
        
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'amount' => 'required',
            'date' => 'required',
            'student_id' => 'required|exists:students,id',
        ]);

        // Create a new payment
        Payment::create($validatedData);

        // Redirect back or wherever appropriate
        return redirect()->route('payments.index')->with('success', 'Payment added successfully.');
    }

}
