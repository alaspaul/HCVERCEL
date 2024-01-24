<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; 

class resident extends Model implements Authenticatable
{   use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'resident_id';
    protected $guard = 'custom';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'resident_id',
        'resident_userName',
        'resident_fName',
        'resident_lName',
        'resident_mName',
        'resident_password',
        'resident_gender',
        'role',
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

    public function getAuthIdentifierName()
    {
        return 'resident_userName';
    }

    public function getAuthPassword()
    {
        return $this->resident_password;
    }

    public function getAuthIdentifier()
    {
        return 'resident_id';
    }

    public function getRememberToken()
    {
        return 'remember_token';
    }


    public function setRememberToken($value)
    {
        return 'remember_token';
    }


    public function getRememberTokenName()
    {

    }


   
}
