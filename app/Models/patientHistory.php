<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class patientHistory extends Model
{
    use HasFactory;

    protected $primaryKey = 'ph_id';
    
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'ph_id',
        'ph_changes',
        'history_id',
        'phr_attributeValues_id'
    ];

    public function history(): HasOneOrMany
    {
        return $this->hasOne(history::class, 'foreign_key', 'history_id');
    }

    public function phr_attributeValues(): HasOneOrMany
    {
        return $this->hasOne(phr_attributeValues::class, 'foreign_key', 'phr_attributeValues_id');
    }


}
