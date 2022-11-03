@extends('templates.frontend.layout_it_za_decu') 

@section('seo-title')
<title>{{$post->seo_title}} | IT ZA DECU</title>
@endsection  

@section('description')
<meta name="description" content="{{$post->meta_description}}">
@endsection  

@section('one-post-css')
<link rel="stylesheet" href="{{url('/templates/it_za_decu/css/single-post.css')}}" />

@endsection  


@section('content')
<main>
    <!-- content section -->
    <section class="wow fadeIn section-wrap-single">
        <div class="container">
            <div class="row">
                <!-- content  -->
                <div class="col-md-11 col-md-offset-1 col-xs-12 wrap-content">
                    <div class="col-md-9 col-sm-8 col-sm-offset-1 col-xs-12">
                        <!--h1 NASLOV-->
                        <h1 class="blog-details-headline h1-sigle-post">{{$post->seo_title_h1}}</h1>
                        <!-- end H1 naslov  -->
                        <!-- post objava + datum -->
                        <div class="blog-date blog-date-1">
                            <!-- post objava -->
                            <p class="p-objava-naslov">objavio:</p>
                            <p class="p-objava"> it za decu - <span class="text-lowercase"> <a href="https://www.procoding.rs/" class="a-custom"> member of procoding group</a> </span></p>
                        </div>
                        <span class="crta"> &nbsp;|&nbsp; </span>
                        <!-- post datum -->
                        <div class="blog-date blog-date-2">
                            <p class="p-datum-naslov">datum objave:</p>
                            <p class="p-datum">{{date('d/m/Y', strtotime($post->updated_at))}}</p>
                        </div>
                        <br><br>
                        <!--video-->
                        @if($post->type=='video')
                        <div class="embed-responsive embed-responsive-4by3">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$post->video}}"></iframe>
                        </div>
                        @elseif($post->type=='image')
                        <a href="{{url('/templates/it_za_decu/post-single/post-text-single.html')}}"><img class=" img-responsive" src="{{$post->getImage('m')}}" alt="{{$post->alt_attribute}}"/></a>
                        @endif
                        <!--end video-->
                        <!-- post text -->
                        <br>
                        <div>
                            {!!$post->description!!}

                            <div class="col-md-12 text-center">
                                <div class="addthis_inline_share_toolbox div-share" style=" display:inline"></div>
                            </div>
                        </div>
                        <!-- end post text -->
                    </div>
                </div>
                <!-- end content  -->
            </div>
        </div>
    </section>
    <!-- end content section -->
    <!-- button left + right -->
    <div class="col-md-12 col-sm-12 col-xs-12 text-center wrap-buttons"> <img src="{{url('/templates/it_za_decu/images/arrow-pre-small.png')}}" alt="strelica levo"> <a href="{{route('baza')}}" class="highlight-button btn btn-small btn-round button xs-margin-bottom-five">&nbsp;&nbsp;&nbsp;baza znanja&nbsp;&nbsp;&nbsp;</a> <a href="{{route('zanimljivosti')}}" class="highlight-button btn btn-small btn-round button xs-margin-bottom-five"  style="margin-right:0">it zanimljivosti</a> <img src="{{url('/templates/it_za_decu/images/arrow-next-small.png')}}" alt="strelica desno" style="margin-left:0"> </div>
    <!-- end button left + right -->
</main>
@endsection 
