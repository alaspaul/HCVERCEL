<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class physicalExam_categories extends Model
{
    use HasFactory;

    protected $primaryKey = 'physicalExam_id';
    
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'PE_name',
        'PE_description',
        
    ];

}
