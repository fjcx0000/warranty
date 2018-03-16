<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkLog extends Model
{
    protected $table = 'work_log';
    protected $appends = array('processPhaseName','userName');
    protected $hidden = array('user');

    public function worksheet()
    {
        return $this->belongsTo('App\Models\WorkSheet','sheetID');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','userID');
    }
    public function getProcessPhaseNameAttribute()
    {
        return config('warranty.processPhaseName.'.$this->processPhase);
    }
    public function getUserNameAttribute()
    {
        if ($this->user != null)
            return $this->user->name;
    }


}
