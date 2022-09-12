<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderBy('id', 'DESC')->paginate();
        return view('home', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $student = Student::updateOrCreate(
            ['id' => $request->input('studentId')],
            [
                'name' => $request->input('studentName'),
                'email' => $request->input('studentEmail'),
                'age' => $request->input('studentAge'),
            ]
        );

        if ($student) {
            return response()->json(['student' => $student], 200);   
        } else {
            return response()->json(['error' => 'Student record is unable to store, please try later'], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Student::destroy($request->input('sid'));
        return response('', 200);
    }

    public function showTable() {
        $student = Student::orderBy('id', 'DESC')->paginate();

        return response()->json(['student' => $student], 200);
    }
}
