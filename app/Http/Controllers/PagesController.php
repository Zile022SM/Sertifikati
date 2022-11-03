<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Page;
use Intervention\Image\Facades\Image;

class PagesController extends Controller {

    public function index($page = 0) {
       
        if (!isset($page) || empty($page)) {
            $pageId = 0;
        } else {
            $pageId = $page;
        }
        $data = Page::notdeleted()->forpage($pageId)->get();

        return view('admin.pages.index', compact('data'));
    }

    public function create() {

        $mainPagesPossibleValues = [0];
        $mainPages = Page::notdeleted()->firstlevel()->get();
        //ovde izvlacimo moguce vrednosti za id iz niza $mainPages i smestamo u novi niz $mainPagesPossibleValues
        if (count($mainPages) > 0) {
            foreach ($mainPages as $value) {
                array_push($mainPagesPossibleValues, $value->id);
            }
        }
        //zatim pretvaramo niz u string da bi mogli lakse da koristimo rulove u validaciji
        $mainPagesPossibleValuesString = implode(',', $mainPagesPossibleValues);

        if (request()->isMethod('post')) {
            $this->validate(request(), [
                'page_id' => "required|integer|in:$mainPagesPossibleValuesString",
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'content' => 'required|string',
                'image' => 'required|mimes:jpeg,bmp,png',
                'header' => 'required|in:0,1',
                'aside' => 'required|in:0,1',
                'footer' => 'required|in:0,1',
                'contact_form' => 'required|in:0,1',
            ]);
            $newRow = new Page();
            $newRow->page_id = request('page_id');
            $newRow->title = request('title');
            $newRow->description = request('description');
            $newRow->content = request('content');
            $newRow->header = request('header');
            $newRow->aside = request('aside');
            $newRow->footer = request('footer');
            $newRow->contact_form = request('contact_form');
            $newRow->active = 0;
            $newRow->deleted = 0;

            $image = "";
            //check image element in request and accept image
            if (request()->hasFile('image')) {
                $file = request('image');
                $fileName = str_slug($newRow->title, '-');
                $fileExtension = $file->getClientOriginalExtension();
                $fullFileName = config('app.seo-image-prefix') . $fileName . "." . $fileExtension;
                $file->move(public_path('/uploads/pages'), $fullFileName);
                $image = '/uploads/pages/' . $fullFileName;
                $imageInter = Image::make(public_path('/uploads/pages/') . $fullFileName);

                //XL size
                $imageInter->resize(547, null, function($constraint) {
                    $constraint->aspectRatio();
                });
                $fullFileNameXL = config('app.seo-image-prefix') . $fileName . "-xl." . $fileExtension;
                $imageInter->save(public_path('/uploads/pages/') . $fullFileNameXL);

                // M size
                $imageInter->resize(300, null, function($constraint) {
                    $constraint->aspectRatio();
                });
                $fullFileNameM = config('app.seo-image-prefix') . $fileName . "-m." . $fileExtension;
                $imageInter->save(public_path('/uploads/pages/') . $fullFileNameM);

                //S size
                $imageInter->resize(120, null, function($constraint) {
                    $constraint->aspectRatio();
                });
                $fullFileNameS = config('app.seo-image-prefix') . $fileName . "-s." . $fileExtension;
                $imageInter->save(public_path('/uploads/pages/') . $fullFileNameS);
            }


            $newRow->image = $image;

            $newRow->save();

            //session()->flash('message','Korisnik uspesno kreiran!!!');jedan od nacina
            session()->flash('message', [
                'type' => 'success',
                'message' => "Stranica $newRow->title uspesno kreirana!!!"
            ]); //drugi nacin gde mozemo u jednoj sesiji kreirati vise vrednosti

            return redirect(route('pages'));
        }

        return view('admin.pages.create', compact('mainPages'));
    }
    
    
    public function active(Page $page) {
       if($page->active ==1){
           $page->active =0;
           $page->save();
       }else{
           $page->active =1;
           $page->save();
       }
        session()->flash('message', [
            'type' => 'success',
            'message' => "Page $page->title status uspesno izmenjen!!!"
        ]); //drugi nacin gde mozemo u jednoj sesiji kreirati vise vrednosti
        return redirect(route('pages'));
    }
    
    public function delete(Page $page) {
        $page->deleted = 1;
        //$page->deleted_by = auth()->user()->id;
        $page->save();
        session()->flash('message', [
            'type' => 'success',
            'message' => "Page $page->title uspesno uklonjena !!!"
        ]); //drugi nacin gde mozemo u jednoj sesiji kreirati vise vrednosti
        return redirect(route('pages'));
    }

}
