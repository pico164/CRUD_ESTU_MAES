<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::paginate(5);
        return view('student.index')->with('students',$student);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.form');
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
            'name_student' => 'required|max:15',
            'address' => 'required|string',
            'phone_number' => 'required|integer',
            'age' => 'required|integer'
        ]);
        $student = Student::create($request->only('name_student','address','phone_number','age'));
        Session::flash('mensaje','Estudiante Creado con Exito');
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view ('student.form')->with('student',$student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name_student' => 'required|max:15',
            'address' => 'required|string',
            'phone_number' => 'required|integer',
            'age' => 'required|integer'
        ]);
        $student->name_student = $request['name_student'];
        $student->address = $request['address'];
        $student->phone_number = $request['phone_number'];
        $student->age = $request['age'];
        $student->save();

        Session::flash('mensaje','Estudiante Editado con Exito');
        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        Session::flash('mensaje','Estudiante eliminado sin problemas');
        return redirect()->route('student.index');
    }
}
