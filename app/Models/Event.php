<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Event extends Model
{
    use Userstamps;
    use HasFactory;
    use SoftDeletes;

    public $table = 'events';

    protected $primaryKey = 'eid';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'e_title',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    // protected function serializeDate(DateTimeInterface $date)
    // {

    //     return $date->format('Y-m-d H:i:s');

    // }

    public function eventType()
    {
            return $this->hasOne(EventType::class, 'eid', 'tid');
    }

    //Event has many batches
    public function batches()
    {
        return $this->hasMany(Batche::class, 'eid', 'bid');
    }

}
