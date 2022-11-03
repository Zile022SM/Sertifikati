<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Base;
use Intervention\Image\Facades\Image;


class BasesController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except(['login']);
        $this->middleware('admin')->only(['delete']);
        $this->middleware('guest')->only(['login']);
    }
    
    public function create() {
        
        if (request()->isMethod('post')) {
            $this->validate(request(), [
                'seo_title' => 'required|string|max:255',
                'meta_description' => 'required|string|max:255',
                'seo_title_h1' => 'required|string|max:255',
                'alt_attribute' => 'required|string|max:255',
                'content' => 'required|string',
                'type' => 'required|string',
                'image' => 'nullable|mimes:jpeg,bmp,png',
                'video'=>'nullable|string',
            ]); 
            
            $newRow = new Base();
            $newRow->seo_title = request('seo_title');
            $newRow->meta_description = request('meta_description');
            $newRow->seo_title_h1 = request('seo_title_h1');
            $newRow->alt_attribute = request('alt_attribute');
            $newRow->description = request('content');
            $newRow->type = request('type');
            $newRow->image = request('image');
            $newRow->video = request('video');
            $newRow->active =0;
            
            $image = "";
            //check image element in request and accept image
            if (request()->hasFile('image')) {
                $file = request('image');
                $fileName = str_slug($newRow->seo_title, '-');
                $fileExtension = $file->getClientOriginalExtension();
                $fullFileName = config('app.seo-image-prefix') . $fileName . "." . $fileExtension;
                $file->move(public_path('/uploads/baza'), $fullFileName);
                $image = '/uploads/baza/' . $fullFileName;
                $imageInter = Image::make(public_path('/uploads/baza/') . $fullFileName);

                
                // M size
                $imageInter->resize(1200, 1400, function($constraint) {
                    $constraint->aspectRatio();
                });
                $fullFileNameM = config('app.seo-image-prefix') . $fileName . "-m." . $fileExtension;
                $imageInter->save(public_path('/uploads/baza/') . $fullFileNameM);

            }


            $newRow->image = $image;

            $newRow->save();

            //session()->flash('message','Korisnik uspesno kreiran!!!');jedan od nacina
            session()->flash('message', [
                'type' => 'success',
                'message' => "Baza znanja post $newRow->name successfuly created!!!"
            ]); //drugi nacin gde mozemo u jednoj sesiji kreirati vise vrednosti

            return redirect(route('baza-lista',['post'=>$newRow->id]));
        }

        return view('admin.baza-znanja.create');
    }   
    
    public function edit(Base $post) {
        $currentPage=request('currentPage');
        //dd($currentPage);
        if (request()->isMethod('post')) {
            $this->validate(request(), [
                'seo_title' => 'required|string|max:255',
                'meta_description' => 'required|string|max:255',
                'seo_title_h1' => 'required|string|max:255',
                'alt_attribute' => 'required|string|max:255',
                'content' => 'required|string',
                'type' => 'required|string',
                'image' => 'nullable|mimes:jpeg,bmp,png',
                'video'=>'nullable|string',
            ]); 
            
            $post->seo_title = request('seo_title');
            $post->meta_description = request('meta_description');
            $post->seo_title_h1 = request('seo_title_h1');
            $post->alt_attribute = request('alt_attribute');
            $post->description = request('content');
            $post->type = request('type');
            
            if(!empty(request('image'))){
                $post->image = request('image');
            }
            $post->video = request('video');
            
            $image = "";
            //check image element in request and accept image
            if (request()->hasFile('image')) {
                $file = request('image');
                $fileName = str_slug($post->seo_title, '-');
                $fileExtension = $file->getClientOriginalExtension();
                $fullFileName = config('app.seo-image-prefix') . $fileName . "." . $fileExtension;
                $file->move(public_path('/uploads/baza'), $fullFileName);
                $image = '/uploads/baza/' . $fullFileName;
                $imageInter = Image::make(public_path('/uploads/baza/') . $fullFileName);

                
                // M size
                $imageInter->resize(1200, 1400, function($constraint) {
                    $constraint->aspectRatio();
                });
                $fullFileNameM = config('app.seo-image-prefix') . $fileName . "-m." . $fileExtension;
                $imageInter->save(public_path('/uploads/baza/') . $fullFileNameM);

            }

            if(!empty($image)){
                 $post->image = $image;
            }
            $post->save();

            //session()->flash('message','Korisnik uspesno kreiran!!!');jedan od nacina
            session()->flash('message', [
                'type' => 'success',
                'message' => "Baza znanja post $post->seo_title_h1 successfuly created!!!"
            ]); //drugi nacin gde mozemo u jednoj sesiji kreirati vise vrednosti

            return redirect(route('baza-lista',['page'=>$currentPage]));
        }

        return view('admin.baza-znanja.edit',[
            'post'=>$post
        ]);
    }  
    
    public function lista(){
        
        $postovi= Base::orderBy('id','DESC')->paginate(2);
        
        return view('admin.baza-znanja.base-list',[
            'postovi'=>$postovi,
        ]);
    }
    
    public function preview(Base $post){
        $page='baza';
        //dd($onePost);
        return view('admin.baza-znanja.preview',[
            'post'=>$post,
            'page'=>$page
        ]);
    } 
    
    public function active(Base $base){

        if($base->active ==1){
           $base->active =0;
           $base->save();
       }else{
           $base->active =1;
           $base->save();
       }
        session()->flash('message', [
            'type' => 'success',
            'message' => "Post $base->seo_title_h1 status uspesno izmenjen!!!"
        ]); //drugi nacin gde mozemo u jednoj sesiji kreirati vise vrednosti
//        return redirect(route('baza-lista',['page' => request()->get('page', 1)]));
        return redirect()->back();
    } 
    
    public function delete($id) {
        //dd($id);
        $onePost = Base::findOrFail($id);
        $onePost->delete();

        return redirect(route('baza-lista'));
    }
}
