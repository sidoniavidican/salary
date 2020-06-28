<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
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

    /**
     * Get the employee's all sales.
     *
     * @param  string  $value
     * @return void
     */
    public function sales()
    {
        return $this->hasMany('App\Sale');
    }

    /**
     * Get the employee's current month amount sales.
     *
     * @param  string  $value
     * @return void
     */
    public function getMonthSalesAttribute()
    {
        $month = date('Y-m-1');
        return $this->sales->where('created_at', '>=', $month)->sum('amount');
    }

    /**
     * Get the employee's total amount sales.
     *
     * @param  string  $value
     * @return void
     */
    public function getTotalSalesAttribute()
    {
        return $this->sales->sum('amount');
    }

    /**
     * Get the employee's current bonus.
     *
     * @param  string  $value
     * @return void
     */
    public function getBonusAttribute()
    {
        $begin = new Carbon("first day of last month 00:00:00");
        $end = new Carbon("last day of last month 00:00:00");
        $last_mount_sales = $this->sales->whereBetween('created_at', [$begin, $end])->sum('amount');
        $bonus_percentage = 10;
        return  $last_mount_sales / $bonus_percentage;
    }
}
