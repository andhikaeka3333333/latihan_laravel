<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'desc'];

    // public function department(): BelongsTo
    // {
    //     return $this->belongsTo(Student::class);
    // }
}
