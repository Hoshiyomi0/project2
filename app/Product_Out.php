<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Out extends Model
{
    protected $table = 'product_out';

    protected $fillable = ['product_id','customer_id','qty','date','driver_id','status'];

    protected $hidden = ['created_at','updated_at'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
