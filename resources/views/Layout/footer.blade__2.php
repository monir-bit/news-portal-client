

<div style="border-top-width: 2px!important;" class="d-flex p-2 justify-content-center border-top border-bottom mt-2 bg-white" id="sompadok">
    <h4 class="m-0">{{env("ADDRESS_LINE1")}}</h4>
</div>
<div id="footer" class="bg-light pt-3 pb-3 mt-3 section-container border-top border-bottom">

    <div class="footer-area row align-items-center justify-content-between">
       {{-- <div class="col-12 col-md-12 d-flex justify-content-center">
            <div style="" class="  row ">
              
                
                <div style=" font-size: 14px;" class="col ">

                    <i class="fas fa-phone" ></i>
                    <span>{{env("CONTACT_NO1")}}</span>
                </div>
            
                <div style=" font-size: 14px;" class=" col ">
                    <i class="fas fa-mobile" ></i>
                    <span>{{env("CONTACT_NO2")}}</span>
                </div>
                <div style=" font-size: 14px;" class="col">
                    <i class="fab fa-whatsapp" ></i>
                    <span>{{env("WHATSAPP_NO")}}</span>
                </div>
           
                
            </div>
        </div>--}}
        <div class="col-12 col-md-12 border-md-bottom">
            <ul class="footer-list d-flex justify-content-center ">
                <li class="footer-list-item float-start float-md-none">
                    <a style="font-size: 14px;" class="link f-18" href="/privacy-policy">গোপনীয়তার নীতি</a>
                </li>
                <li class="footer-list-item float-start float-md-none">
                    <a style="font-size: 14px;" class="link f-18" href="/terms-and-condition">ব্যবহারের শর্তাবলি</a>
                </li>
                <li class="footer-list-item float-start float-md-none">
                    <a style="font-size: 14px;" class="link f-18" href="/about">আমাদের সম্পর্কে</a>
                </li>
                <li class="footer-list-item float-start float-md-none">
                    <a style="font-size: 14px;" class="link f-18" href="/we">আমরা</a>
                </li>
                <li class="footer-list-item float-start float-md-none">
                    <a style="font-size: 14px;" class="link f-18" href="/communication">যোগাযোগ</a>
                </li>
                {{--<li class="footer-list-item float-start float-md-none">
                    <a style="font-size: 14px;" class="link f-18" href="/Archive">আর্কাইভ</a>
                </li>--}}
                <li class="footer-list-item float-start float-md-none">
                    <a style="font-size: 14px;" class="link f-18" href="/advertise">বিজ্ঞাপন</a>
                </li>
            </ul>
        </div>
        <div class="col-12 col-md-12 mb-md-3 border-md-bottom">
            <ul class="footer-list d-flex justify-content-center">
                <li class="footer-list-item float-start float-md-none">
                    <a style="font-size: 14px;" class="link f-18" href=" https://www.facebook.com/bnbd247
">
                     <img height="20px" src="{{asset("img/f.png")}}" alt="site logo">
                        <span>ফেসবুক</span>
                    </a>
                </li>
                <li class="footer-list-item float-start float-md-none">
                    <a style="font-size: 14px;" class="link f-18" href="https://twitter.com/bnbd247">
                      <img height="20px" src="{{asset("img/t.png")}}" alt="site logo">
                        <span>টুইটার</span>
                    </a>
                </li>
                <li class="footer-list-item float-start float-md-none">
                    <a style="font-size: 14px;" class="link f-18" href="https://www.youtube.com/@bnbd247
">
                      <img height="20px" src="{{asset("img/y.png")}}" alt="site logo">
                        <span>ইউটিউব</span>
                    </a>
                </li>
                <li class="footer-list-item float-start float-md-none">
                    <a style="font-size: 14px;" class="link f-18" href="{{env("LINKEDIN_URL")}}">
                       <img height="20px" src="{{asset("img/l.png")}}" alt="site logo">
                        <span>লিঙ্কড ইন</span>
                    </a>
                </li>
                <li class="footer-list-item float-start float-md-none">
                    <a style="font-size: 14px;" class="link f-18" href=" https://www.instagram.com/bnbd247
">
                       <img height="20px" src="{{asset("img/i.png")}}" alt="site logo">
                        <span>ইন্সট্রাগ্রাম</span>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</div>