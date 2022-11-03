<!doctype html>
<html class="no-js" lang="sr-rs">
    <head>
        <title>Postovi iz kategorije baza znanja | Admin</title>
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
        <link href="images/favicon.png" rel="shortcut icon" type="image/png">
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
        <link rel="stylesheet" href="{{url('/templates/it_za_decu/css/post-group.css')}}" />
        <!--[if IE]>
                    <link rel="stylesheet" href="{{url('/templates/it_za_decu/css/style-ie.css')}}" />
                <![endif]-->
        <!--[if IE]>
                    <script src="{{url('/templates/it_za_decu/js/html5shiv.js')}}"></script>
                <![endif]-->
    </head>
    <body>
        <!-- ****************************************************************MAIN************************************************************-->
        <main class="main-post">
            <div class="row">
                <div class="col-md-12  col-sm-12 text-center wow fadeInUp">
                    <!-- h1 -->
                    <h1 class="h1-custom margin-two post-h1">Baza znanja ADMIN </h1>
                    <!-- end h1 -->
                </div>
            </div>
            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="text-align: center;">
                <form class="form-inline mr-auto">
                    <input class="form-control" type="text" placeholder="Search" aria-label="Search" style="margin-top: 7px;">
                    <button type="submit" class="btn btn-secondary"><i class="fa fa-search fa-2x" aria-hidden="true" style="color:skyblue;"></i></button>
                </form>
            </div>

            <!--/.Navbar-->
            <!-- ***********************************POST text-section********************************************* -->
            @foreach($postovi as $post)
            <section class="postSum">

                <div class="container">
                    <div class="row">
                        <!-- content  -->

                        <div class="col-md-9 col-md-offset-1 col-xs-12  margin-five post-container">

                            <!-- post image -->
                            <div class="col-md-6  wow fadeInUp blog-listing post-wrap-img" data-wow-duration="500ms">
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
                            <div class="col-md-6 blog-details">
                                <div class="blog-date">
                                    <p class="p-objava-naslov">objavio:</p>
                                    <p class="p-objava"> it za decu - <span class="text-lowercase"> <a href="https://www.procoding.rs/" class="a-custom"> member of procoding group</a> </span></p>
                                </div>
                                <!-- post datum -->
                                <div class="blog-date">
                                    <p class="p-datum-naslov">datum objave:</p>
                                    <p class="p-datum">{{date('d/m/Y', strtotime($post->created_at))}}</p>
                                </div>
                                <!-- post naslov -->

                                <?php //$neuertext = wordwrap($post->seo_title_h1, 30, "\n", true);?>

                                <h2 class="post-h2-custom">{{$post->seo_title_h1}}</h2>
                                <!-- post sadržaj -->
                                <div class="blog-short-description">
                                    {!!substr($post->description,0,200)!!}...
                                </div>
                                <div class="separator-line  no-margin-lr"></div>
                                <!-- post dugme -->
                                <div class="text-center mojtip">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{route('baza-lista-preview',['post'=>$post->id])}}" data-toggle="tooltip" data-placement="top" data-original-title="post preview"><i class="fa fa-search fa-2x" aria-hidden="true" style="color:green;margin: 0 10px 0 10px;"></i></a>
                                        @if($post->active == 1)
                                        <a href="{{route('baza-lista-active',['base'=>$post->id])}}" data-toggle="tooltip" data-placement="top" data-original-title="hide post"><i class="fa fa-eye-slash fa-2x" aria-hidden="true" style="color:orangered;margin: 0 10px 0 10px;"></i></a>
                                        @else
                                        <a href="{{route('baza-lista-active',['base'=>$post->id])}}" data-toggle="tooltip" data-placement="top" data-original-title="show post"><i class="fa fa-eye fa-2x" aria-hidden="true" style="color:green;margin: 0 10px 0 10px;"></i></a>
                                        @endif
                                        <a href="{{route('baza-edit',['post'=>$post->id,'currentPage'=>$postovi->currentPage()])}}" data-toggle="tooltip" data-placement="top" data-original-title="edit post"><i class="fa fa-pencil fa-2x" aria-hidden="true" style="color:green;margin: 0 10px 0 10px;"></i></a>
                                        <a data-href="{{route('baza-lista-delete',['id'=>$post->id])}}" data-username="{{$post->seo_title}}" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash fa-2x" aria-hidden="true" style="color:red;margin: 0 10px 0 10px;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- end content  -->
                    </div>

            </section>
            @endforeach
            <!-- ***********************************end of VIDEO -section********************************************* -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Delete admin user</h4>
                        </div>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a type="button" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </main>
        <!-- pagination -->
        {{$postovi->links()}}
        
        <!-- end pagination -->
        <!-- ******************************************************END OF  MAIN ************************************************************-->
        <!-- ***************************************************************FOOTER************************************************************-->
        <!-- footer -->
        <footer class="footer">
            <!-- scroll to top -->
            
            <a href="#top" class="scrollToTop" style="background:#f7942e"><i class="fa fa-angle-up"></i></a><br><br>
            <a href="{{route('users-welcome')}}" class="scrollToTop" style="background:#f7942e;margin-right: 50px;padding:3px;color:white;">Back to dashboard</a>
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
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var userName = button.data('username'); // Extract info from data-* attributes
            //var userId = button.data('userid');
            var userHref = button.data('href');
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this);
            modal.find('.modal-body').text('Da li ste sigurni da zelite da obrisete post: ' + userName + '?');
            //modal.find('.modal-footer .btn-danger').attr('href','/users/delete/'+userId);jedan od primera
            modal.find('.modal-footer .btn-danger').attr('href', userHref);
        });
        </script>
        <script>
            $('.mojtip').tooltip({
                selector: "[data-toggle=tooltip]",
                container: "body"
            });
        </script>
    </body>
</html>
