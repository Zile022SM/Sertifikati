<!DOCTYPE html>
<html lang="sr-rs">
    <head>
        <title>Sertifikat | Edukativni centar Procoding</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- favicon -->
        <link rel="shortcut icon" href="/templates/sertifikat/images/favicon.ico">
        <!-- LINKS -->
        <!-- bootstrap-css -->
        <link rel="stylesheet" href="/templates/sertifikat/css/bootstrap.min.css" />
        <!-- font awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <!-- style -->
        <link rel="stylesheet" href="/templates/sertifikat/css/style.css" />
        <!--ovo ide u yield-->
        <link rel="stylesheet" href="/templates/sertifikat/css/sertifikat.css" />
        <!--yield-->
        <!-- SCRIPT -->
        <script type="text/javascript" src="/templates/sertifikat/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="/templates/sertifikat/js/bootstrap.min.js"></script>

        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <![endif]-->
    </head>
    <body>
        <!--start container-->
        <div class="container">
            <div class="row">
                <!--DIV Wrapper-->
                <div class="col-xs-10 col-xs-offset-1 wrapper">
                    <!--DIV left-corner + languages-->
                    <div class="row">
                        <div class="col-md-10 col-xs-8   left-corner"> <img src="/templates/sertifikat/images/sertifikat-gore.jpg" class="img-responsive img-sert" alt="donji desni ugao ukras"> </div>
                        <div class="col-sm-2  col-xs-4  wrap-lang">
                            <a href="{{route('scratch',['jezik'=>'srpski','broj'=>$data->first()->certificate_number])}}"><div class="col-sm-3  col-sm-offset-3   col-xs-5   div-srb"> <img src="/templates/sertifikat/images/srb.jpg" class="img-responsive img-lang" title="SERBIAN" alt="zastava Srbija" > </div></a>
                            <a href="{{route('scratch',['jezik'=>'engleski','broj'=>$data->first()->certificate_number])}}"><div class=" col-sm-3 col-xs-5  div-eng"> <img src="/templates/sertifikat/images/eng.jpg" class="img-responsive img-lang" title="ENGLISH" alt="zastava Engleska" > </div></a>
                        </div>
                    </div>
                    <!--DIV LOGO-->
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2 logo"> <img src="/templates/sertifikat/images/logo.png" class="img-responsive" alt="Edukativni centar Procoding - logo"> </div>
                    </div>
                    <!--div sertifikat-->
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4 col-xs-10 col-xs-offset-1 text-center sertifikat"> {{($jezik == 'engleski')?'CERTIFICATE ':'SERTIFIKAT '}} </div>
                    </div>
                    <!--div podaci-o-kursu-->
                    <div class="row">
                        <!--ime i prezime-->
                        <div class="col-xs-12 text-center ime-prezime-wrap"> <span class="imePrezime-change">{{$data->first()->name}}  {{$data->first()->surname}}</span><img class="dugme-scratch-level-img" src="/templates/sertifikat/images/klikni-scratch-nivo.png" width="200" alt="scartch-level dugme" data-toggle="modal" data-target="#myModal"> </div>
                        <!-- Modal SCRATCH LEVEL -->
                        <div class="modal fade modal-scratch" id="myModal" role="dialog">
                            <div class="modal-dialog modal-scratch-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times fa-lg" aria-hidden="true"></i> </button>
                                    </div>
                                    <div class="modal-body">
                                        <!--row slika,ime-->
                                        <div class="row">
                                            <div class="col-md-5 col-md-offset-0 col-xs-10 col-xs-offset-1"> <img class="img-responsive nivo-img nivoSlika-change" src="/templates/sertifikat/images/{{trim(strtolower(substr($zvezdice->last()->title_eng, 7, 8)))}}.png" alt="scrach level ticket"> </div>
                                            <div class="col-md-7  text-center modal-div-ime">
                                                <p class="modal-div-ime-p modalIme-change">{{$zvezdice->first()->name}}</p>
                                                <p class="modal-div-ime-p modalPrezime-change">{{$zvezdice->first()->surname}}</p>
                                            </div>
                                        </div>
                                        <!--row zvezdice-->
                                        <div class="row modal-row">
                                            @foreach($kurseviName as $kurs)
                                            <div class="col-xs-8 col-md-5 col-md-offset-2 div-scratch-level"><span class="scratch-name">{{substr($kurs,0,7)}} </span> {{substr($kurs,7,8) }}: </div>
                                            <div class="col-md-2 col-xs-4    text-center"> <img class="img-responsive" src="/templates/sertifikat/images/{{(in_array($kurs, $zvezdiceName))?'star.png':'star-empty.png'}}" alt="scratch level star"> </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
                                    </div>
                                </div>
                            </div>
                        </div> 


                        <!--broj sertifikata-->
                        <div class="col-xs-12 podatak-wrap">
                            <div class="col-xs-6  podatak-naziv"> {{($jezik == 'engleski')?'Certificate number':'Broj sertifikata:'}} </div>
                            <div class="col-xs-6  podatak brojSertifikata-change">{{$data->first()->certificate_number}} </div>
                        </div>
                        <!--naziv kursa-->
                        <div class="col-xs-12  podatak-wrap">
                            <div class="col-xs-6 podatak-naziv"> {{($jezik == 'engleski')?'Course title:':'Naziv kursa:'}} </div>
                            <div class="col-xs-6 podatak kurs-naziv kurs-naziv-change"> {{($jezik == 'engleski')?$data->first()->title_eng:$data->first()->title_srp}} </div>
                        </div>
                        <!--opis-->
                        <div class="col-xs-12  podatak-wrap">
                            <div class="col-xs-6 podatak-naziv"> {{($jezik == 'engleski')?'Course description:':'Opis kursa:'}} </div>
                            <div class="col-xs-5 podatak opisKursa-change"> {!!($jezik == 'engleski')?$data->first()->description_eng:$data->first()->description_srp!!}</div>
                        </div>
                        <!--datum-->
                        <div class="col-xs-12  podatak-wrap">
                            <div class="col-xs-6 podatak-naziv"> {{($jezik == 'engleski')?'End date:':'Datum zavrsetka:'}} </div>
                            <div class="col-xs-6 podatak datumZavrsetka-change"> {{$profesori->first()->end_date}} </div>
                        </div>
                    </div>
                    <!--profesori-->
                    <div class="row">
                        <div class="col-xs-12 text-center  profesori-naslov"> {{($jezik == 'engleski')?'TEACHERS:':'PROFESORI:'}} </div>
                    </div>

                    <div class="row">
                        <!-- *************************profesor div********************************** -->
                        @foreach($profesori as $profesor)
                        <div class="col-sm-6" style="padding:0!important;margin-bottom: 30px;">
                            <div class="col-sm-1"> </div>
                            <div class="col-sm-10 prof1-wrap">
                                <!--prof 1-tekst-->
                                <div class="col-sm-5 prof-text-wrap">
                                    <div class="col-sm-12 text-center prof-text"> {{($jezik == 'engleski')?$profesor->title_eng:$profesor->title_srp}} <br>
                                        {{$profesor->name}}
                                        {{$profesor->surname}} </div>
                                    <div class="col-sm-12  text-center" style="padding:0!important">
                                        <a href="{{route('sertifikat-profesor',['profesor'=>$profesor->id])}}"><div class="col-sm-10 col-sm-offset-1 col-xs-8 col-xs-offset-2  div-search-inner"> opširnije... </div></a>
                                    </div>
                                </div>
                                <!--prof 1-slika-->
                                <div class="col-sm-7 prof-slika-wrap prof-slika-wrap1 "> <img id="slika" class="img-responsive profSlika1-change" src="{{$profesor->getImage('m')}}" alt="profesor profil"> </div>
                            </div>
                            <div class="col-sm-1"> </div>
                        </div>
                        @endforeach
                        <!-- *************************end of profesor div********************************** -->
                    </div> 

                    <!--profesori-->
                    <div class="row">
                        <div class="col-sm-12  text-center dugme-nazad-wrap">
                            <button class="dugme-nazad"> <i class='far fa-hand-point-left' style='font-size:18px'></i>&nbsp; {{($jezik == 'engleski')?' Back to Homepage ':'Nazad na početnu'}}</button>
                        </div>
                    </div>
                    <!--div right-corner-->
                    <div class="row">
                        <div class="col-md-10 col-md-offset-2 col-xs-8 col-xs-offset-4  right-corner"> <img src="/templates/sertifikat/images/sertifikat-dole.jpg" class="img-responsive img-sert" alt="gornji levi ugao ukras"> </div>
                    </div>
                    <!--end of wrapper-->
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </div>
    </body>
</html>


