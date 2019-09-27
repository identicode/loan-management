@extends('layouts.app')

@section('html-title', 'Update Borrower')
    

@section('css')
    
@endsection

@section('page-title', 'Update Borrower')

@section('main-content')


<div class="row">

    <div class="col-md-12">
               
        <div class="box">

            <div class="box-header">
            
                <h3 class="box-title">Update Information of {{ $borrower->fname." ".$borrower->lname }}</h3>
            </div>
                  
            <div class="box-body">

                <form action="{{ route('borrower.patch', ['id' => $borrower->id]) }}" method="POST" class="form-horizontal">

                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="lastName" class="col-sm-1 control-label">Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="lastName" value="{{ $borrower->lname }}" id="lastName" placeholder="Last Name" required>
                        </div>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="firstName" value="{{ $borrower->fname }}" id="firstName" placeholder="First Name" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address" class="col-sm-1 control-label">Address</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" name="address" value="{{ $borrower->address }}" id="address" placeholder="Address" required>
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