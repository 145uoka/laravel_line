<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TAccessTokens extends Model
{
    //
    protected $primaryKey = 'access_token';
    //
    protected $hidden = array(Model::CREATED_AT, Model::UPDATED_AT);
    
//     protected $fillable = [
//                     'access_token',
//                     'expiration_date',
//                     'effective_period',
//                     'shop_id',
//                     'user_id',
//                     ];
                    
}
