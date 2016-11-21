<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TStaffs extends Model
{
    //
    protected $primaryKey = 'staff_id';
    //
    protected $hidden = array(Model::CREATED_AT, Model::UPDATED_AT);
}
