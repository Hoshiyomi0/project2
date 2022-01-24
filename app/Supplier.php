<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model {
	protected $fillable = ['name1', 'address1', 'email', 'phone1'];

	protected $hidden = ['created_at', 'updated_at'];
}
