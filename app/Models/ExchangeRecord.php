<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExchangeRecord extends Model
{
    protected $table = 'exchange_record';
    //
    public function worksheet()
    {
        return $this->belongsTo('App\Models\WorkSheet','sheetID');
    }
}
