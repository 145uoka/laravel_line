<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TCourses extends Model
{
    //
    protected $primaryKey = 'course_id';
    //
    protected $hidden = array(Model::CREATED_AT, Model::UPDATED_AT);
}
