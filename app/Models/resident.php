<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\department;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class resident extends Model
{ 
    use HasFactory;

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

    public function department(): HasOneOrMany
    {
        return $this->hasOne(department::class, 'foreign_key', 'department_id');
    }

   
}
