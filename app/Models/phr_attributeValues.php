<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class phr_attributeValues extends Model
{ 
    use HasFactory;

    protected $primaryKey = 'attributeVal_id';

    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'attributeVal_id',
        'attributeVal_values',
        'patient_id',
        'categoryAtt_id',
        'sequence',
    ];

    public function patient(): HasOneOrMany
    {
        return $this->hasOne(patient::class, 'foreign_key', 'patient_id');
    }

    public function categoryAttribute(): HasOneOrMany
    {
        return $this->hasOne(phr_categoryAttributes::class, 'foreign_key', 'categoryAtt_id');
    }

}
