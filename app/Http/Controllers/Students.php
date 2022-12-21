<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class Students extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return response()->json($students);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // code to create a new student
         $student = new Student;
         $student->name = $request->input('name');
         $student->gender = $request->input('gender');
         $student->state = $request->input('state');
         $student->lga = $request->input('lga');
         $student->date_of_birth = $request->input('date_of_birth');
         $student->img_src = $request->input('img_src');
         $student->class = $request->input('class');
         $student->sponsor = $request->input('sponsor');
         $student->date_enrolled = $request->input('date_enrolled');
         $profile = $request->file('img_src');
         $filename = time() . '.' . $profile->getClientOriginalExtension();
         $path = $profile->storeAs('public/images', $filename);
         $student->img_src = $path;
         $student->save();

         return response()->json($student);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         // code to retrieve a student by ID
         $student = Student::find($id);
         return response()->json($student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //update speficic resource
        $student = Student::find($id);
         $student->name = $request->input('name');
         $student->gender = $request->input('gender');
         $student->state = $request->input('state');
         $student->lga = $request->input('lga');
         $student->date_of_birth = $request->input('date_of_birth');
         $student->img_src = $request->input('img_src');
         $student->class = $request->input('class');
         $student->sponsor = $request->input('sponsor');
         $student->date_enrolled = $request->input('date_enrolled');
         $student->save();
         return response()->json($student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete Specific route
        $student = Student::find($id);
        $student->delete();
        return response()->json(['success' => true]);
    }

    //Search for students by name

    public function search ($name){
        return Student::where('name', 'like', '%' . $name . '%')->get();
    }
}
