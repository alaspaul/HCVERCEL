<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $primaryKey = 'history_id';
    
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'history_id'
    ];
}
