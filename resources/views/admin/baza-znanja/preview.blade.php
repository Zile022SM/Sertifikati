<!doctype html>
<html class="no-js" lang="sr-rs">
    <head>
        <title></title>
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1">
        <meta name="description" content="IT ZA DECU -  Istražujući aktuelne edukativne članke iz naše baze znanja u prilici smo da zajedno otkrivamo svet programiranja...">
        <meta name="keywords" content="IT za decu, programiranje za decu, scratch, python, programski jezici, baza znanja">
        <meta name="geo.region" content="RS">
        <meta name="geo.placename" content="Београд">
        <meta name="distribution" content="global">
        <meta name="Revisit-after" content="1 days">
        <meta http-equiv="Cache-control" content="no-cache">
        <meta name="city" content="Beograd">
        <meta name="country" content="Serbia (Srbija)">
        <meta name="author" content="Edukativni centar | www.procoding.rs">
        <!-- Favicon and Touch Icons -->
        <link href="{{url('/templates/it_za_decu/images/favicon.png')}}" rel="shortcut icon" type="image/png">
        <link href='https://fonts.googleapis.com/css?family=Cabin' rel='stylesheet' type='text/css'>
        <!-- animation -->
        <link rel="stylesheet" href="{{url('/templates/it_za_decu/css/animate.css')}}" />
        <!-- bootstrap -->
        <link rel="stylesheet" href="{{url('/templates/it_za_decu/css/bootstrap.css')}}" />
        <!-- font-awesome icon -->
        <link rel="stylesheet" href="{{url('/templates/it_za_decu/css/font-awesome.min.css')}}" />
        <!-- style -->
        <link rel="stylesheet" href="{{url('/templates/it_za_decu/css/css.css')}}" />
        <!-- responsive -->
        <link rel="stylesheet" href="{{url('/templates/it_za_decu/css/responsive.css')}}" />
        <link rel="stylesheet" href="{{url('/templates/it_za_decu/css/style.css')}}" />
        <link rel="stylesheet" href="{{url('/templates/it_za_decu/css/single-post.css')}}" />
        <!--[if IE]>
                    <link rel="stylesheet" href="{{url('/templates/it_za_decu/css/style-ie.css')}}" />
                <![endif]-->
        <!--[if IE]>
                    <script src="{{url('/templates/it_za_decu/js/html5shiv.js')}}"></script>
                <![endif]-->
    </head>
    <body class="section-wrap-single">
        <!-- ****************************************************************MAIN************************************************************-->
        <main> 
            <!-- content section -->
            <section class="wow fadeIn section-wrap-single">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12  col-sm-12 text-center wow fadeInUp">
                            <!-- h1 -->
                            <h1 class="h1-custom margin-two post-h1">Post preview - baza znanja - ADMIN</h1>
                            <!-- end h1 -->
                        </div>
                    </div>
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
                                    <p class="p-datum">{{date('d-m-Y', strtotime($post->created_at))}}</p>
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

        </main>

        <footer class="footer">
            <!-- scroll to top -->

            <a href="#top" class="scrollToTop" style="background:#f7942e"><i class="fa fa-angle-up"></i></a><br><br>
            <a href="#" onclick="goBack();" class="scrollToTop" style="background:#f7942e;margin-right: 50px;padding:3px;color:white;">Back to the list</a>
            <!-- scroll to top End... -->
        </footer>
        <!-- end footer -->
        <!-- ******************************************************END OF  FOOTER ************************************************************-->
        <script type="text/javascript" src="{{url('/templates/it_za_decu/js/js-libraries.js')}}"></script>
        <script type="text/javascript" src="{{url('/templates/it_za_decu/js/smooth-scroll.js')}}"></script>
        <!-- jquery appear - animation - page scroll  - easy piechart -parallax -owl slider  -  imagesloaded -->
        <script type="text/javascript" src="{{url('/templates/it_za_decu/js/js-other.js')}}"></script>
        <!-- revolution slider  -->
        <script type="text/javascript" src="{{url('/templates/it_za_decu/js/jquery.tools.min.js')}}"></script>
        <script type="text/javascript" src="{{url('/templates/it_za_decu/js/jquery.revolution.js')}}"></script>
        <!-- setting -->
        <script type="text/javascript" src="{{url('/templates/it_za_decu/js/main.js')}}"></script>
        <script type="text/javascript" src="{{url('/templates/it_za_decu/js/js-custom.js')}}"></script>
        <script>
                function goBack() {
                    window.history.back();
                }
        </script>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <!-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d627d201aba4b31"></script> -->
    </body>
</html>
