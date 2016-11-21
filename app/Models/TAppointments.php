<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TAppointments extends Model
{
    //
    protected $primaryKey = 'appointment_id';
    //
    protected $hidden = array(Model::CREATED_AT, Model::UPDATED_AT);
}
