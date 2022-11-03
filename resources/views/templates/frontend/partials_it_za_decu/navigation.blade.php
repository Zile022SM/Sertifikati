<!-- navigation panel -->
<nav class="navbar navbar-default navbar-fixed-top nav-transparent  sticky-nav nav-border-bottom nav-light-transparent" role="navigation">
    <div class="container container-custom">
        <div class="row" >
            <!-- logo -->
            <div class="col-md-2 col-sm-3 col-xs-7 wrap-logo"> <a  href="index.html"> <img class="logo-img img-responsive" alt="logo - It za decu" src="{{url('/templates/it_za_decu/images/logo.png')}}"/></a> </div>
            <!-- end logo -->
            <!-- main menu -->
            <div class="col-md-5  accordion-menu">
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav mainNav-ul">
                        <li class="mainNav-li"><a href="{{route('homepage')}}" class="mainNav-a {{($page == 'pocetna')? 'a-active' : '' }}">It za decu</a> </li>
                        <li class="mainNav-li"><a href="{{route('baza')}}" class="mainNav-a {{($page == 'baza')? 'a-active' : '' }}">Baza znanja</a> </li>
                        <li class="mainNav-li"><a href="{{route('zanimljivosti')}}" class="mainNav-a {{($page == 'zanimljivosti')? 'a-active' : '' }}">It zanimljivosti</a> </li>
                    </ul>
                </div>
            </div>
            <!-- end main menu -->
            <!-- nav social-links-->
            <div class="col-md-5 col-sm-7 col-xs-3 wrap-soc-links text-left"> <a target="_blank" title="Facebook stranica  'Procoding'" href="https://www.facebook.com/centarprocoding/" class="link-social"><i class="fa fa-facebook" aria-hidden="true"></i></a> <a target="_blank" title="YouTube kanal  'Procoding'" href="https://www.youtube.com/channel/UCB-9j-ZWLvjXz35oefFOJ_A/" class="link-social"><i class="fa fa-youtube" aria-hidden="true"></i></a> <a target="_blank" title="Instagram profil  'Procoding'" href="https://www.instagram.com/procoding_/" class="link-social"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a  target="_blank" title="Telefon  'Procoding'" href="tel:+381621513644"  class="link-social tel-header"> 062 / 151-36-44</a> <a target="_blank" title="Email  'Procoding'" href="mailto:info@procoding.rs" class="link-social mail-header"> info@procoding.rs</a>

            </div>
            <!-- end social-links -->
            <!-- end search and cart-->
            <!-- toggle navigation -->
            <div class="navbar-header col-sm-1 col-sm-offset-0 col-xs-2 col-xs-offset-3">
                <button type="button" class="navbar-toggle dugme-navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            <!-- toggle navigation end -->
        </div>
    </div>
</nav>
<!-- end navigation panel -->