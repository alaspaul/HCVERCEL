<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class resActionLog extends Model
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

    public function resident(): HasOneOrMany
    {
        return $this->hasOne(resident::class, 'foreign_key', 'resident_id');
    }

}
