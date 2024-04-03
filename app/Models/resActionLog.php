<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        return $this->hasOneOrMany(resident::class, 'user_id', 'resident_id');
    }

}
