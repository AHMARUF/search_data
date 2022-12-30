<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'division_id', 'district_id', 'upazila_id','name', 'father_name','mother_name','gmail','number','address',
    ];

    public function Division()
    {
      return $this->belongsTo(Division::class, 'division_id');
    }
    public function District()
    {
      return $this->belongsTo(District::class, 'district_id');
    }
    public function Upazila()
    {
      return $this->belongsTo(Upazila::class, 'upazila_id');
    }
   
}
