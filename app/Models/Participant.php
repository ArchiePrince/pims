<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;
use App\Models\Attendance;
use App\Models\Batche;

class Participant extends Model
{
    use HasFactory;
    use Userstamps;
    use SoftDeletes;
    

    protected $table = 'participants';
    protected $primaryKey = 'pid';

      /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'f_name',
        'l_name',
        'gender',
        'p_email',
        'prfssn',
        'org',
        'distr',
        'rgn',
        'tel',
        'phone',
    ];
    protected $gender = ['Male', 'Female'];

    public function getFullNameAttribute()
    {
        return "{$this->f_name} {$this->l_name}";
    }

    //Participants can belongToMany Batches
    public function batches() 
    {
        return $this->belongsToMany(Batche::class, 'batche_participant', 'bid', 'pid');
    }

}
