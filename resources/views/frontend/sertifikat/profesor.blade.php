<!DOCTYPE html>
<html lang="sr-rs">
<head>
<title>Profesori | Edukativni centar Procoding</title>
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
<link rel="stylesheet" href="/templates/sertifikat/css/profesori.css" />
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
            <a href="{{route('sertifikat-profesor',['profesor'=>$profesor->id,'jezik'=>'srpski'])}}"><div class="col-sm-3  col-sm-offset-3   col-xs-5   div-srb"> <img src="/templates/sertifikat/images/srb.jpg" class="img-responsive img-lang" title="SERBIAN" alt="zastava Srbija" > </div></a>
            <a href="{{route('sertifikat-profesor',['profesor'=>$profesor->id,'jezik'=>'engleski'])}}"><div class=" col-sm-3 col-xs-5  div-eng"> <img src="/templates/sertifikat/images/eng.jpg" class="img-responsive img-lang" title="ENGLISH" alt="zastava Engleska" > </div></a>
        </div>
      </div>
      
      <!--profesor-->
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1  wrap-all">
          <div class="col-md-12 wrap-left-right">
            <!--left-block-->
            <div class="col-sm-5 left-block-1"> <img src="{{$profesor->getImage('m')}}" class="img-responsive profesorSlika-change" alt="profesor profil">
              <div class="col-md-10 col-md-offset-1 text-center left-block-2">
                  {{($jezik == 'engleski')?$profesor->title_eng:$profesor->title_srp}} 
                  {{$profesor->name}} {{$profesor->surname}}
              </div>
            </div>
            <!--right-block-->
            <div class="col-sm-7 right-block">
              {!!($jezik == 'engleski')?$profesor->description_eng:$profesor->description_srp!!}
            </div>
          </div>
        </div>
      </div>
      <!--dugme nazad-->
      <div class="row">
        <div class="col-sm-12  text-center dugme-nazad-wrap">
        <button class="dugme-nazad"> <i class='far fa-hand-point-left' style='font-size:18px'></i>&nbsp; {{($jezik == 'engleski')?' Back to Homepage ':'Nazad na početnu'}}</button>
        </div>
      </div>
      <!--end of wrapper-->
    </div>
    <!--end of row-->
  </div>
  <!--end of container-->
</div>
</body>
</html>
