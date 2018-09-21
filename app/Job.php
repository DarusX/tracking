<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Status;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'brand', 'model', 'issue', 'owner_id', 'repairer_id', 'status_id'
    ];

    protected $dates = [
        'deleted_at'
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($job){
            $job->status_id = Status::whereStatus('Esperando')->first()->id;
            $job->code = substr(md5(time()), 0, 10);
        });
    }

    public function repairer()
    {
        return $this->belongsTo(User::class, 'repairer_id')->withDefault([
            'full_name' => 'No asignado'
        ]);
    }

    public function logs()
    {
        return $this->hasMany(Log::class);
    }
}
