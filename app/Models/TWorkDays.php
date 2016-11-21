<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TWorkDays extends Model
{
    //
    protected $primaryKey = 'work_days_id';
    protected $hidden = array(Model::CREATED_AT, Model::UPDATED_AT);
}
