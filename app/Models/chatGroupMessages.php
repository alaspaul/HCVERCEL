<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chatGroupMessages extends Model
{
    use HasFactory;

    protected $primaryKey = 'chatGroupMessages_id';
    
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'chatGroupMessages_id',
        'message',
        'resident_id',
        'chatGroup_id'
    ];
}
