<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class ResActionLog extends Model
{
    use HasFactory;

    use HasFactory;
    protected $primaryKey = 'RA_id';
    
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'RA_id',
        'action',
        'role',
        'user_id',
    ];

}
