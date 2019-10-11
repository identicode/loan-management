<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = ['borrower_id', 'description', 'principal_amount', 'interest', 'total_amount'];

    public function borrower()
    {
        return $this->belongsTo('App\Borrower', 'borrower_id');
    }

    public function payments()
    {
        return $this->hasMany('App\Payment', 'loan_id');
    }
}
