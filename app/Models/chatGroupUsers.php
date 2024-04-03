<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class chatGroupUsers extends Model
{
    use HasFactory;

    protected $primaryKey = 'chatGroupUsers_id';
    
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'chatGroupUsers_id',
        'resident_id',
        'chatGroup_id'
    ];

    public function chatgroup(): HasOneOrMany
    {
        return $this->hasOneOrMany(chatGroup::class, 'chatGroup_id', 'chatGroup_id');
    }

    public function resident(): HasOneOrMany
    {
        return $this->hasOneOrMany(resident::class, 'resident_id', 'resident_id');
    }
}
