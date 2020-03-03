<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Admin extends Model implements Authenticatable
{
    use AuthenticableTrait;

    protected $guard = 'admin';
    protected $table = 'admin';
    //Primary key
    public $primarykey = 'id';
    //timestamps
    public $timestamps = true;

    protected $fillable = [
        'username', 'email', 'password',
    ];
}
