<?php

namespace App\Http\Controllers;
use App\Models\Detail;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Session;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $detail=Detail::paginate(5);
        $namesubject = new Detail();
        $valor = $request->get('subject_id');
        return view('detail.index')->with('details',$detail)->with('detail',$namesubject->query_subjectall())->with('modelo',$namesubject->valor_students($valor));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $namesubject = new Detail();
        return view('detail.form')->with('detail',$namesubject->query_subjectall())->with('name',$namesubject->query_studentall());
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
            'student_id' => 'required|max:15',
            'subject_id' => 'required|integer'
        ]);
        $detail = Detail::create($request->only('student_id','subject_id'));
        Session::flash('mensaje','Matricula Creada con Exito');
        return redirect()->route('detail.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function show(Detail $detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail $detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail $detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail $detail)
    {
        //
    }
}
