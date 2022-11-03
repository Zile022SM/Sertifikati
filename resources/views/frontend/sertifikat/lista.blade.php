<!DOCTYPE html>
<html lang="sr-rs">
    <head>
        <title>Lista sertifikata | Edukativni centar Procoding</title>
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
        <link rel="stylesheet" href="/templates/sertifikat/css/listaSertifikata.css" />
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
                    <!--logo + languages-->
                    <div class="row">
                        <div class="col-md-8 col-md-offset-1 col-xs-6 col-xs-offset-1  div-logo"> <img src="/templates/sertifikat/images/logo.png" class="img-responsive" alt="Edukativni centar Procoding - logo"> </div>
                        <div class="col-sm-2 col-sm-offset-0 col-xs-4 col-xs-offset-1  wrap-lang">
                            <a href="{{route('sertifikat-lista',['student'=>$data->first()->students_id,'jezik'=>'srpski','broj'=>$broj])}}"><div class="col-sm-3  col-sm-offset-3   col-xs-5   div-srb"> <img src="/templates/sertifikat/images/srb.jpg" class="img-responsive img-lang" title="SERBIAN" alt="zastava Srbija" > </div></a>
                            <a href="{{route('sertifikat-lista',['student'=>$data->first()->students_id,'jezik'=>'engleski','broj'=>$broj])}}"><div class=" col-sm-3 col-xs-5  div-eng"> <img src="/templates/sertifikat/images/eng.jpg" class="img-responsive img-lang" title="ENGLISH" alt="zastava Engleska" > </div></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1  wrap-all">
                            <!--ime-prezime-->
                            <div class="row">
                                <div class="col-xs-12 text-center ime-prezime-wrap"><span class="imePrezime-change"> {{$data->first()->name}}  {{$data->first()->surname}}</span> </div>
                            </div>
                            
                            <!--lista-naslov-->
                            <div class="row">
                                <div class="col-xs-12 text-center listaSertifikata-naslov"> Lista sertifikata / List of certificates </div>
                            </div>

                            <!--lista-sertifikata-->
                            <div class="row wrap-row-lista">
                                <div class=" col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0 wrap-row-naziv-broj">
                                    <div class="col-xs-6 text-center naziv">{{($jezik == 'engleski')?'COURSE TITLE :':'NAZIV KURSA :'}}</div>
                                    <div class="col-xs-6 text-center broj">{{($jezik == 'engleski')?'CERTIFICATE NUMBER :':'BROJ SERTIFIKATA :'}}</div>
                                </div>
                                @foreach($data as $value)
                                <!--WRAP kurs 2 + CUM LAUDE-->
                                <div class="col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0 kurs-row">
                                    <div class="col-xs-6 kurs-change"> {{($jezik == 'engleski')? $value->title_eng:$value->title_srp}} </div>
                                    <div class="col-xs-3 broj-sert-change">{{$value->certificate_number}}</div>
                                    <div class="col-xs-3 text-center wrap-img-cumLaude"> <img class="img-cumLaude-change"  src="{{($value->cum_laude == 1)?'/templates/sertifikat/images/cum-laude.png':''}}" alt=""> </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!--dugme nazad-->
                        <div class="col-sm-12  text-center dugme-nazad-wrap">

                            <div class="row">
                                <div class="col-md-4 col-md-offset-2">
                                    <a href="{{route('odrasli',['jezik'=>$jezik,'broj'=>$broj])}}"><button class="dugme-nazad"> <i class='far fa-hand-point-left'></i>&nbsp; {{($jezik == 'engleski')?'Back to CERTIFICATE ':'Nazad na SERTIFIKAT '}}</button></a>
                                </div>
                                <div class="col-md-4">
                                    <button  class="dugme-nazad nazad-pocetna"> <i class='far fa-hand-point-left'></i>&nbsp;{{($jezik == 'engleski')?' Back to Homepage ':'Nazad na početnu'}}</button>
                                </div>
                            </div>
                        </div>
                        <!--end of wrapper-->
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </div>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d52119044698c48"></script>
    </body>
</html>
