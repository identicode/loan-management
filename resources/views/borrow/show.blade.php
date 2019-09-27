@extends('layouts.app')

@section('html-title', 'Borrower')


@section('css')

@endsection

@section('page-title')
{{ $borrower->fname }} {{ $borrower->lname }} Loans
@endsection

@section('main-content')

@if(session('success'))

<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Success!</h4>
    {{ session('success') }}
</div>

@endif

    <div class="row">
        <div class="col-lg-12">
            <div class="box" id="office-whirl">
                <div class="box-header with-border">
                    <h3 class="box-title">Loan List</h3>
                    <a href="{{ route('loan.create', ['id' => $borrower->id]) }}" class="btn bg-olive btn-xs btn-flat pull-right"><i class="fa fa-plus"></i> Add New Loan</a>
                </div>
                <div class="box-body">
                    <table id="dataTables" class="table table-stripped table-hover table-bordered">
                        <thead>
                            <th>Date</th>
                            <th>Principal Amount</th>
                            <th>Interest</th>
                            <th>Total Amount</th>
                            <th>Payments</th>
                            <th>Balance</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($loans as $loan)
                            @php

                                $payments = $loan->payments;
                                $total = $payments->sum('amount');
                                $balance = $loan->total_amount - $payments->sum('amount');


                            @endphp
                                <tr @if($balance == 0) class="bg-olive" @endif>
                                    <td>{{ $loan->created_at }}</td>
                                    <td>₱ {{ readable_amount($loan->principal_amount) }}</td>
                                    <td>{{ $loan->interest }}</td>
                                    <td>₱ {{ readable_amount($loan->total_amount) }}</td>
                                    <td>
                                        @if($total != 0)
                                            ₱ {{ readable_amount($total) }}
                                        @else
                                            ₱ 0.00
                                        @endif
                                        ({{ $payments->count() }})
                                    </td>
                                    <td>
                                        @if($balance != 0)
                                        ₱ {{ readable_amount($balance) }}
                                        @else
                                            PAID
                                        @endif
                                    </td>
                                    <td align="center">
                                            <a href="{{ route('loan.show', ['id' => $loan->id]) }}" title="View Payment" class="btn btn-flat bg-maroon btn-xs"><i class="fa fa-eye"></i></a>

                                        @if($balance != 0)
                                            <a href="{{ route('loan.payment', ['id' => $loan->id]) }}" title="Add Payment" class="btn btn-flat bg-olive btn-xs"><i class="fa fa-money"></i></a>
                                        @endif

                                        <a href="#" onclick="deleteLoan('{{ $loan->id }}')" title="Delete this Loan" class="btn btn-flat bg-navy btn-xs"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
<script>
$(document).ready(function () {
    $('#dataTables').DataTable();
})
</script>
<script>
    function deleteLoan(id){
        if(confirm('Delete this loan?')){
            window.location = `/loan/${id}/delete`
        }
    }
</script>
@endsection
