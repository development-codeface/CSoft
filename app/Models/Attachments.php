<?php

namespace App\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Attachments extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

    protected $table = 'attachments';

    protected $primaryKey = 'attachment__id';

    protected $fillable = [
        'attachment_id',
        'attachment_url',
        'pages_page_id',
       'type',
        'created_at',
        'updated_at',
    ];

}
