<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostRecord extends Model
{
    protected $table = 'post_record';
    protected $appends = array('trackURL');
    protected $hidden = array('carrier');
    //
    public function worksheet()
    {
        return $this->belongsTo('App\Models\WorkSheet','sheetID');
    }
    public function carrier()
    {
        if ($this->carrierID)
            return $this->belongsTo('App\Models\Carrier', 'carrierID');
    }
    public function getTypeNameAttribute()
    {
        return config('warranty.postTypeName.'.$this->type);
    }
    public function getTrackURLAttribute()
    {
        if ($this->carrierID)
            return $this->carrier->trackURL;
    }
}
