<?php

namespace App\Http\Controllers;

use App\Course;
use App\Subject;
use App\SubjectCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subjects = Subject::select('tb_subjects.*', 'c.name as course_name')
            ->join('tb_subject_course as sc', 'tb_subjects.id', 'sc.subject_id')
            ->join('tb_courses as c', 'c.id', 'sc.course_id')
            ->paginate(5);

        return view('subjects.index',compact('subjects'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::select('*')
            ->get();
        return view('subjects.create',compact('courses'));
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
        $courses = $input['courses'];
        $input['syllabus'] = '';
        $input = Arr::except($input,array('courses'));

        $subject = Subject::create($input);
        $subject_id = $subject->id;

        foreach($courses as $course_id){
            $subject_course['subject_id'] = (int) $subject_id;
            $subject_course['course_id'] = (int) $course_id;
            $subject_courses = SubjectCourse::create($subject_course);

            $course = Course::select('*')->where('id', $course_id)->first();
            $newHourlyLoad = (int) $course->hourly_load + (int) $subject->hourly_load;
            Course::whereId($course_id)->update(array('hourly_load' => $newHourlyLoad));
        }

        return redirect()->route('subjects.index')
            ->with('success','Disciplina criada.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subjectCourse = SubjectCourse::select('tb_subject_course.course_id')
            ->where('subject_id', $id)->first();

        $subject = Subject::select('tb_subjects.hourly_load')
            ->where('tb_subjects.id', $id)->first();

        $course = Course::select('tb_courses.hourly_load')->where('id', $subjectCourse->course_id)->first();
        $newHourlyLoad = (int) $course->hourly_load - (int) $subject->hourly_load;

        Course::whereId($subjectCourse->course_id)->update(array('hourly_load' => $newHourlyLoad));

        SubjectCourse::where('subject_id', $id)
                ->where('course_id', $subjectCourse->course_id)->delete();

        $subjectCourseLeft = SubjectCourse::select(DB::raw('COUNT(*)'))
                ->where('subject_id', $id)->get();

        if(!$subjectCourseLeft) {
            Subject::find($id)->delete();
        }

        return redirect()->route('subjects.index')
            ->with('success','Disciplina ' . $subject->name . ' do curso ' . $course->name . ' deletada com sucesso');
    }
}
