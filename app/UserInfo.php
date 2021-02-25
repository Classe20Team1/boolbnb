<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = 'users_info';

    public function user(){
      return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
