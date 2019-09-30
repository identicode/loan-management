@extends('layouts.app')

@section('html-title', 'Borrower')
    

@section('css')
    
@endsection

@section('page-title')
Payment List
<button onclick="javascript:window.print()" class="btn btn-flat bg-purple pull-right"> <i class="fa fa-print"></i> Print</button>
@endsection

@section('main-content')


<div class="row">
    <div class="col-xs-5">
        <div class="box" id="office-whirl">

            <div class="box-header with-border">
                <h3 class="box-title">Payments</h3>
            </div>

            <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>DATE</th>
                            <th>AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($loan->payments as $payment)
                            <tr>
                                <td>{{ $payment->created_at }}</td>
                                <td>₱ {{ readable_amount($payment->amount) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>  

        </div>
    </div>
    <div class="col-xs-7">
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
                    {{-- <li class="list-group-item">
                        <b>Borrower Address</b> <a class="pull-right">{{ $loan->borrower->address }}</a>
                    </li> --}}
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
                        <b>Remaining Balance</b> 
                        <a class="pull-right">
                            @if($loan->total_amount - $loan->payments->sum('amount') != 0)
                            ₱ {{ readable_amount($loan->total_amount - $loan->payments->sum('amount')) }}
                            @else
                            PAID
                            @endif
                        </a>
                    </li>
                </ul>
            </div>  
        </div>
    </div>
</div>
@endsection

@section('js')
    
@endsection