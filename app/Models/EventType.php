<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    use HasFactory;

    protected $primaryKey = 'tid';
    protected $table = 'event_types';
    
    protected $fillable = ['t_title'];


    public function event()
    {

        return $this->hasOne(Event::class);
    }
    
}
