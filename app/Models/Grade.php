<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grade extends Model
{
    use HasFactory;

    // protected $with = ['students'];
    protected $fillable = ['name', 'department_id'];

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function relation()
    {
        $query = "SELECT grades.id, grades.name as grade_name, departments.name as department_name
                  FROM grades
                  JOIN departments ON grades.department_id = departments.id";

        $result = DB::select($query); // Eksekusi query dan simpan hasilnya

        dd($result); // Cek hasilnya
        return $result;
    }
}
