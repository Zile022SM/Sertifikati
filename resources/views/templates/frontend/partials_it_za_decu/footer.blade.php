<!-- footer -->
<footer class="footer">
    <div class="container footer-middle" style=" padding-top:0">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12 text-center sm-text-center  footer-links-wrap" id="myDIV">
                <!-- link -->
                <ul class="list-inline footer-link text-uppercase">
                    <li class="mainNav-li footer-nav-li"><a href="{{route('homepage')}}" class="mainNav-a footer-nav-a {{($page == 'pocetna')? 'footer-nav-a-active' : '' }}"><i class="{{($page == 'pocetna')? 'fa fa-check-square-o':''}}" style="{{($page == 'pocetna')?'color:#1a98d5':''}}"></i>It za decu</a> </li>
                    <li class="mainNav-li footer-nav-li"><a href="{{route('baza')}}" class="mainNav-a footer-nav-a {{($page == 'baza')? 'footer-nav-a-active' : '' }}"><i class="{{($page == 'baza')? 'fa fa-check-square-o':''}}" style="{{($page == 'baza')?'color:#1a98d5':''}}"></i>Baza znanja</a> </li>
                    <li class="mainNav-li footer-nav-li"><a href="{{route('zanimljivosti')}}" class="mainNav-a footer-nav-a {{($page == 'zanimljivosti')? 'footer-nav-a-active' : '' }}"><i class="{{($page == 'zanimljivosti')? 'fa fa-check-square-o':''}}" style="{{($page == 'zanimljivosti')?'color:#1a98d5':''}}"></i>It zanimljivosti</a> </li>
                </ul>
            </div>
     
            <div class="col-md-5 col-sm-12 footer-social text-right sm-text-center footer-social-wrap">
                <!-- social media link -->
                <a href="https://www.facebook.com/centarprocoding/" class="btn social-icon social-icon-medium button" target="_blank"> <i class="fa fa-facebook"></i></a> <a href="https://www.youtube.com/channel/UCB-9j-ZWLvjXz35oefFOJ_A/" class="btn social-icon social-icon-medium button" target="_blank"> <i class="fa fa-youtube"></i></a> <a href="https://www.instagram.com/procoding_/" class="btn social-icon social-icon-medium button" target="_blank"><i class="fa fa-instagram"></i></a>
                <!-- end social media link -->
            </div>
            <div class="col-md-5 tel-mail-mob text-center"> <a  target="_blank" title="Instagram profil  'Procoding'" href="tel:+381621513644"  class="tel-mob"> <i class="fa fa-phone" style="color:#f7942e"></i> 062 / 151-36-44</a> <a target="_blank" title="Instagram profil  'Procoding'" href="info@procoding.rs" class="mail-mob"> <i class="fa fa-envelope" style="color:#f7942e"></i> info@procoding.rs</a> </div>
        </div>
    </div>
    <div class="container-fluid  footer-bottom">
        <div class="container">
            <div class="row margin-three">
                <!-- copyright -->
                <div class="col-md-12 col-sm-12 col-xs-12 copyright text-center letter-spacing-1 xs-text-center xs-margin-bottom-one white-text"> &copy; 2019 IT ZA DECU - <span class="text-lowercase">member of procoding group </span></div>
                <!-- end copyright -->
            </div>
        </div>
    </div>
    <!-- scroll to top -->
    <a href="#top" class="scrollToTop" style="background:#f7942e;"><i class="fa fa-angle-up"></i></a>
    <!-- scroll to top End... -->
</footer>
<!-- end footer -->
<!-- ******************************************************END OF  FOOTER ************************************************************-->
<!-- javascript libraries / javascript files set #1 -->
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

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<!-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d627d201aba4b31"></script>   -->