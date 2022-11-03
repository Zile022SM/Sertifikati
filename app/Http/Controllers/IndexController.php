<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Base;
use App\Model\Fact;

class IndexController extends Controller
{
    public function index(){
        $page='pocetna';
        return view('frontend.index.index',[
            'page'=>$page
        ]);
    } 
    
    public function baza(){
         $page='baza'; 
         $postovi= Base::samoakitivni()->paginate(1);
         
        return view('frontend.index.baza',[
            'page'=>$page,
            'postovi'=>$postovi
        ]);
    } 
    
    
    public function bazaOnePost(Base $post){
        $page='baza';
        //dd($post);
        $onePost= Base::where('id',$post->id)->get();
        //dd($onePost);
        return view('frontend.index.baza_one_post',[
            'page'=>$page,
            'post'=>$post,
            'onePost'=>$onePost
        ]);
    } 
    
    public function zanimljivosti(){
         $page='zanimljivosti';
         $postovi= Fact::samoakitivni()->paginate(4);
         
        return view('frontend.index.zanimljivosti',[
            'page'=>$page,
            'postovi'=>$postovi
        ]);
    } 
    
    public function zanimljivostiOnePost(Fact $post){
        $page='zanimljivosti';
        return view('frontend.index.zanimljivosti_one_post',[
            'page'=>$page,
            'post'=>$post
        ]);
    }
}
