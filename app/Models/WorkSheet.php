<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkSheet extends Model
{
    //
    protected $table = 'work_sheet';
    protected $appends = array('channelName','logCount','postCount','supplierName');
    protected $hidden = array('channel','supplier');

    public function channel()
    {
        return $this->belongsTo('App\Models\Channel', 'channelID');
    }
    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier', 'supplierID');
    }
    public function worklog()
    {
        return $this->hasMany('App\Models\WorkLog', 'sheetID');
    }
    public function postrecord()
    {
        return $this->hasMany('App\Models\PostRecord', 'sheetID');
    }
    public function getChannelNameAttribute()
    {
        return $this->channel->channelName;
    }
    public function getSupplierNameAttribute()
    {
        if ($this->supplier != null)
            return $this->supplier->supplierName;
    }
    public function getLogCountAttribute()
    {
        return $this->worklog->count();
    }
    public function getPostCountAttribute()
    {
        return $this->postrecord->count();
    }
}
