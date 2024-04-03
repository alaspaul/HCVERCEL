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
        return $this->hasOneOrMany(patient::class, 'patient_id', 'patient_id');
    }

    public function residents(): HasOneOrMany
    {
        return $this->hasOneOrMany(resident::class, 'resident_id', 'resident_id');
    }


}
