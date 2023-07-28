<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class patientAssignedRoom extends Model
{
    use HasFactory;

    protected $primaryKey = 'patAssRoom_id';

    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'patAssRoom_id',
        'dateAdmitted',
        'patient_id',
        'room_id',
    ];

    public function patient(): HasOneOrMany
    {
        return $this->hasOne(patient::class, 'foreign_key', 'patient_id');
    }

    public function room(): HasOneOrMany
    {
        return $this->hasOne(room::class, 'foreign_key', 'room_id');
    }
}
