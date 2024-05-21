<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donors extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function district()
    {
        return $this->belongsTo('App\Models\Districts');
    }
    public function blood()
    {
        return $this->belongsTo('App\Models\BloodGroups','blood_group_id',"id");
    }
}