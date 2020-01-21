<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IPAdress extends Model
{
    protected $table = '_i_p';

    protected $fillable = [
        'login',
        'ip_address',
        'valid_time'
    ];
}
