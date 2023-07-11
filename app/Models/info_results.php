<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class info_results extends Model
{
    use HasFactory;

    protected $fillable = [
        'pInfo_id',
        'results_id',
    ];

    public function patient_info(): HasOneOrMany
    {
        return $this->hasOne(resident::class, 'foreign_key', 'pInfo_id');
    }

    public function result(): HasOneOrMany
    {
        return $this->hasOne(room::class, 'foreign_key', 'result_id');
    }
}
