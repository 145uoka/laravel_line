<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TAccessTokens extends Model
{
    //
    protected $primaryKey = 'access_token';
    //
    protected $hidden = array(Model::CREATED_AT, Model::UPDATED_AT);
}
