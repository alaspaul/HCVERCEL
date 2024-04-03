<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\floor;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
class room extends Model
{
    
    use HasFactory;

    protected $primaryKey = 'room_id';

    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'room_id',
        'floor_id'.
        'room_name',
        'room_type',
        'room_price',
        'room_building',
    ];


    
    public function floor(): HasOne
    {
        return $this->hasOne(floor::class, 'floor_id', 'floor_id');
    }




}

