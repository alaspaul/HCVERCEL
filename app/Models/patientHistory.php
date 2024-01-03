<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
