<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Teacher;
use App\Model\Course;
use App\Model\Schedule;
use Illuminate\Support\Facades\DB;

class SchedulesController extends Controller
{  
    public function __construct() {
        $this->middleware('auth')->except(['login']);
        $this->middleware('admin')->only(['delete']);
        $this->middleware('guest')->only(['login']);
    }
    
    public function index(){
        
        $data= DB::table('schedules')
            ->join('teachers', 'schedules.teachers_id', '=', 'teachers.id')
            ->join('courses', 'schedules.courses_id', '=', 'courses.id')
            ->select('schedules.*', 'teachers.name', 'teachers.surname','courses.title_eng','courses.class')
            ->get();
        //dd($data);
        return view('admin.schedules.index', compact('data'));
    }
    
    
    public function create(){
        $teachersPossibleValues = [0];
        $teachers = Teacher::notdeleted()->get();
        //ovde izvlacimo moguce vrednosti za id iz niza $mainPages i smestamo u novi niz $mainPagesPossibleValues
        if (count($teachers) > 0) {
            foreach ($teachers as $value) {
                array_push($teachersPossibleValues, $value->id);
            }
        } 
        //zatim pretvaramo niz u string da bi mogli lakse da koristimo rulove u validaciji
        $teachersPossibleValuesString = implode(',', $teachersPossibleValues);
        
        $coursesPossibleValues = [0];
        $courses = Course::notdeleted()->get();
        //ovde izvlacimo moguce vrednosti za id iz niza $mainPages i smestamo u novi niz $mainPagesPossibleValues
        if (count($courses) > 0) {
            foreach ($courses as $value) {
                array_push($coursesPossibleValues, $value->id);
            }
        } 
        $coursesPossibleValuesString = implode(',', $coursesPossibleValues);
        

        if (request()->isMethod('post')) {
            $this->validate(request(), [
                'courses_id' => "required|integer|in:$coursesPossibleValuesString",
                'teachers_id' => "required|integer|in:$teachersPossibleValuesString",
                'start_date' => 'required|date_format:Y/m/d',
                'end_date' => 'required|date_format:Y/m/d',
            ]);
            $newRow = new Schedule();
            $newRow->courses_id = request('courses_id');
            $newRow->teachers_id = request('teachers_id');
            $newRow->start_date = request('start_date');
            $newRow->end_date = request('end_date');

            $newRow->save();

            //session()->flash('message','Korisnik uspesno kreiran!!!');jedan od nacina
            session()->flash('message', [
                'type' => 'success',
                'message' => "C&T successfully created!!!"
            ]); //drugi nacin gde mozemo u jednoj sesiji kreirati vise vrednosti

            return redirect(route('schedules'));
        }

        return view('admin.schedules.create', compact('teachers','courses'));
    } 
    
    public function edit(Schedule $schedule){
        $teachersPossibleValues = [0];
        $teachers = Teacher::notdeleted()->get();
        //ovde izvlacimo moguce vrednosti za id iz niza $mainPages i smestamo u novi niz $mainPagesPossibleValues
        if (count($teachers) > 0) {
            foreach ($teachers as $value) {
                array_push($teachersPossibleValues, $value->id);
            }
        } 
        //zatim pretvaramo niz u string da bi mogli lakse da koristimo rulove u validaciji
        $teachersPossibleValuesString = implode(',', $teachersPossibleValues);
        
        $coursesPossibleValues = [0];
        $courses = Course::notdeleted()->get();
        //ovde izvlacimo moguce vrednosti za id iz niza $mainPages i smestamo u novi niz $mainPagesPossibleValues
        if (count($courses) > 0) {
            foreach ($courses as $value) {
                array_push($coursesPossibleValues, $value->id);
            }
        } 
        $coursesPossibleValuesString = implode(',', $coursesPossibleValues);
        

        if (request()->isMethod('post')) {
            $this->validate(request(), [
                'courses_id' => "required|integer|in:$coursesPossibleValuesString",
                'teachers_id' => "required|integer|in:$teachersPossibleValuesString",
                'start_date' => 'required|date_format:Y-m-d',
                'end_date' => 'required|date_format:Y-m-d',
            ]);
            
            $schedule->courses_id = request('courses_id');
            $schedule->teachers_id = request('teachers_id');
            $schedule->start_date = request('start_date');
            $schedule->end_date = request('end_date');

            $schedule->save();

            //session()->flash('message','Korisnik uspesno kreiran!!!');jedan od nacina
            session()->flash('message', [
                'type' => 'success',
                'message' => "C&T successfully edited!!!"
            ]); //drugi nacin gde mozemo u jednoj sesiji kreirati vise vrednosti

            return redirect(route('schedules'));
        }

        return view('admin.schedules.edit', compact('teachers','courses','schedule'));
    } 
    
    public function delete($id){
        
        $schedule= Schedule::findOrFail($id);
        $schedule->delete();
        
        return redirect(route('schedules'));
    }
}
