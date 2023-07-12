<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\department;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; 

class resident extends Authenticatable
{   use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'resident_id';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'resident_id',
        'resident_userName',
        'resident_fName',
        'resident_lName',
        'resident_mName',
        'resident_password',
        'department_id',
    ];

    protected $hidden = [
        'resident_password',
        'remember_token',
    ];

    public function department(): HasOneOrMany
    {
        return $this->hasOne(department::class, 'foreign_key', 'department_id');
    }

   
}
