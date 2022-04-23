<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;
    public function masterCategory()
    {
        return $this->belongsTo('App\Models\MasterCategory','category', 'id');
    }
    public function masterPosition()
    {
        return $this->belongsTo('App\Models\MasterJobPosition','position', 'id');
    }
    public function masterType()
    {
        return $this->belongsTo('App\Models\MasterType','type', 'id');
    }
}
