<?php

namespace App\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Pages extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

    protected $table = 'pages';

    protected $primaryKey = 'page_id';

    protected $fillable = [
        'page_id',
        'title',
        'sub_title',
        'content',
        'menus_menu_id',
        'submenu_id',
        'type',
        'created_at',
        'updated_at',
    ];

}
