<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class info_medicine extends Model
{
    use HasFactory;

    protected $primaryKey = 'infomedicine_id';
    
    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'infomedicine_id',
        'pInfo_id',
        'medicine_id',
    ];


    public function patient_info(): HasOneOrMany
    {
        return $this->hasOne(resident::class, 'foreign_key', 'pInfo_id');
    }

    public function medicine(): HasOneOrMany
    {
        return $this->hasOne(room::class, 'foreign_key', 'medicine_id');
    }
}
