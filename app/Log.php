<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'job_id', 'status_id'
    ];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
