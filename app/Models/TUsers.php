<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TUsers extends Model
{
    //
    protected $primaryKey = 'user_id';
    protected $hidden = array(Model::CREATED_AT, Model::UPDATED_AT);
}
