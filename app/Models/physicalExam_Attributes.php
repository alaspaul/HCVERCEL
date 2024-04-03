<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class physicalExam_Attributes extends Model
{
    use HasFactory;


    protected $primaryKey = 'PEA_id';
    
    protected $table = 'physical_exam_attributes';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'PEA_name',
        'PEA_dataType',
        'physicalExam_id',
    ];

    public function physicalExam_categories(): HasOneOrMany
    {
        return $this->hasOneOrMany(physicalExam_categories::class, 'physicalExam_id', 'physicalExam_id');
    }

}
