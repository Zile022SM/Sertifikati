<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Teacher;
use Intervention\Image\Facades\Image;

class TeachersController extends Controller {
    
    public function __construct() {
        $this->middleware('auth')->except(['login']);
        $this->middleware('admin')->only(['delete']);
        $this->middleware('guest')->only(['login']);
    }

    public function index() {

        //$data = User::notdeleted()->get();
        $data = Teacher::notdeleted()->get();

        return view('admin.teachers.index', compact('data'));
    }

    public function create() {
        //dd(request('date_of_birth')); 
        if (request()->isMethod('post')) {
            $this->validate(request(), [
                'title_srp' => 'required|string|max:255',
                'title_eng' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'description_srp' => 'required|string',
                'description_eng' => 'required|string',
                'image' => 'required|mimes:jpeg,bmp,png',
            ]);
            $newRow = new Teacher();
            $newRow->title_srp = request('title_srp');
            $newRow->title_eng = request('title_eng');
            $newRow->name = request('name');
            $newRow->surname = request('surname');
            $newRow->description_srp = request('description_srp');
            $newRow->description_eng = request('description_eng');

            $image = "";
            //check image element in request and accept image
            if (request()->hasFile('image')) {
                $file = request('image');
                $fileName = str_slug($newRow->name, '-');
                $fileExtension = $file->getClientOriginalExtension();
                $fullFileName = config('app.seo-image-prefix') . $fileName . "." . $fileExtension;
                $file->move(public_path('/uploads/teachers'), $fullFileName);
                $image = '/uploads/teachers/' . $fullFileName;
                $imageInter = Image::make(public_path('/uploads/teachers/') . $fullFileName);

                //XL size
                $imageInter->resize(547, null, function($constraint) {
                    $constraint->aspectRatio();
                });
                $fullFileNameXL = config('app.seo-image-prefix') . $fileName . "-xl." . $fileExtension;
                $imageInter->save(public_path('/uploads/teachers/') . $fullFileNameXL);

                // M size
                $imageInter->resize(450, 600, function($constraint) {
                    $constraint->aspectRatio();
                });
                $fullFileNameM = config('app.seo-image-prefix') . $fileName . "-m." . $fileExtension;
                $imageInter->save(public_path('/uploads/teachers/') . $fullFileNameM);

                //S size
                $imageInter->resize(40, null, function($constraint) {
                    $constraint->aspectRatio();
                });
                $fullFileNameS = config('app.seo-image-prefix') . $fileName . "-s." . $fileExtension;
                $imageInter->save(public_path('/uploads/teachers/') . $fullFileNameS);
            }


            $newRow->image = $image;

            $newRow->save();

            //session()->flash('message','Korisnik uspesno kreiran!!!');jedan od nacina
            session()->flash('message', [
                'type' => 'success',
                'message' => "Teacher $newRow->name successfuly created!!!"
            ]); //drugi nacin gde mozemo u jednoj sesiji kreirati vise vrednosti

            return redirect(route('teachers'));
        }

        return view('admin.teachers.create');
    }

    public function edit(Teacher $teacher) {
        if (request()->isMethod('post')) {
            $this->validate(request(), [
                'title_srp' => 'required|string|max:255',
                'title_eng' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'description_srp' => 'required|string',
                'description_eng' => 'required|string',
                'image' => 'nullable|mimes:jpeg,bmp,png',
            ]);
            $teacher->title_srp = request('title_srp');
            $teacher->title_eng = request('title_eng');
            $teacher->name = request('name');
            $teacher->surname = request('surname');
            $teacher->description_srp = request('description_srp');
            $teacher->description_eng = request('description_eng');

            $image = $teacher->image;
            //check image element in request and accept image
            if (request()->hasFile('image')) {
                $file = request('image');
                $fileName = str_slug($teacher->name, '-');
                $fileExtension = $file->getClientOriginalExtension();
                $fullFileName = config('app.seo-image-prefix') . $fileName . "." . $fileExtension;
                $file->move(public_path('/uploads/teachers'), $fullFileName);
                $image = '/uploads/teachers/' . $fullFileName;
                $imageInter = Image::make(public_path('/uploads/teachers/') . $fullFileName);

                //XL size
                $imageInter->resize(547, null, function($constraint) {
                    $constraint->aspectRatio();
                });
                $fullFileNameXL = config('app.seo-image-prefix') . $fileName . "-xl." . $fileExtension;
                $imageInter->save(public_path('/uploads/teachers/') . $fullFileNameXL);

                // M size
                $imageInter->resize(450,600, function($constraint) {
                    $constraint->aspectRatio();
                });
                $fullFileNameM = config('app.seo-image-prefix') . $fileName . "-m." . $fileExtension;
                $imageInter->save(public_path('/uploads/teachers/') . $fullFileNameM);

                //S size
                $imageInter->resize(40, null, function($constraint) {
                    $constraint->aspectRatio();
                });
                $fullFileNameS = config('app.seo-image-prefix') . $fileName . "-s." . $fileExtension;
                $imageInter->save(public_path('/uploads/teachers/') . $fullFileNameS);
            }


            $teacher->image = $image;

            $teacher->save();

            //session()->flash('message','Korisnik uspesno kreiran!!!');jedan od nacina
            session()->flash('message', [
                'type' => 'success',
                'message' => "Teacher $teacher->name successfuly edited!!!"
            ]); //drugi nacin gde mozemo u jednoj sesiji kreirati vise vrednosti

            return redirect(route('teachers'));
        }

        return view('admin.teachers.edit', compact('teacher'));
    }

    public function active(Teacher $teacher) {
        if ($teacher->active == 1) {
            $teacher->active = 0;
            $teacher->save();
        } else {
            $teacher->active = 1;
            $teacher->save();
        }
        session()->flash('message', [
            'type' => 'success',
            'message' => "Teacher $teacher->name status successfully edited!!!"
        ]); //drugi nacin gde mozemo u jednoj sesiji kreirati vise vrednosti
        return redirect(route('teachers'));
    }

    public function delete(Teacher $teacher) {
        $teacher->deleted = 0;
        //$student->deleted_by = auth()->user()->id;
        $teacher->save();
        session()->flash('message', [
            'type' => 'success',
            'message' => "Teacher $teacher->name successfully deleted !!!"
        ]); //drugi nacin gde mozemo u jednoj sesiji kreirati vise vrednosti
        return redirect(route('teachers'));
    }

}
