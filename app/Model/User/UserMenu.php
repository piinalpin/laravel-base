<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class UserMenu extends Model
{
    protected $table = 'APP_USER_MENU';

    protected $fillable = ['user_id', 'menu'];

    protected $hidden = ['deleted_at', 'user_id'];
    
}
