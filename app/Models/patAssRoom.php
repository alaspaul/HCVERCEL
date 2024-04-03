<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class patAssRoom extends Model
{
    use HasFactory;

    protected $primaryKey = 'par_id';

    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'par_id',
        'patient_id',
        'room_id',
        'isDischarged'
    ];

    public function patient(): HasOneOrMany
    {
        return $this->hasOneOrMany(patient::class, 'patient_id', 'patient_id');
    }

    public function room(): HasOneOrMany
    {
        return $this->hasOneOrMany(room::class, 'room_id', 'room_id');
    }

}
