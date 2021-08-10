<?php

namespace App\Http\Controllers;

use App\Course;
use App\Department;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $courses = Course::select('tb_courses.*', 'd.name as department_name')
            ->join('tb_departments as d', 'tb_courses.department_id', 'd.id')
            ->paginate(5);

        return view('courses.index',compact('courses'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::select('*')
                ->get();
        return view('courses.create',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $course = Course::create($input);

        return redirect()->route('courses.index')
            ->with('success','Curso criado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::select('*')
            ->where('tb_courses.id', $id)
            ->first();

        $departments = Department::select('*')
            ->get();

        return view('courses.edit',compact('course', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'department_id' => 'required'
        ]);

        $input = $request->all();
        $input = Arr::except($input, '_token');

        Course::whereId($id)->update($input);

        $user = User::whereId($id)->first();

        return redirect()->route('courses.index')
            ->with('success','Curso editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::find($id)->delete();
        return redirect()->route('courses.index')
            ->with('success','Curso deletado com sucesso');
    }
}
