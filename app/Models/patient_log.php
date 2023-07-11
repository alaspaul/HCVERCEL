<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class patient_log extends Model
{
    use HasFactory;

    
    protected $primaryKey = 'patientLog_id';
    
    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'patientLog_id',
        'pInfo_id',
        'patient_id',
    ];

    public function patient_info(): HasOneOrMany
    {
        return $this->hasOne(resident::class, 'foreign_key', 'pInfo_id');
    }

    public function resident(): HasOneOrMany
    {
        return $this->hasOne(room::class, 'foreign_key', 'patient_id');
    }
}
