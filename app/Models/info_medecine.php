<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class info_medecine extends Model
{
    use HasFactory;

    protected $primaryKey = 'infoMedecine_id';
    
    public $incrementing = false;
    protected $keyType = 'string';

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';
    protected $fillable = [
        'infoMedecine_id',
        'pInfo_id',
        'medecine_id',
    ];


    public function patient_info(): HasOneOrMany
    {
        return $this->hasOne(resident::class, 'foreign_key', 'pInfo_id');
    }

    public function medecine(): HasOneOrMany
    {
        return $this->hasOne(room::class, 'foreign_key', 'medecine_id');
    }
}
