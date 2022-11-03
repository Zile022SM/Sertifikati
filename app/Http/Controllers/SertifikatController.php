<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Teacher;
use App\Model\Course;
use App\Model\Certificate;
use App\Model\Schedule;

class SertifikatController extends Controller {

    public function index() {
        if (request()->isMethod('post')) {
            $broj = request('certificate_number');
            //dd($broj);

            $this->validate(request(), [
                'certificate_number' => 'required|string|max:9|min:9|exists:certificates,certificate_number',
                    ], [
                'certificate_number.exists' => 'Nije pronadjen ni jedan sertifikat pod ovim brojem',
                'certificate_number.max' => 'Broj ne sme biti veci od 9 cifara',
                'certificate_number.min' => 'Broj ne sme biti manji od 9 cifara',
                'certificate_number.required' => 'Polje ne sme biti prazno',
            ]);

            $data = Certificate::where('certificates.certificate_number', '=', $broj)
                    ->join('students', 'certificates.students_id', '=', 'students.id')
                    ->join('courses', 'certificates.courses_id', '=', 'courses.id')
                    ->select('certificates.*', 'students.name', 'students.surname', 'courses.title_eng', 'courses.class')
                    ->get();
            //dd($data);


            if ($data->first()->class == 'scratch') {

                $data = Certificate::where('certificates.certificate_number', '=', $broj)
                        ->join('students', 'certificates.students_id', '=', 'students.id')
                        ->join('courses', 'certificates.courses_id', '=', 'courses.id')
                        ->select('certificates.*', 'students.name', 'students.surname', 'courses.title_srp', 'courses.class','courses.description_srp')
                        ->get();
                //dd($data);


                $profesori = Schedule::where('schedules.courses_id', '=', $data->first()->courses_id)
                        ->join('teachers', 'schedules.teachers_id', '=', 'teachers.id')
                        ->join('courses', 'schedules.courses_id', '=', 'courses.id')
                        ->select('teachers.*', 'schedules.end_date', 'schedules.courses_id')
                        ->get();
                //dd($profesori);

                $kursevi = Course::where('class', '=', 'scratch')
                        ->select('courses.*')
                        ->orderBy('id', 'asc')
                        ->get();
                //dd($kursevi);
                $kurseviName = $kursevi->pluck('title_eng')->toArray();
                //dd($kurseviName);

                $zvezdice = Certificate::where('certificates.students_id', '=', $data->first()->students_id)
                        ->join('students', 'certificates.students_id', '=', 'students.id')
                        ->join('courses', 'certificates.courses_id', '=', 'courses.id')
                        ->select('certificates.*', 'students.name', 'students.surname', 'courses.title_eng', 'courses.class', 'courses.description_eng', 'courses.description_srp')
                        ->where('class', '=', 'scratch')
                        ->get();
                //dd($zvezdice);

                $zvezdiceName = $zvezdice->pluck('title_eng')->toArray();
                //dd($zvezdiceName);

                return view('frontend.sertifikat.scratch', [
                    'data' => $data,
                    'jezik' => 'srpski',
                    'profesori' => $profesori,
                    'kursevi' => $kursevi,
                    'zvezdice' => $zvezdice,
                    'zvezdiceName' => $zvezdiceName,
                    'kurseviName' => $kurseviName,
                ]);
                
            } elseif ($data->first()->class == 'adults') {

                $data = Certificate::where('certificates.certificate_number', '=', $broj)
                        ->join('students', 'certificates.students_id', '=', 'students.id')
                        ->join('courses', 'certificates.courses_id', '=', 'courses.id')
                        ->select('certificates.*', 'students.name', 'students.surname', 'courses.title_srp', 'courses.class', 'courses.description_eng', 'courses.description_srp', 'courses.*')
                        ->where('class', '=', 'adults')
                        ->get();
                //dd($data);

                $profesori = Schedule::where('schedules.courses_id', '=', $data->first()->courses_id)
                        ->join('teachers', 'schedules.teachers_id', '=', 'teachers.id')
                        ->join('courses', 'schedules.courses_id', '=', 'courses.id')
                        ->select('teachers.*', 'schedules.end_date', 'schedules.courses_id')
                        ->get();
                //dd($profesori);

                $kursevi = Course::where('class', '=', 'adults')
                        ->select('courses.*')
                        ->orderBy('id', 'asc')
                        ->get();
                //dd($kursevi);

                return view('frontend.sertifikat.adults', [
                    'data' => $data,
                    'jezik' => 'srpski',
                    'profesori' => $profesori,
                    'kursevi' => $kursevi,
                ]);
                
            }elseif($data->first()->class == 'children'){
                
                $data = Certificate::where('certificates.certificate_number', '=', $broj)
                        ->join('students', 'certificates.students_id', '=', 'students.id')
                        ->join('courses', 'certificates.courses_id', '=', 'courses.id')
                        ->select('certificates.*', 'students.name', 'students.surname', 'courses.title_srp', 'courses.class', 'courses.description_eng', 'courses.description_srp', 'courses.*')
                        ->where('class', '=', 'children')
                        ->get();
                //dd($data);
                
                $profesori = Schedule::where('schedules.courses_id', '=', $data->first()->courses_id)
                        ->join('teachers', 'schedules.teachers_id', '=', 'teachers.id')
                        ->join('courses', 'schedules.courses_id', '=', 'courses.id')
                        ->select('teachers.*', 'schedules.end_date', 'schedules.courses_id')
                        ->get();
                //dd($profesori);

                $kursevi = Course::where('class', '=', 'children')
                        ->select('courses.*')
                        ->orderBy('id', 'asc')
                        ->get();
                //dd($kursevi);

                return view('frontend.sertifikat.children', [
                    'data' => $data,
                    'jezik' => 'srpski',
                    'profesori' => $profesori,
                    'kursevi' => $kursevi,
                ]);
                
            }
        }
        return view('frontend.sertifikat.search');
    }

