<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'name', 'division_id', 
    ];

    public function Division()
    {
      return $this->belongsTo(Division::class, 'division_id');
    }
}
