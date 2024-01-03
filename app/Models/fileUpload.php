<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class fileUpload extends Model
{
    use HasFactory;

    protected $primaryKey = 'file_id';
    
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'file_id',
        'file_path',
        'file_name',
        'file_size',
        'file_ext',
        'patient_id',
        'resident_id',
    ];

    public function patient(): HasOneOrMany
    {
        return $this->hasOne(patient::class, 'foreign_key', 'patient_id');
    }

    public function residents(): HasOneOrMany
    {
        return $this->hasOne(resident::class, 'foreign_key', 'resident_id');
    }


}
