<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;
use App\Models\Batche;
use App\Models\Participant;

class Attendance extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Userstamps;

    protected $primaryKey = 'att_id';

     protected $fillable = [
        'att_title',
        'bid',
        'pid',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

}
