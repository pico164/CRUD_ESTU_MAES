<?php

namespace App\Models;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name_student','age','phone_number','address'];

    public function query_subjectall(){
        return Subject::all();
    }
}
