<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterJobPosition extends Model
{
    use HasFactory;
    protected $table = "master_job_position";

    public function masterType(){
        return $this->belongsTo('App\Models\MasterType','id_type', 'id');        
    }

}
