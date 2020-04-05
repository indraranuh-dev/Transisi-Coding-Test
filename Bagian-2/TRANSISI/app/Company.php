<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $casts = ['id' => 'string'];

    protected $fillable = ['id' ,'name', 'email', 'phone', 'logo'];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
}
