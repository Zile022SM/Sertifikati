@extends('templates.frontend.layout-search') 

@section('seo-title')
<title>Sertifikat | Edukativni centar Procoding</title>
@endsection 

@section('custom-css')
<link rel="stylesheet" href="/templates/sertifikat/css/sertifikat-login.css" />
@endsection 

@section('custom-js')
<!-- SCRIPT -->
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
@endsection 

@section('content')
<!--DIV left-corner-->
<div class="col-xs-10   left-corner"> <img src="/templates/sertifikat/images/sertifikat-gore.jpg" class="img-responsive img-sert"> </div>
<!--DIV LOGO-->
<div class="col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2 logo"> <img src="/templates/sertifikat/images/logo.png" class="img-responsive"> </div>
<!--div unos-->

<form method="post" action="" id="form-login">
    @csrf
    <!--div unos-->
    <div class="col-sm-4 col-sm-offset-4   col-xs-10 col-xs-offset-1  login {{$errors->has('certificate_number')?' has-error':''}}">
        <input name="certificate_number" value="{{old('certificate_number')}}" type="text" placeholder="Unesi broj sertifikata..."  class="unos">
        @if($errors->has('certificate_number'))
        <span class="help-block text-danger">{{$errors->first('certificate_number')}}</span>
        @endif
    </div>
    
    <!--div dugme-->
    <div class="col-sm-2 col-sm-offset-5   col-xs-6 col-xs-offset-3 text-center div-search" onClick=" document.getElementById('form-login').submit()">
        <div class="col-md-10 col-sm-offset-1 bg-warning div-search-inner"> <i class="fas fa-search fa-lg"></i> </div>
    </div>

</form>

<!--div right-corner-->
<div class="col-xs-10 col-xs-offset-2  right-corner"> <img src="/templates/sertifikat/images/sertifikat-dole.jpg" class="img-responsive img-sert"> </div>
<!--end of wrapper-->

@endsection 

@section('custom-js')

@endsection 