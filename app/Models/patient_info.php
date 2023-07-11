<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Laravel\Sanctum\HasApiTokens;

class patient_info extends Model
{
    use HasFactory;

    
    protected $primaryKey = 'pInfo_id';
    
    public $incrementing = false;
    protected $keyType = 'string';

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';
    protected $fillable = [
        'pInfo_id',
        'room_id',
        'patient_id',
    ];

    public function room(): HasOneOrMany
    {
        return $this->hasOne(resident::class, 'foreign_key', 'room_id');
    }

    public function patient(): HasOneOrMany
    {
        return $this->hasOne(room::class, 'foreign_key', 'patient_id');
    }
}
