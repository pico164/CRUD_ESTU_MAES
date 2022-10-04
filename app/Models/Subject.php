<?php

namespace App\Models;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['name_subject','curse','teacher_id'];

    public function query_teacher(){
        return Teacher::join("subjects","subjects.teacher_id", "=", "teachers.id")->select("teachers.name_teacher","teachers.id")->get();
    }

    public function query_teacherall(){
        return Teacher::all();
    }
}
