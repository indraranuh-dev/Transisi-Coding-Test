<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    
    protected $fillable = ['company_id' ,'name', 'email', 'phone'];

    public function company()
    {
        return $this->hasOne('App\Company');
    }
}
