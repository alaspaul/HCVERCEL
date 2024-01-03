<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phr_formCategories extends Model
{
    use HasFactory;

    protected $primaryKey = 'formCat_id';

    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'formCat_id',
        'formCat_name',
        'formCat_description',

    ];

}
