@extends('templates.frontend.layout_it_za_decu') 

@section('seo-title')
<title>IT zanimljivosti  | IT ZA DECU</title>
@endsection  

@section('description')
<meta name="description" content="IT zanimljivosti o najpopularnijim programskim jezicima za decu">
@endsection  

@section('baza-css')
<link rel="stylesheet" href="{{url('/templates/it_za_decu/css/post-group.css')}}" /><!--isto-->
@endsection  

@section('seo-h1')
<!-- h1 section -->
<section class="content-top-margin page-title page-title-small  wrap-h1 post-wrap-h1">
    <div class="container">
        <div class="row">
            <div class="col-md-12  col-sm-12 text-center wow fadeInUp">
                <!-- h1 -->
                <h1 class="h1-custom margin-two post-h1">PROGRAMIRANJE ZA DECU - IT ZANIMLJIVOSTI</h1>
                <!-- end h1 -->
            </div>
        </div>
    </div>
</section>
<!-- end h1 section -->
@endsection

@section('content') 
<main class="main-post">
    <div class="container">

        <!-- ***********************************POST VIDEO-section********************************************* -->
        @foreach($postovi as $post)
        <div class="col-md-6 post-sum-2">
            <div class="col-md-10 col-md-offset-1  col-xs-12  margin-five post-container post-container-zanimljivosti">
                <!-- post image -->
                <div class="col-md-12  wow fadeInUp blog-listing post-wrap-img post-wrap-img-zanimljivosti" data-wow-duration="500ms">
                    <div class="blog-image">
                        @if($post->type=='video')
                        <div class="embed-responsive embed-responsive-4by3">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$post->video}}"></iframe>
                        </div>
                        @elseif($post->type=='image')
                        <a href="{{url('/templates/it_za_decu/post-single/post-text-single.html')}}"><img class=" img-responsive" src="{{$post->getImage('m')}}" alt="{{$post->alt_attribute}}"/></a>
                        @endif
                    </div>
                </div>
                <!-- post objava -->
                <div class="col-md-12 blog-details blog-details-zanimljivosti">
                    <div class="blog-date blog-date-zanimljivosti">
                        <p class="p-objava-naslov">objavio:</p>
                        <p class="p-objava"> it za decu - <span class="text-lowercase"> <a href="https://www.procoding.rs/" class="a-custom"> member of procoding group</a> </span></p>
                    </div>
                    <!-- post datum -->
                    <div class="blog-date blog-date-zanimljivosti">
                        <p class="p-datum-naslov">datum objave: </p>
                        <p class="p-datum">{{date('d/m/Y', strtotime($post->updated_at))}}</p>
                    </div>
                    <!-- post naslov -->
                    <h2 class="post-h2-custom h2-zanimljivosti">{{$post->seo_title_h1}}</h2>
                    <!-- post sadržaj -->
                    <div class="blog-short-description short-text">
                        {!!substr($post->description,0,250)!!}...
                    </div>
                    <div class="separator-line  no-margin-lr separator-line-zanimljivosti"></div>
                    <!-- post dugme -->
                    <div class="col-md-12 col-sm-12 center-col text-center dugme-opsirnije dugme-opsirnije-zanimljivosti"> <a  href="{{route('zanimljivosti-single-post',['post'=>$post->id])}}" class="highlight-button btn btn-medium button xs-margin-bottom-five">opširnije...</a> </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- ***********************************end of POST VIDEO-section********************************************* -->
    </div>
</main>
{{$postovi->links()}}
@endsection 

