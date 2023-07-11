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
        return $this->hasOne(resident::class, 'foreign_key', 'resident_id');
    }

    public function room(): HasOneOrMany
    {
        return $this->hasOne(room::class, 'foreign_key', 'room_id');
    }
}
