<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefundRecord extends Model
{
    protected $table = 'refund_record';
    //
    public function worksheet()
    {
        return $this->belongsTo('App\Models\WorkSheet','sheetID');
    }
}
