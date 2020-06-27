<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['employee_id', 'amount'];
    
    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
}
