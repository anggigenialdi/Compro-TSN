<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = "employees";

    protected $fillable = [
        'full_name', 'job_position', 'profile_picture', 'quote',
    ];

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
    public function masterJobPosition()
    {
        return $this->belongsTo('App\Models\MasterJobPosition','job_position', 'id');
    }
}
