<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	 protected $fillable = [
        'id', 'name', 'email', 'website', 'logo'
    ];
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
