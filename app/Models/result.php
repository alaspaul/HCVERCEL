<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class result extends Model
{
    use HasFactory;

    protected $primaryKey = 'result_id';
    
    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'result_id',
        'results',
    ];
}
