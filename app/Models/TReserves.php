<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TReserves extends Model
{
    protected $primaryKey = 'reserve_id';
    //
    protected $hidden = array(Model::CREATED_AT, Model::UPDATED_AT);
}