    public function lista($studentId, $jezik = 'srpski', $broj) {

        $data = Certificate::where('students.id', '=', $studentId)
                ->join('students', 'certificates.students_id', '=', 'students.id')
                ->join('courses', 'certificates.courses_id', '=', 'courses.id')
                ->select('certificates.*', 'students.name', 'students.surname', 'courses.title_eng', 'courses.title_srp', 'courses.class', 'courses.description_eng', 'courses.description_srp')
                ->where('class', '=', 'adults')
                ->get();
        //dd($data);

        $profesori = Schedule::where('schedules.courses_id', '=', $data->first()->courses_id)
                ->join('teachers', 'schedules.teachers_id', '=', 'teachers.id')
                ->join('courses', 'schedules.courses_id', '=', 'courses.id')
                ->select('teachers.*', 'schedules.end_date', 'schedules.courses_id')
                ->get();
        //dd($profesori);

        $kursevi = Course::where('class', '=', 'adults')
                ->select('courses.*')
                ->orderBy('id', 'asc')
                ->get();
        //dd($kursevi);

        return view('frontend.sertifikat.lista', [
            'data' => $data,
            'jezik' => $jezik,
            'profesori' => $profesori,
            'kursevi' => $kursevi,
            'broj' => $broj,
        ]);
    }

    public function profesor(Teacher $profesor, $jezik = 'srpski') {
        //dd($jezik);
        return view('frontend.sertifikat.profesor', compact('profesor', 'jezik'));
    }

