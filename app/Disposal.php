<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disposal extends Model
{
    protected $table = 'disposal';

    protected $fillable = ['product_id','qty','date'];

    protected $hidden = ['created_at','updated_at'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
