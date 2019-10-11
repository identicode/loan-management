<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrower;
use App\Loan;
use App\Payment;

class LoanController extends Controller
{

    public function show($id)
    {
        $loan = Loan::with('payments', 'borrower')->where('id', $id)->get()->first();

        return view('loan.show', compact('loan'));
    }

    public function create($id)
    {
        $borrower = Borrower::findOrFail($id);

        return view('loan.create', compact('borrower'));


    }

    public function store(Request $request, $id)
    {
        $validate = $request->validate([
            'principalAmount' => 'required',
            'interest' => 'required'
        ]);

        if(preg_match('/%/', $request->interest)){

            $interest = (int)preg_replace('/[^0-9]/', '', $request->interest);

            $interest_amount = ($interest / 100) * $request->principalAmount;

            $total_amount = (int)$interest_amount + (int)$request->principalAmount;

            $interest = strval($interest)."%";


        }else{

            $total_amount = (int)$request->interest + (int)$request->principalAmount;
            $interest = $request->interest;


        }

        Loan::create([
            'borrower_id' => $id,
            'description' => $request->principalDesc,
            'principal_amount' => $request->principalAmount,
            'interest' => $interest,
            'total_amount' => $total_amount
        ]);

        return redirect(route('borrower.show', ['id' => $id]))->with('success', 'Loan has been applied');


    }

    public function payment(Request $request, $id)
    {
        $loan = Loan::with('borrower', 'payments')->where('id', $id)->get()->first();
        // dd($loan);
        return view('loan.payment')->with('loan', $loan);
    }

    public function paid(Request $request, $id)
    {
        Payment::create([
            'loan_id' => $id,
            'amount' => $request->amount
        ]);

        return redirect(route('borrower.show', ['id' => $request->borrower_id]))->with('success', 'The payment has been added in the loan with loan id: '.padding_lid($id));
    }

    public function destroy($id)
    {
        $loan = Loan::find($id);
        $borrower = $loan->borrower_id;
        $loan->delete();
        $payments = Payment::where('loan_id', $id)->delete();

        return redirect(route('borrower.show', ['id' => $borrower]))->with('success', 'Loan has been deleted.');

    }
}