    public function adults($jezik = 'srpski', $broj) {
        //dd($broj); 
        $data = Certificate::where('certificates.certificate_number', '=', $broj)
                ->join('students', 'certificates.students_id', '=', 'students.id')
                ->join('courses', 'certificates.courses_id', '=', 'courses.id')
                ->select('certificates.*', 'students.name', 'students.surname', 'courses.id', 'courses.title_eng', 'courses.title_srp', 'courses.class', 'courses.description_eng', 'courses.description_srp')
                ->where('class', '=', 'adults')
                ->get();
        //dd($data);

        $profesori = Schedule::where('schedules.courses_id', '=', $data->first()->courses_id)
                ->join('teachers', 'schedules.teachers_id', '=', 'teachers.id')
                ->join('courses', 'schedules.courses_id', '=', 'courses.id')
                ->select('teachers.*', 'schedules.end_date', 'schedules.courses_id')
                ->get();
        //dd($profesori);
        return view('frontend.sertifikat.adults', [
            'data' => $data,
            'profesori' => $profesori,
            'jezik' => $jezik,
            'broj' => $broj,
        ]);
    } 
    
    public function deca($jezik = 'srpski', $broj) {
        //dd($broj); 
        $data = Certificate::where('certificates.certificate_number', '=', $broj)
                ->join('students', 'certificates.students_id', '=', 'students.id')
                ->join('courses', 'certificates.courses_id', '=', 'courses.id')
                ->select('certificates.*', 'students.name', 'students.surname', 'courses.id', 'courses.title_eng', 'courses.title_srp', 'courses.class', 'courses.description_eng', 'courses.description_srp')
                ->where('class', '=', 'children')
                ->get();
        //dd($data);

        $profesori = Schedule::where('schedules.courses_id', '=', $data->first()->courses_id)
                ->join('teachers', 'schedules.teachers_id', '=', 'teachers.id')
                ->join('courses', 'schedules.courses_id', '=', 'courses.id')
                ->select('teachers.*', 'schedules.end_date', 'schedules.courses_id')
                ->get();
        //dd($profesori);
        
        return view('frontend.sertifikat.children', [
            'data' => $data,
            'profesori' => $profesori,
            'jezik' => $jezik,
            'broj' => $broj,
        ]);
    }

    public function scratch($jezik = 'srpski', $broj) {
        //dd($broj); 
        $data = Certificate::where('certificates.certificate_number', '=', $broj)
                ->join('students', 'certificates.students_id', '=', 'students.id')
                ->join('courses', 'certificates.courses_id', '=', 'courses.id')
                ->select('certificates.*', 'students.name', 'students.surname', 'courses.id', 'courses.title_eng', 'courses.title_srp', 'courses.class', 'courses.description_eng', 'courses.description_srp')
                ->where('class', '=', 'scratch')
                ->get();
        //dd($data); 

        $kursevi = Course::where('class', '=', 'scratch')
                ->select('courses.*')
                ->orderBy('id', 'asc')
                ->get();
        //dd($kursevi);

        $kurseviName = $kursevi->pluck('title_eng')->toArray();
        //dd($kurseviName); 

        $zvezdice = Certificate::where('certificates.students_id', '=', $data->first()->students_id)
                ->join('students', 'certificates.students_id', '=', 'students.id')
                ->join('courses', 'certificates.courses_id', '=', 'courses.id')
                ->select('certificates.*', 'students.name', 'students.surname', 'courses.title_eng', 'courses.class', 'courses.description_eng', 'courses.description_srp')
                ->where('class', '=', 'scratch')
                ->get();
        //dd($zvezdice);
        $zvezdiceName = $zvezdice->pluck('title_eng')->toArray();
        //dd($zvezdiceName);

        $profesori = Schedule::where('schedules.courses_id', '=', $data->first()->courses_id)
                ->join('teachers', 'schedules.teachers_id', '=', 'teachers.id')
                ->join('courses', 'schedules.courses_id', '=', 'courses.id')
                ->select('teachers.*', 'schedules.end_date', 'schedules.courses_id')
                ->get();
        //dd($profesori);
        return view('frontend.sertifikat.scratch', [
        'data' => $data,
        'profesori' => $profesori,
        'kursevi' => $kursevi,
        'zvezdice' => $zvezdice,
        'jezik' => $jezik,
        'broj' => $broj,
        'zvezdiceName' => $zvezdiceName,
        'kurseviName' => $kurseviName,
        ]);
    }

}
