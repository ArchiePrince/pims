<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Batche extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Userstamps;

    protected $table = 'batches';
    protected $primaryKey = 'bid';

    protected $fillable = [
        'b_title',
        'strt_time',
        'end_time',
        'eid',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    //A batch belongs to an event
    public function events()
    {
        return $this->belongsTo(Event::class, 'eid');
    }

    //A batch belongsToMany Participants
    public function participants() 
    {
        return $this->belongsToMany(Participant::class, 'batche_participant', 'pid', 'bid');
    }

}
