<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
