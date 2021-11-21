<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;
use App\Models\Attendance;

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
    protected $gender = ['male', 'female'];

    public function getFullNameAttribute()
    {
        return "{$this->f_name} {$this->l_name}";
    }
}
