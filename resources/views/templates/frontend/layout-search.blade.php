<!DOCTYPE html>
<html lang="sr-rs">
<head>
@yield('seo-title')

@include('templates.frontend.partials_search.head')

@yield('custom-css')

@yield('custom-js')

</head>
<body>
<!--start container-->
<div class="container">
  <div class="row">
    <!--DIV Wrapper-->
    <div class="col-xs-10 col-xs-offset-1 wrapper">
        @yield('content')
    </div>
    <!--end of row-->
  </div>
  <!--end of container-->
</div>

@yield('custom-js')

