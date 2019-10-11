@extends('layouts.app')

@section('html-title', 'Create Borrower')
    

@section('css')
    
@endsection

@section('page-title', 'Loan Form')

@section('main-content')

   

<div class="row">

    <div class="col-md-12">
               
        <div class="box">
            
            <div class="box-header">
                <h3 class="box-title">Add Loan for {{ $borrower->fname." ".$borrower->lname }}</h3>
            </div>
                  
            <div class="box-body">

                <form action="{{ route('loan.store', ['id' => $borrower->id]) }}" method="POST" class="form-horizontal">

                    @csrf

                    <div class="form-group">
                        <label for="lastName" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="principalDesc" id="principalDesc" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lastName" class="col-sm-2 control-label">Principal Amount</label>
                        <div class="col-sm-6">
                            <input type="number" step="0.01" class="form-control" name="principalAmount" id="principalAmount" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lastName" class="col-sm-2 control-label">Interest</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="interest" value="0" id="interest" required>
                        </div>
                    </div>
                    
                    <hr>

                    <div class="form-group">
                        <div class="col-sm-offset-1 col-sm-11">
                            <button type="reset" class="btn btn-flat bg-navy">Reset</button>
                            <button type="submit" class="btn btn-flat bg-maroon">Save</button>
                        </div>
                    </div>

                </form>

            </div>

        </div>
                   
    </div>
</div>
@endsection

@section('js')

@endsection