<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Laravel\Sanctum\HasApiTokens;

class doctors_notes extends Model
{
    use HasFactory;
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';
    protected $fillable = [
        'notes',
        'pInfo_id',
        'resident_id',
    ];

    public function patient_info(): HasOneOrMany
    {
        return $this->hasOne(resident::class, 'foreign_key', 'pInfo_id');
    }

    public function resident(): HasOneOrMany
    {
        return $this->hasOne(room::class, 'foreign_key', 'resident_id');
    }
}
