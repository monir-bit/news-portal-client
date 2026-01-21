<div id="footer" class="bg-light pt-3 pb-3 mt-3 section-container border-top border-bottom">

    <div class="footer-area row align-items-center justify-content-between">
        <div class="col-12 col-md-12 border-md-bottom text-center mb-2" style="font-size: 20px;font-weight: bold;">
            {{env("ADDRESS_LINE2")}}, {{env("ADDRESS_LINE1")}}
        </div>
        <br>

        <div class="col-12 col-md-12 border-md-bottom text-center mb-2">
            {{env("ADDRESS_LINE3")}}

        </div>
        
        <div class="col-12 col-md-12 text-center">
            নিউজ রুম ও বিজ্ঞাপণ নম্বর : <i class="fas fa-phone"></i> <span>{{env("CONTACT_NO1")}}</span> 
            <i class="fab fa-whatsapp"></i> <span>{{env("WHATSAPP_NO")}}</span>
            <br /><i class="fas fa-envelope"></i> <span>{{env("EMAIL")}}</span>
        </div>
        
        <div class="col-12 col-md-12 border-md-bottom text-center">
            <a style="font-size: 14px;" class="link f-18" href="/privacy-policy">গোপনীয়তার নীতি</a> | 
            
            <a style="font-size: 14px;" class="link f-18" href="/terms-and-condition">ব্যবহারের শর্তাবলি</a> | 
            
            <a style="font-size: 14px;" class="link f-18" href="/about">আমাদের সম্পর্কে</a> | 
            
             <a style="font-size: 14px;" class="link f-18" href="/we">আমরা</a> | 
            
            <a style="font-size: 14px;" class="link f-18" href="/communication">যোগাযোগ</a>   | 
            
            <a style="font-size: 14px;" class="link f-18" href="/Archive">আর্কাইভ</a>  | 
            
            <a style="font-size: 14px;" class="link f-18" href="/advertise">বিজ্ঞাপন</a>
        </div>
        <div class="col-12 col-md-12 mb-md-3 border-md-bottom">
            <ul class="footer-list d-flex justify-content-center">
                <li class="footer-list-item float-start float-md-none">
                    <a style="font-size: 14px;" class="link f-18" href="{{env("FACEBOOK_URL")}}">
                        <i class="fab fa-facebook"></i>
                        <span></span>
                    </a>
                </li>
                <li class="footer-list-item float-start float-md-none">
                    <a style="font-size: 14px;" class="link f-18" href="{{env("TWITTER_URL")}}">
                        <img height="11px" src="{{URL('/')}}/img/t.png" alt="twitter">
                        <span></span>
                    </a>
                </li>
                <li class="footer-list-item float-start float-md-none">
                    <a style="font-size: 14px;" class="link f-18" href="{{env("YOUTUBE_URL")}}">
                        <i class="fab fa-youtube"></i>
                        <span></span>
                    </a>
                </li>
                <li class="footer-list-item float-start float-md-none">
                    <a style="font-size: 14px;" class="link f-18" href="{{env("LINKEDIN_URL")}}">
                        <i class="fab fa-linkedin"></i>
                        <span></span>
                    </a>
                </li>
                <li class="footer-list-item float-start float-md-none">
                    <a style="font-size: 14px;" class="link f-18" href="{{env("INSTRAGRAM_URL")}}">
                        <i class="fab fa-instagram"></i>
                        <span></span>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</div>
