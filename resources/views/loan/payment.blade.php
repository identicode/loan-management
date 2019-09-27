@extends('layouts.app')

@section('html-title', 'Borrower')
    

@section('css')
    
@endsection

@section('page-title', 'Add Payment')

@section('main-content')
<div class="row">
    <div class="col-lg-5">
        <div class="box" id="office-whirl">

            <div class="box-header with-border">
                <h3 class="box-title">Payment Form</h3>
            </div>

            <div class="box-body">
                <form action="{{ route('loan.paid', ['id' => $loan->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="borrower_id" value="{{ $loan->borrower->id }}">
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" step="0.01" max="{{ $loan->total_amount - $loan->payments->sum('amount') }}" class="form-control" id="amount" name="amount" placeholder="Enter amount" required>
                    </div>

                    <hr>

                    <div class="form-group">
                        <button type="reset" class="btn btn-flat bg-navy">Reset</button>
                        <button type="submit" class="btn btn-flat bg-maroon">Save</button>
                    </div>
                    
                </form>
            </div>  

        </div>
    </div>
    <div class="col-lg-7">
        <div class="box" id="office-whirl">
            <div class="box-header with-border">
                <h3 class="box-title">Loan Information</h3>
            </div>
            <div class="box-body">
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Loan ID</b> <a class="pull-right">{{ padding_lid($loan->id) }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Borrower Name</b> <a class="pull-right">{{ $loan->borrower->fname." ".$loan->borrower->lname }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Borrower Address</b> <a class="pull-right">{{ $loan->borrower->address }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Principal Amount</b> <a class="pull-right">₱ {{ readable_amount($loan->principal_amount) }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Interest</b> <a class="pull-right">{{ $loan->interest }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Total Amount</b> <a class="pull-right">₱ {{ readable_amount($loan->total_amount) }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Remaining Balance</b> <a class="pull-right">₱ {{ readable_amount($loan->total_amount - $loan->payments->sum('amount')) }}</a>
                    </li>
                </ul>
            </div>  
        </div>
    </div>
</div>
@endsection

@section('js')
    
@endsection