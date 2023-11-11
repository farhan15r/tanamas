<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DB;
class Transaction extends Model
{
    use HasFactory;

    // public function car()
    // {
    // 	return $this->belongsTo(Product::class);
    // }

    /**
     * Get the car that owns the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function car()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function checkRental($id)
    {
    	$now =  Carbon::now()->format('Y-m-d');
    	$valid = DB::table('transactions')
    	->where('product_id',$id)
    	->where('status_transaction','agree')
    	->where('status_product','leased')
    	->where('return_date','>=',$now)
    	->get();
    	return $valid;
    }

    public function rangeDay($start,$end)
    {
        $lease = Carbon::parse($start)->addDays(1);
        $period = CarbonPeriod::create($lease, $end);
        return count($period);
    }

    public function fineCheck($start,$end,$id)
    {
        $lease = Carbon::parse($start)->addDays(1);
        $period = CarbonPeriod::create($lease, $end);
        $cc = count($period);
        $data = DB::table('products')->where('id',$id)->first();
        $fine = $cc * $data->fine;
        return number_format($fine);
    }
}
