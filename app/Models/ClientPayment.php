<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientPayment extends Model
{
    protected $table = 'client_payment';
    //
    public function worksheet()
    {
        return $this->belongsTo('App\Models\WorkSheet','sheetID');
    }
}
