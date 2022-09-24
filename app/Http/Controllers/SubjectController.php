<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Session;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $subject = Subject::paginate(5);
        $teacher = Teacher::join("subjects","subjects.teacher_id", "=", "teachers.id")->select("teachers.name_teacher")->get();
        return view('subject.index')->with('subject',$subject)->with('Cteacher',$teacher);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $teacher_subject = Teacher::all();
        return view('subject.form')->with('teacher',$teacher_subject);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'name_subject' => 'required|max:15',
            'curse' => 'required|integer'
        ]);
        $subject = Subject::create($request->only('name_subject','curse','teacher_id'));
        Session::flash('mensaje','Asignatura Creada con Exito');
        return redirect()->route('subject.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {   $teacher_subject = Teacher::all();
        return view('subject.form')->with('subject',$subject)->with('teacher',$teacher_subject);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name_subject' => 'required|max:15',
            'curse' => 'required|integer'
        ]);

        $subject->name_subject = $request['name_subject'];
        $subject->curse = $request['curse'];
        $subject->teacher_id = $request['teacher_id'];
        $subject->save();

        Session::flash('mensaje','Asignatura Editada con Exito');
        return redirect()->route('subject.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        Session::flash('mensaje','Registro eliminado exitosamente');
        return redirect()->route('subject.index');
    }
}
