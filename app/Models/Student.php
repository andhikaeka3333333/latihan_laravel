<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'grade_id', 'email', 'adress'];

    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }


}
