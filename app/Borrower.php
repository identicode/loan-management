<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    protected $fillable = ['fname', 'lname', 'address'];

    public function loans()
    {
        return $this->hasMany('App\Loan', 'borrower_id');
    }
}
