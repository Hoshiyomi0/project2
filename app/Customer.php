<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name1', 'address1', 'email', 'phone1'];

    protected $hidden = ['created_at', 'updated_at'];
}
