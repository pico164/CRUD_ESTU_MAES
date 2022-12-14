<?php

namespace App\Models;
use App\Models\Subject;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $fillable = ['student_id','subject_id'];

    public function query_subjectall(){
        return Subject::all();
    }

    public function query_studentall(){
        return Student::all();
    }

    public function valor_students($valor){
        $studiantesID = Detail::where('subject_id','=',$valor)->get();
        return Student::where('id','=',$studiantesID->get('student_id'));
    }

}
