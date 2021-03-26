<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //The eloquent function to displays data
        $student = $student =DB::table('student')->paginate(3); //Mengambil semua isi tabel
        //$spost = Student::orderBy('Nim','desc')->paginate(6);
        return view('student.index',compact('student'));
        //with('i', (request()->input ('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'Nim' => 'required',
            'Name' => 'required',
            'Class' => 'required',
            'Major' => 'required',
            'Address' => 'required',
            'dateOfBirth' => 'required',
        ]);
        //eloquent function to add data
        Student::create($request->all());

        //if the data is added successfully, will return to the main page
        return redirect()->route('student.index') -> with('success', 'Student Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Nim)
    {
        //display detailed data by finding/by Student Nim
        $Student = Student::find($Nim);
        return view('student.detail',compact('Student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Nim)
    {
    //Display detail data by finding based on Student Nim for editing
    $Student = DB::table('student')->where('nim', $Nim)->first();;
    return view('student.edit', compact('Student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Nim)
    {
        //validate the data
        $request->validate([
            'Nim' => 'required',
            'Name' => 'required',
            'Class' => 'required',
            'Major' => 'required',
            'Address' => 'required',
            'dateOfBirth' => 'required',
        ]);
        //Eloquent function to update the data
        Student::find($Nim)->update($request->all());
        //If the data successfully updated, will return to main page
        return redicted()->route('student.index')->with('success','Student Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Nim)
    {
        //Eloquent function to delete the data
        Student::find($Nim)->delete();
        return redict()->route('student.index')-> with('success','Student Successfully Deleted');
    }
};
