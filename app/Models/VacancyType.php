<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacancyType extends Model
{
    use HasFactory;
    protected $table = "master_vacancy_type";

    public function masterCategory()
    {
        return $this->belongsTo('App\Models\MasterCategory','category', 'id');
    }
    public function masterPosition()
    {
        return $this->belongsTo('App\Models\MasterJobPosition','position', 'id');
    }
    public function masterVacancyType()
    {
        return $this->belongsTo('App\Models\MasterVacancyType','name', 'id');
    }

}
