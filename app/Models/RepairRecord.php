<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RepairRecord extends Model
{
    protected $table = 'repair_record';
    //
    public function worksheet()
    {
        return $this->belongsTo('App\Models\WorkSheet','sheetID');
    }
}
