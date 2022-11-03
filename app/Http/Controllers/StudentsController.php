<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Student;

class StudentsController extends Controller { 
    
    
    public function __construct() {
        $this->middleware('auth')->except(['login']);
        $this->middleware('admin')->only(['delete']);
        $this->middleware('guest')->only(['login']);
    }

    public function index() {

        return view('admin.students.index');
    }


    public function datatable() {

        $request = request();

        $query = Student::query();


        //Process search parameter

        $search = $request->get('search');

        if (is_array($search) && !empty($search['value'])) {

            $query->where(function($subQuery) use($search) {

                $subQuery->orWhere(
                        'students.name', 'LIKE', '%' . $search['value'] . '%'
                )->orWhere(
                        'students.surname', 'LIKE', '%' . $search['value'] . '%'
                )->orWhere(
                        'students.phone', 'LIKE', '%' . $search['value'] . '%'
                )->orWhere(
                        'students.email', 'LIKE', '%' . $search['value'] . '%'
                )->orWhere(
                        'students.course', 'LIKE', '%' . $search['value'] . '%'
                )->orWhere(
                        'students.new', 'LIKE', '%' . $search['value'] . '%'
                )->orWhere(
                        'students.date_of_birth', 'LIKE', '%' . $search['value'] . '%'
                );
            });
        }

        //Process Pagination
        $length = $request->get('length', 10);
        $start = $request->get('start', 0);

        $page = floor($start / $length) + 1;

        $students = $query->paginate($length, ['students.*'], 'page', $page);
        

        // Format JSON response
        $datatableJson = [
            'draw' => $request->get('draw', 1),
            'recordsTotal' => $students->total(),
            'recordsFiltered' => $students->total(),
            'data' => []
        ];

        foreach ($students as $student) {

            $row = [
                'name' => $student->name,
                'surname' => $student->surname,
                'phone' => $student->phone,
                'email' => $student->email,
                'course' => $student->course,
                'new' => $student->new,
                'date_of_birth' => $student->date_of_birth,
                'actions' => view('admin.students.partials.actions', ['student' => $student])->render()
            ];

            $datatableJson['data'][] = $row;
        }


        return response()->json($datatableJson);
    }

    public function create() {
        //dd(request('date_of_birth')); 
        if (request()->isMethod('post')) {
            $this->validate(request(), [
                'name' => 'required|string|max:255',
                'surname' => 'required|string|max:191',
                'phone' => 'required|string|max:191',
                'email' => 'required|string|email|max:255|unique:users',
                'date_of_birth' => 'required|date_format:Y/m/d',
                'course' => 'required|string|in:robotika,scratch,lego,python_deca,python_deca_algoritmi,arduino,web_desing_deca,sah,baze,web_dizajn_odrasli,python_odrasli,excel',
                'new' => 'required|string|in:new,old',
            ]);

            $newRow = new Student();
            $newRow->name = request('name');
            $newRow->surname = request('surname');
            $newRow->phone = request('phone');
            $newRow->email = request('email');
            $newRow->date_of_birth = request('date_of_birth');
            $newRow->active = 1;
            $newRow->course = request('course');
            $newRow->new = request('new');


            $newRow->save();

            //session()->flash('message','Korisnik uspesno kreiran!!!');jedan od nacina
            session()->flash('message', [
                'type' => 'success',
                'message' => "Student $newRow->name successfully created!!!"
            ]); //drugi nacin gde mozemo u jednoj sesiji kreirati vise vrednosti

            return redirect(route('students'));
        }
        return view('admin.students.create');
    }

    public function edit(Student $student) {
        if (auth()->user()->role != 'administrator' && auth()->user()->id != $user->id) {
            abort(401, "Unauthorized action");
        }
        if (request()->isMethod('post')) {
            $this->validate(request(), [
                'name' => 'required|string|max:255',
                'surname' => 'required|string|max:191',
                'phone' => 'required|string|max:191',
                'email' => 'required|string|email|max:255|unique:users',
                'date_of_birth' => 'required|date_format:Y-m-d',
                'course' => 'required|string|in:robotika,scratch,lego,python_deca,python_deca_algoritmi,arduino,web_desing_deca,sah,baze,web_dizajn_odrasli,python_odrasli,excel',
                'new' => 'required|string|in:new,old',
            ]);

            $student->name = request('name');
            $student->surname = request('surname');
            $student->phone = request('phone');
            $student->email = request('email');
            $student->date_of_birth = request('date_of_birth');
            $student->course = request('course');
            $student->new = request('new');

            $student->save();

            session()->flash('message', [
                'type' => 'success',
                'message' => "Student $student->name successfully edited!!!"
            ]); //drugi nacin gde mozemo u jednoj sesiji kreirati vise vrednosti
            if (auth()->user()->role == 'administrator') {
                return redirect(route('students'));
            } else {
                return redirect(route('users-welcome'));
            }
        }
        return view('admin.students.edit', compact('student'));
    }

    public function active(Student $student) {
        if ($student->active == 1) {
            $student->active = 0;
            $student->save();
        } else {
            $student->active = 1;
            $student->save();
        }
        session()->flash('message', [
            'type' => 'success',
            'message' => "Student $student->name status successfully edited!!!"
        ]); //drugi nacin gde mozemo u jednoj sesiji kreirati vise vrednosti
        return redirect(route('students'));
    }

    public function delete(Student $student) {
        $student->deleted = 0;
        //$student->deleted_by = auth()->user()->id;
        $student->save();
        session()->flash('message', [
            'type' => 'success',
            'message' => "Student $student->name successfully deleted !!!"
        ]); //drugi nacin gde mozemo u jednoj sesiji kreirati vise vrednosti
        return redirect(route('students'));
    }

}
