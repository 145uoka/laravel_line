<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MLineChannels extends Model
{
    //
    protected $primaryKey = 'channel_id';
    //
    protected $hidden = array(Model::CREATED_AT, Model::UPDATED_AT);
}
