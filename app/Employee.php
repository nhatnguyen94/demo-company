<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	protected $fillable = [
        'id', 'first_name','email', 'last_name', 'company_id', 'phone'
    ];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
