<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\room;
use App\Models\resident;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
class resident_assigned_room extends Model
{
    use HasFactory;


    protected $fillable = [

        'resident_id',
        'room_id',
        'isFinished',
    ];

    const CREATED_AT = 'started_date';
    const UPDATED_AT = 'finished_date';

    public function resident(): HasOneOrMany
    {
        return $this->hasOne(resident::class, 'foreign_key', 'resident_id');
    }

    public function room(): HasOneOrMany
    {
        return $this->hasOne(room::class, 'foreign_key', 'room_id');
    }
}
