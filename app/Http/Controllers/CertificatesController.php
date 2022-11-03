<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Student;
use App\Model\Course;
use App\Model\Certificate;
use Illuminate\Support\Facades\DB;

class CertificatesController extends Controller {

    public function __construct() {
        $this->middleware('auth')->except(['login']);
        $this->middleware('admin')->only(['delete']);
        $this->middleware('guest')->only(['login']);
    }

    public function index() {

        return view('admin.certificates.index');
    }

    public function datatables() {

        $request = request();
        
        // JOIN related tables
        $query = Certificate::join('students', 'certificates.students_id', '=', 'students.id')
                ->join('courses', 'certificates.courses_id', '=', 'courses.id')
                ->select('certificates.*', 'students.name', 'students.surname', 'courses.title_eng');

        //Process search parameter

        $search = $request->get('search');

        if (is_array($search) && !empty($search['value'])) {

            $query->where(function($subQuery) use($search) {

                $subQuery->orWhere(
                        'students.name', 'LIKE', '%' . $search['value'] . '%'
                )->orWhere(
                        'students.surname', 'LIKE', '%' . $search['value'] . '%'
                )->orWhere(
                        'courses.title_eng', 'LIKE', '%' . $search['value'] . '%'
                )->orWhere(
                        'certificates.certificate_number', 'LIKE', '%' . $search['value'] . '%'
                );
            });
        }

        //Process Pagination
        $length = $request->get('length', 10);
        $start = $request->get('start', 0);

        $page = floor($start / $length) + 1;

        $certificates = $query->paginate($length, ['certificates.*'], 'page', $page);


        // Format JSON response
        $datatableJson = [
            'draw' => $request->get('draw', 1),
            'recordsTotal' => $certificates->total(),
            'recordsFiltered' => $certificates->total(),
            'data' => []
        ];

        foreach ($certificates as $certificate) {

            $row = [
                'name' => $certificate->name,
                'surname' => $certificate->surname,
                'title_eng' => $certificate->title_eng,
                'certificate_number' => $certificate->certificate_number,
                'cum_laude' => ($certificate->cum_laude == 1)?'<i class="fa fa-check-circle" aria-hidden="true" style="color:green"></i>':'<i class="fa fa-minus-circle" aria-hidden="true"style="color:red"></i>',
                'actions' => view('admin.certificates.partials.actions', ['certificate' => $certificate])->render()
            ];

            $datatableJson['data'][] = $row;
        }


        return response()->json($datatableJson);
    }

    public function create() {
        $studentsPossibleValues = [0];
        $students = Student::notdeleted()->onlynew()->get();
        //ovde izvlacimo moguce vrednosti za id iz niza $mainPages i smestamo u novi niz $mainPagesPossibleValues
        if (count($students) > 0) {
            foreach ($students as $value) {
                array_push($studentsPossibleValues, $value->id);
            }
        }
        //zatim pretvaramo niz u string da bi mogli lakse da koristimo rulove u validaciji
        $studentsPossibleValuesString = implode(',', $studentsPossibleValues);

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
                'students_id' => "required|integer|in:$studentsPossibleValuesString",
                'courses_id' => "required|integer|in:$coursesPossibleValuesString",
                'certificate_number' => 'required|string|unique:certificates|min:9',
                'cum_laude' => 'required|in:0,1',
            ]);
            $newRow = new Certificate();
            $newRow->students_id = request('students_id');
            $newRow->courses_id = request('courses_id');
            $newRow->certificate_number = request('certificate_number');
            $newRow->cum_laude = request('cum_laude');
            ;

            $newRow->save();

            //session()->flash('message','Korisnik uspesno kreiran!!!');jedan od nacina
            session()->flash('message', [
                'type' => 'success',
                'message' => "Certificate successfully created!!!"
            ]); //drugi nacin gde mozemo u jednoj sesiji kreirati vise vrednosti

            return redirect(route('certificates'));
        }

        return view('admin.certificates.create', compact('students', 'courses'));
    }

    public function edit(Certificate $certificate) {
        $studentsPossibleValues = [0];
        $students = Student::notdeleted()->onlynew()->get();
        //dd($students);
        //ovde izvlacimo moguce vrednosti za id iz niza $mainPages i smestamo u novi niz $mainPagesPossibleValues
        if (count($students) > 0) {
            foreach ($students as $value) {
                array_push($studentsPossibleValues, $value->id);
            }
        }
        //zatim pretvaramo niz u string da bi mogli lakse da koristimo rulove u validaciji
        $studentsPossibleValuesString = implode(',', $studentsPossibleValues);

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
                'students_id' => "required|integer|in:$studentsPossibleValuesString",
                'courses_id' => "required|integer|in:$coursesPossibleValuesString",
                'cum_laude' => 'required|in:0,1',
            ]);

            $certificate->students_id = request('students_id');
            $certificate->courses_id = request('courses_id');
            $certificate->cum_laude = request('cum_laude');

            $certificate->save();

            //session()->flash('message','Korisnik uspesno kreiran!!!');jedan od nacina
            session()->flash('message', [
                'type' => 'success',
                'message' => "Certificate successfully edited!!!"
            ]); //drugi nacin gde mozemo u jednoj sesiji kreirati vise vrednosti

            return redirect(route('certificates'));
        }

        return view('admin.certificates.edit', compact('students', 'courses', 'certificate'));
    }

    public function delete($id) {
        $certificate = Certificate::findOrFail($id);
        $certificate->delete();

        return redirect(route('certificates'));
    }

}
