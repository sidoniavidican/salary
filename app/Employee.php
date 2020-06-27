<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['first_name', 'last_name'];

    /**
     * Get the employee's full name.
     *
     * @param  string  $value
     * @return void
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' '. $this->last_name;
    }

    public function sales()
    {
        return $this->hasMany('App\Sale');
    }

    public function getMonthSalesAttribute()
    {
        $month = date('Y-m-1');
        return $this->sales->where('created_at', '>=', $month)->sum('amount');
    }

    public function getTotalSalesAttribute()
    {
        return $this->sales->sum('amount');
    }
}
