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

    protected $dates = [
        'start',
        'end',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'start',
        'end',
        'location',
        'allDay',
        'color',
        'textColor',
        'description',
        'eid',
        'created_by',
        'updated_by',
        'deleted_by',
    ];


    //A batch belongs to an event
    public function events()
    {
        return $this->belongsTo(Event::class, 'bid', 'eid');
    }

    //A batch belongsToMany Participants
    public function participants()
    {
        return $this->belongsToMany(Participant::class, 'batche_participant', 'pid', 'bid');
    }

}
