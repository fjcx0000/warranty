<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $primaryKey = 'channelID';
    protected $fillable = [
        'channelID',
        'channelName',
        'authCode',
        'address',
        'contact',
        'phone'
    ];
}
