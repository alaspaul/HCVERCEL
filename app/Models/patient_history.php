<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class patient_history extends Model
{
    use HasFactory;

    protected $primaryKey = 'patientHistory_id';
    
    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'patientLog_id',
        'patientLog_id',
    ];

    public function patient_info(): HasOneOrMany
    {
        return $this->hasOne(resident::class, 'foreign_key', 'patientLog_id');
    }

}
