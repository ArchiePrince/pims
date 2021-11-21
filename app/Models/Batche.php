<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;
use App\Models\Attendance;

class Batche extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Userstamps;

    protected $table = 'batches';
    protected $primaryKey = 'bid';

    protected $fillable = [
        'b_title',
        'eid',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // public function getFullNameAttribute()
    // {
    //     return "{$this->b_title} {$event->e_title}";
    // }

    //A batch belongs to an event
    public function event()
    {
        return $this->belongsTo(Event::class, 'eid');
    }

    public function participants()
    {
        return $this->belongsToMany(Participant::class, 'attendances', 'bid', 'pid')->withTimestamps();
    }

}
