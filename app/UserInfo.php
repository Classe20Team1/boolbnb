<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = 'users_info';

    protected $fillable = [
      'user_id',
      'username',
      'email',
      'password',
      'fullname',
      'sex',
      'p_iva',
      'birthdate',
      'phone_number',
      'address',
      'fiscal_code',
    ];

    public function user(){
      return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
