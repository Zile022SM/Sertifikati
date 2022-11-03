@extends('templates.frontend.layout_it_za_decu') 

@section('seo-title')
<title>Deca otkrivaju svet programiranja | IT ZA DECU</title>
@endsection  

@section('description')
<meta name="description" content="Na sajtu IT ZA DECU bićete u prilici da pratite aktuelne edukativne članke  i razne zanimljivosti iz oblasti informacionih tehnologija. Naš zadatak jeste da vam početne korake u svetu programiranja u potpunosti približimo i pomognemo da steknete što celovitiju sliku kada je reč o zanimanju budućnosti. "><!--nije-->
@endsection  

@section('slider')
<!-- revolution slider -->
<link rel="stylesheet" href="{{url('/templates/it_za_decu/css/extralayers.css')}}" /><!--nije-->
<link rel="stylesheet" href="{{url('/templates/it_za_decu/css/settings.css')}}" /><!--nije-->
@endsection  

@section('content')
<main>
    <!-- Slider section -->
    <section id="myCarousel">
        <div class="tp-banner-container">
            <div class="revolution-slider-full">
                <ul class="ul-slider">
                    <!-- SLIDE  1 -->
                    <li  data-transition="random-premium" data-thumb=""  data-masterspeed="1200"    data-title="Slide"  data-slotamount="1" data-saveperformance="off" class="slide-1">
                        <!-- MAIN IMAGE -->
                        <img src="{{url('/templates/it_za_decu/images/back-1.jpg')}}" class="img-responsive"   alt="deca istražuju svet programiranja"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" >
                        <!-- LAYERS 1 -->
                        <div class=" tp-caption light_medium_30_shadowed lfb ltt tp-resizeme layer-1"

                             data-x="center" data-hoffset="0"
                             data-y="center" data-voffset="-150"
                             data-speed="600"
                             data-start="800"
                             data-easing="Power4.easeOut"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="500"
                             data-endeasing="Power4.easeIn"

                             style="z-index: 2;"> Tvoj omiljeni predmet je računarstvo i informatika?  Voleo bi da postaneš programer? </div>
                        <!-- LAYER 2 -->
                        <div class=" col-xs-12 tp-caption light_heavy_70_shadowed lfb ltt tp-resizeme layer-2"
                             data-x="center" data-hoffset="0"
                             data-y="center" data-voffset="-80"
                             data-speed="600"
                             data-start="900"
                             data-easing="Power4.easeOut"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="500"
                             data-endeasing="Power4.easeIn"
                             style="z-index: 3;"> Otkrivajmo zajedno svet programiranja! </div>
                        <!-- LAYER 3 -->
                        <div class=" col-xs-12  text-center tp-caption customin tp-resizeme rs-parallaxlevel-0"
                             data-x="center" data-hoffset="0"
                             data-y="center" data-voffset="0"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="500"
                             data-start="1200"
                             data-easing="Power3.easeInOut"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.1"
                             data-endelementdelay="0.1"
                             data-linktoslide="next"
                             style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;"><a href='{{route('baza')}}' class='largeredbtn inner-link dugme-slajder'>baza znanja</a> </div>
                    </li>
                    <!-- SLIDE 2 -->
                    <li  data-transition="random-premium" data-thumb="" data-masterspeed="1200"  data-title="Slide" data-slotamount="1"       data-saveperformance="off"   class="slide-2">
                        <!-- MAIN IMAGE -->
                        <img src="{{url('/templates/it_za_decu/images/back-2.jpg')}}"     alt="programski jezici - python, scratch"   data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" >
                        <!-- LAYERS 1 -->
                        <div  class="tp-caption light_medium_30_shadowed lfb ltt tp-resizeme layer-1"

                              data-x="center" data-hoffset="0"
                              data-y="center" data-voffset="-160"
                              data-speed="600"
                              data-start="800"
                              data-easing="Power4.easeOut"
                              data-splitin="none"
                              data-splitout="none"
                              data-elementdelay="0.01"
                              data-endelementdelay="0.1"
                              data-endspeed="500"
                              data-endeasing="Power4.easeIn"

                              style="z-index: 2;"> Zanimaju te novosti iz оblasti programiranja? </div>
                        <!-- LAYER 2 -->
                        <div class="tp-caption light_heavy_70_shadowed lfb ltt tp-resizeme layer-2"
                             data-x="center" data-hoffset="0"
                             data-y="center" data-voffset="-70"
                             data-speed="600"
                             data-start="900"
                             data-easing="Power4.easeOut"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="500"
                             data-endeasing="Power4.easeIn"
                             style="z-index: 3;"> Prati aktuelne članke o najpopularnijim <span class="span-br"><br>
                            </span> programskim jezicima </div>
                        <!-- LAYER 3 -->
                        <div class="text-center tp-caption customin tp-resizeme rs-parallaxlevel-0"
                             data-x="center" data-hoffset="0"
                             data-y="center" data-voffset="30"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="500"
                             data-start="1200"
                             data-easing="Power3.easeInOut"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.1"
                             data-endelementdelay="0.1"
                             data-linktoslide="next"
                             style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;"><a href='{{route('zanimljivosti')}}' class='largeredbtn inner-link dugme-slajder'>it zanimljivosti</a> </div>
                    </li>
                </ul>
                <div class="tp-bannertimer"></div>
            </div>
        </div>
    </section>
    <!-- h1 section -->
    <section class=" page-title page-title-small  wrap-h1">
        <div class="container">
            <div class="row">
                <div class="col-md-12  col-sm-12 text-center ">
                    <!-- h1 -->
                    <h1 class="h1-custom">Deca i programiranje - dobrodošli na sajt <br>
                        "IT ZA DECU"</h1>
                    <!-- end h1 -->
                </div>
            </div>
        </div>
    </section>
    <!-- end h1 section -->
    <!-- content section -->
    <section class="section-content">
        <div class="container">
            <div class="row row-wrap-content">
                <!-- content  -->
                <div class="blog-details-text  col-md-11 col-md-offset-1   col-sm-8 wrap-content">
                    <div class="row">
                        <div class="col-md-8 wrap-p-custom-first">
                            <p class="p-custom">Odavno je jasno  da <strong class="strong-custom">zanimanje programera postaje sve zastupljenije</strong> u  svetu, ali i kod nas. <br>
                                <br>
                                Kod dece, kao i kod njihovih roditelja postoje brojne nedoumice i brojna pitanja kao što su: Kada i gde početi sa učenjem programiranja?... Sa kojim programskim jezicima početi? i slično...</p>
                        </div>
                        <div class="col-md-4 wow fadeInUp"><img src="{{url('/templates/it_za_decu/images/mali-programer-2.png')}}" alt="decak sedi za računarom"></div>
                    </div>
                    <h2 class="blog-details-headline h2-custom"> kome je namenjen sajt it za decu? </h2>
                    <!-- end h2  -->
                    <p class="p-custom"><strong class="strong-custom">IT ZA DECU namenjen je kako našim najmladjim budućim programerima i njihovim roditeljima</strong>, tako i svima onima koji bi možda želeli da  se oprobaju i naprave svoje prve programerske korake, te u tom cilju bi želeli da se bliže upoznaju sa nekim osnovnim    pojmovima i steknu elementarna predznanja iz sveta programiranja. </p>
                    <!-- h2  -->
                    <h2 class="blog-details-headline h2-custom"> Kako  se postaje programer? </h2>
                    <div class="col-md-3 wow fadeInUp"> <img src="{{url('/templates/it_za_decu/images/mali-programer.png')}}" alt="decak uči programiranje"> </div>
                    <!-- end h2  -->
                    <p class="p-custom">Treba imati u vidu da se <strong class="strong-custom">programer ne moze postati preko noći</strong>, već je potrebno uložiti puno vremena i kontinuirano se usavrašavati.  


                        Sektor informaciono-komunikacionih tehnologija, <a  class="a-custom"  href="https://www.srbija.gov.rs/"> Vlada Republike Srbije</a> prepoznala je kao jedan od najvećih razvojnih potencijala Srbije. 
                        Zato je programiranje kao obavezan predmet uvedeno i u osnovne škole, počev od petog razreda. <br>
                        <br>
                        Pored zvaničnog obrazovanja, postoje i  specijalizovani edukativni centri koji decu uče osnovama programiranja još od najranijih uzrasta – predškolskog, te omogućavaju i kontinuirano usavršavanje u ovoj oblasti tokom celog školovanja  - <a  class="a-custom" href="https://www.procoding.rs/">Edukativni centar Procoding</a>.<br>
                        Takodje postoje i <a  class="a-custom" href="www.iths.edu.rs">specijalizovane srednje škole za informacione tehnologije</a> </p>
                    <!-- h2  -->
                    <h2 class="blog-details-headline h2-custom"> šta vas očekuje na našem sajtu? </h2>
                    <!-- end h2  -->
                    <p class="p-custom last-p"> Na sajtu IT ZA DECU bićete u prilici da pratite <a  class="a-custom"  href="baza-znanja.html">aktuelne edukativne članke</a> i razne <a  class="a-custom"  href="it-zanimljivosti.html">zanimljivosti iz oblasti informacionih tehnologija</a>.<br>
                        Naš zadatak jeste da vam početne korake u svetu programiranja u potpunosti približimo i pomognemo da steknete što celovitiju sliku kada je reč o zanimanju budućnosti.</p>
                    <p class="text-center" style=" color:#f7942e; margin:0"> SHARE:</p>
                    <div class="col-md-12 text-center">
                        <div class="addthis_inline_share_toolbox div-share" style=" display:inline"></div>
                    </div>
                </div>
                <!-- end content  -->
            </div>
        </div>
    </section>
    <!-- end content section -->
</main>
@endsection 