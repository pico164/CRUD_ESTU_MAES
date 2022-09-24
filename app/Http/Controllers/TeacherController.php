<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Session;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = Teacher::paginate(5);
        return view('teacher.index')->with('teachers',$teacher);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.form');
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
            'name_teacher' => 'required|max:15',
            'address' => 'required|string',
            'phone_number' => 'required|integer',
            'age' => 'required|integer'
        ]);
        $teacher = Teacher::create($request->only('name_teacher','address','phone_number','age'));
        Session::flash('mensaje','Maestro Creado con Exito');
        return redirect()->route('teacher.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('teacher.form')->with('teacher',$teacher);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name_teacher' => 'required|max:15',
            'address' => 'required|string',
            'phone_number' => 'required|integer',
            'age' => 'required|integer'
        ]);

        $teacher->name_teacher = $request['name_teacher'];
        $teacher->address = $request['address'];
        $teacher->phone_number = $request['phone_number'];
        $teacher->age = $request['age'];
        $teacher->save();

        Session::flash('mensaje','Maestro Editado con Exito');
        return redirect()->route('teacher.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        Session::flash('mensaje','Registro eliminado exitosamente');
        return redirect()->route('teacher.index');
    }
}
