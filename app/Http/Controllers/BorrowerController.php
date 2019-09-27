<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Borrower;
use App\Loan;
use App\Payment;

class BorrowerController extends Controller
{
    public function index()
    {

        $borrowers = Borrower::with('loans.payments')->get();

        // echo json_encode($borrowers);

        return view('borrow.index', compact('borrowers'));


    }

    public function create()
    {
        return view('borrow.create');
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'lastName' => 'required',
            'firstName' => 'required',
            'address' => 'required'
        ]);
        
        Borrower::create([
            'fname' => $request->firstName,
            'lname' => $request->lastName,
            "address" => $request->address
        ]);

        return redirect(route('borrower.index'))->with('success', 'Borrower has been added');


    }

    public function edit($id)
    {
        $borrower = Borrower::findOrFail($id);

        return view('borrow.update', compact('borrower'));
    }

    public function show($id)
    {
        $borrower = Borrower::findOrFail($id);

        $loans = Loan::with('payments')->where('borrower_id', $id)->get();

        return view('borrow.show', compact('borrower', 'loans'));
    }

    public function update(Request $request, $id)
    {
        $borrower = Borrower::findOrFail($id);

        $borrower->fname = $request->firstName;
        $borrower->lname = $request->lastName;
        $borrower->address = $request->address;
        $borrower->save();

        return redirect(route('borrower.index'))->with('success', 'The borrower information has been updated');
    }

    public function destroy($id)
    {
        $borrower = Borrower::findOrFail($id)->delete();
        $loans = Loan::where('borrower_id', $id)->get();

        foreach($loans as $loan)
        {
            $payments = Payment::where('loan_id', $loan->id)->delete();
            Loan::find($loan->id)->delete();
        }

        return redirect(route('borrower.index'))->with('success', 'The borrower information has been destroyed.');
    }
}
