<!DOCTYPE html>
<html lang="en">
<head>
    <title>আগামির সময় | যখনই ঘটনা তখনই সংবাদ</title>
{{--    <title>@yield('title')</title>--}}
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{$Seo[0]['description']}}">
    <meta name="keywords" content="{{$Seo[0]['keywords']}}">
    <meta name="author" content="Kidarkar it solution">
    <meta property="og:site_name" content="{{$Seo[0]['title']}}">
    <meta property="og:title" content="{{$Seo[0]['share_title']}}">
    <meta property="og:description" content="{{$Seo[0]['description']}}">
    <meta property="og:image" content="{{ isset($newsInfo) && $newsInfo->image ? $newsInfo->image : 'https://agamirsomoy.com.bd/img/default-image.jpg?v=1.0' }}">
    <meta property="og:image:alt" content="{{ isset($newsInfo) && $newsInfo->title ? $newsInfo->title : 'Agamir Somoy Default Image' }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:secure_url" content="{{$Seo[0]['page_img']}}"/>
    <meta property="og:image:type" content="image/jpeg" /> 
     <!-- <meta property="og:image" content="{{ isset($newsInfo) ? $newsInfo->image : ''}}"> -->
    <!--{{$Seo[0]['page_img']}}-->
    <meta property="og:type" content="website" data-react-helmet="true">
    <meta property="og:url" content="{{ $canonical ?? url()->current() }}">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ $canonical ?? url()->current() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@100;200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    {{--    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{asset('css/responsive.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/fontawesome.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/animate.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/datatables.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/toastr.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/lightbox.css') }}" rel="stylesheet" type="text/css">
    <!--slider-->
    <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/css/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="icon" type="image/x-icon" href="{{asset('img/favicon.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0-beta.2/css/lightgallery-bundle.min.css" integrity="sha512-91yJwfiGTCo9TM74ZzlAIAN4Eh5EWHpQJUfvo/XhpH6lzQtiRFkFRW1W+JSg4ch4XW3/xzh+dY4TOw/ILpavQA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link href="{{asset('css/style.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/responsive.css') }}" rel="stylesheet" type="text/css" >
<style>

#exampleImage { cursor:zoom-in; }
#exampleImage:-webkit-full-screen { cursor:zoom-out; }
#exampleImage:-moz-full-screen { cursor:zoom-out; }
#exampleImage:-ms-fullscreen { cursor:zoom-out; }
#exampleImage:fullscreen { cursor:zoom-out; }


.image-container {
  position: relative;
  display: inline-block;
}

.image-container img {
  cursor: pointer;
}

.image-container .caption {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  background-color: rgba(0, 0, 0, 0.7);
  color: #fff;
  padding: 10px;
  text-align: center;
  opacity: 0;
  transition: opacity 0.3s ease;
}

.image-container:hover .caption {
  opacity: 1;
}
#trendingItems a {
    padding: 0px 5px !important;
    line-height: 1.4;
}

.navbar-expand-md .navbar-nav .dropdown-menu{
z-index: 9999;
}
/*slider*/
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

