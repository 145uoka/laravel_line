<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TShops extends Model
{
    
    protected $primaryKey = 'shop_id';
    //
    protected $hidden = array(Model::CREATED_AT, Model::UPDATED_AT);
}
