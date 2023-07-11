<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lab_result extends Model
{
    use HasFactory;

    protected $primaryKey = 'labResult_id';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'labResult_id',
        'labResult_result',
    ];

}
