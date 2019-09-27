<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['loan_id', 'amount'];

    public function loan()
    {
        return $this->belongsTo('App\Loan', 'loan_id');
    }

}
