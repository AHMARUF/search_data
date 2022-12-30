<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upazila extends Model
{
    protected $fillable = [
        'name','division_id', 'district_id', 
    ];


    public function Division()
    {
      return $this->belongsTo(Division::class, 'division_id');
    }
    public function District()
    {
      return $this->belongsTo(District::class, 'district_id');
    }
}
