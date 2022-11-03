<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Course;

class CoursesController extends Controller { 
    
    public function __construct() {
        $this->middleware('auth')->except(['login']);
        $this->middleware('admin')->only(['delete']);
        $this->middleware('guest')->only(['login']);
    }
    
    public function index() {

        //$data = User::notdeleted()->get();
        $data = Course::notdeleted()->get();

        return view('admin.courses.index', compact('data'));
    }

    public function create() {
        if (request()->isMethod('post')) {
            $this->validate(request(), [
                'duration_srp' => 'required|string|max:255',
                'duration_eng' => 'required|string|max:255',
                'title_srp' => 'required|string|max:255',
                'title_eng' => 'required|string|max:255',
                'class' => 'required|string||in:children,adults,scratch',
                'description_srp' => 'required|string',
                'description_eng' => 'required|string',
            ]);
            $newRow = new Course();
            $newRow->duration_srp = request('duration_srp');
            $newRow->duration_eng = request('duration_eng');
            $newRow->title_srp = request('title_srp');
            $newRow->title_eng = request('title_eng');
            $newRow->class = request('class');
            $newRow->description_srp = request('description_srp');
            $newRow->description_eng = request('description_eng');

            $newRow->save();

            //session()->flash('message','Korisnik uspesno kreiran!!!');jedan od nacina
            session()->flash('message', [
                'type' => 'success',
                'message' => "Course $newRow->title_eng successfuly created!!!"
            ]); //drugi nacin gde mozemo u jednoj sesiji kreirati vise vrednosti

            return redirect(route('courses'));
        }

        return view('admin.courses.create');
    } 
     
    
    public function edit(Course $course) {
        if (request()->isMethod('post')) {
            $this->validate(request(), [
                'duration_srp' => 'required|string|max:255',
                'duration_eng' => 'required|string|max:255',
                'title_srp' => 'required|string|max:255',
                'title_eng' => 'required|string|max:255',
                'class' => 'required|string||in:children,adults,scratch',
                'description_srp' => 'required|string',
                'description_eng' => 'required|string',
            ]);
            $course->duration_srp = request('duration_srp');
            $course->duration_eng = request('duration_eng');
            $course->title_srp = request('title_srp');
            $course->title_eng = request('title_eng');
            $course->class = request('class');
            $course->description_srp = request('description_srp');
            $course->description_eng = request('description_eng');

            $course->save();

            //session()->flash('message','Korisnik uspesno kreiran!!!');jedan od nacina
            session()->flash('message', [
                'type' => 'success',
                'message' => "Course $course->title_eng successfuly edited!!!"
            ]); //drugi nacin gde mozemo u jednoj sesiji kreirati vise vrednosti

            return redirect(route('courses'));
        }

        return view('admin.courses.edit', compact('course'));
    }
    
    
    public function delete(Course $course){
        $course->deleted = 0;
        //$student->deleted_by = auth()->user()->id;
        $course->save();
        session()->flash('message', [
            'type' => 'success',
            'message' => "Course $course->title_eng successfully deleted !!!"
        ]); //drugi nacin gde mozemo u jednoj sesiji kreirati vise vrednosti
        return redirect(route('courses'));
    }

}