/*.active {*/
/*  background-color: #717171;*/
/*}*/

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>
    <script src="https://breakingnews.com.bd/js/jquery.min.js"></script>
{{--    <script src="https://breakingnews.com.bd/"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
{{--    Light Gallery--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0-beta.2/lightgallery.umd.min.js" integrity="sha512-e+39qUKXdaNAHHzMx+zHLald62YcdVqJpJGAqs6iIJ6RRWy5/9PKJr1eDAc3SuM/PTpguz9v2d83j6SFgnbTdg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0-beta.2/plugins/zoom/lg-zoom.min.js" integrity="sha512-YlxbbxLYdFLtzK1ly6wGbe3lCbFVJQK6p0YOtiW4Ebon7mNJ9ORBzUwOEzQOCC9T+efgMYQP+Rtw3BZTD5ql0Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0-beta.2/plugins/video/lg-video.min.js" integrity="sha512-qM1isaAXKJADabHma45LqQZ5X/nwUasZf3yZCgAeTM8qpm/92MiHR5G/Agr72QEzVQaZyFsnEV3NWCukkvV6hA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/config.js')}}"></script>
    <script src="{{asset('js/datatables.min.js') }}"></script>
    <script src="{{asset('js/moment.js')}}"></script>
    <script src="{{asset('js/bangla-date.js')}}"></script>
    <script src="{{asset('js/lightbox.js')}}"></script>
     <!--slider-->
     <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
    <style>
    #hidden {
    z-index:9999;
    display:none;
    background-color:#fff;
    position:fixed;
    height:100%;
    width:100%;
    left: 0px;
    top: 0px;    
    text-align: center;
}
.close {
    position: absolute;
    right: 0px;
    top: 0px;
    background: #000;
    color: #fff;
    cursor: pointer;
    width: 30px;
    height: 30px;
    text-align: center;
    line-height: 30px;
}
      /* @font-face {
            font-family: SolaimanLipi;
            src: url({{asset("font/SolaimanLipi.ttf")}})

        }*/
        /*single news qutation*/
.news-description h5 {
    background: #C2DAF5;
    margin-bottom: 0;
    padding: 12px 15px;
}
.news-description h5 span span {
    background: transparent !important;
}
.news-description ul {
    background: #EEF6FF;
}
.news-description ul li a {
    background-color: transparent !important;
    text-decoration: none;
    color: #666 !important;
    font-size: large;
    font-weight: bold;

}
.news-description ul li {
    padding: 10px 0;
}
.news-description ul {
    background: #EEF6FF;
    padding: 20px 20px 20px 52px !important;
}

.menu {
  /*background-color: #cccccc;*/
  /*border: 1px solid black;*/
  padding: 3px;
  width: 100%;
  white-space: nowrap;
  overflow: auto;
 
}

.item,
.left,
.right {
  /*border: 1px solid dodgerblue;*/
  padding: 4px;
  display: inline-block;
  /*background-color: #ffffff;*/
}
/* Hide scrollbar for Chrome, Safari and Opera */
.menu::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.menu {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
#BGD1806,#BGD2432,#BGD2475,#BGD2476,#BGD2488,#BGD3255,#BGD5492{
            fill: #14C38E;
            z-index: -1;
            cursor: pointer;
            transition: all .05s ease-in-out;
        }
        #BGD1806:hover,#BGD2432:hover,#BGD2475:hover,#BGD2476:hover,#BGD2488:hover,#BGD3255:hover,#BGD5492:hover{
            fill: #FF4433;
        }
#LifeStyleLeadNews a div .hour {display: none;}
    </style>

         <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-L27S2VGEM7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-L27S2VGEM7');
</script>

      <script>
          let front_url = "http://127.0.0.1:8000";
      </script>
     
</head>
<body>
    <div id="BodyLoader">
        <div class="loader d-flex flex-column justify-content-center">
           <img height="60" class="loading-image" src="https://cdn.dribbble.com/userupload/28414326/file/original-4b18b85e88ae44252abb50abaf9fbf54.gif" alt="Loading...">
           <img height="30" src="https://agamirsomoy.com/wp-content/uploads/2025/07/cropped-454633302_461238853404404_8007774871550232398_n.jpg" alt="Agamir Somoy Logo">
        </div>
    </div>



    @include('Layout.sitelead')
    @include('Layout.topmenu')
    @yield('trending')
    @yield('content')
    @include('Layout.footer')
    @include('Layout.sidemenu')


{{--    <button id="toast-btn">Click me</button>--}}

<script>
    function autoRefresh() {
        window.location = window.location.href;
    }
    setInterval('autoRefresh()', 600000);
</script>
<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  
  // Check if slides exist
  if (!slides || slides.length === 0) {
    return; // Exit if no slides
  }
  
  for (i = 0; i < slides.length; i++) {
    if (slides[i]) {
      slides[i].style.display = "none";  
    }
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    if (dots[i]) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
  }
  
  // Check if slideIndex-1 is valid before accessing
  if (slides[slideIndex-1]) {
    slides[slideIndex-1].style.display = "block";  
  }
  if (dots[slideIndex-1]) {
    dots[slideIndex-1].className += " active";
  }
  
  setTimeout(showSlides, 4000); // Change image every 2 seconds
}
</script>


</body>
</html>