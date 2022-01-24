<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = ['Customer_name','Driver_name','Customer_address','Product_price','Product_image','Product_qty'];

    protected $hidden = ['created_at','updated_at'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
