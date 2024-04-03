<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\room;
use App\Models\resident;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class resident_assigned_room extends Model
{
    use HasFactory;

    protected $primaryKey = 'resAssRoom_id';

    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [

        'resAssRoom_id',
        'resident_id',
        'room_id',
        'isFinished',
    ];


    
    public function resident(): HasOneOrMany
    {
        return $this->hasOneOrMany(resident::class, 'resident_id', 'resident_id');
    }

    public function room(): HasOneOrMany
    {
        return $this->hasOneOrMany(Room::class, 'room_id', 'room_id');
    }
}
