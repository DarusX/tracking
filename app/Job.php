<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Status;

class Job extends Model
{
    protected $fillable = [
        'brand', 'model', 'issue', 'owner_id', 'repairer_id', 'status_id'
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($job){
            $job->status_id = Status::whereStatus('Esperando')->first()->id;
        });
    }

    public function repairer()
    {
        return $this->belongsTo(User::class, 'repairer_id')->withDefault([
            'full_name' => 'No asignado'
        ]);
    }
}
