@extends('Layout.app')
@section('title', "Home")


@section('content')
    <div class="section-container mt-2">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-7 col-lg-8 col-xl-9">
            {{--   <ul class="breadcrumb">
                    
                    <li class="breadcrumb-item f-20"><a href="#" id="b-category">প্রচ্ছদ</a></li>
                   <li class="breadcrumb-item f-20" id="b-sub-category"><a href="#">জাতীয়</a></li>
                </ul>  --}}

                <div id="news" class="mt-3">
                
                </div>
                <hr class="mb-3">
                <h2>এ সম্পর্কিত আরও খবর</h2>
               
                <div id="relatedNews" class="row">

                </div>
                
               <div class="fb-comments" data-href="" data-width="" data-numposts="5"></div>
            </div>

            <div class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-3">
                <div class="position-sticky sticky-lg-top sticky-xl-top">
                    <!--               Advertise   --->
                    <div id="single_news_page_right_add" class="advertise mt-4 mb-3 text-center overflow-hidden">

                    </div>


                    <div class="Title pt-2 pb-2 border-bottom border-top border-dark">
                        <h3 class="m-0">এ সপ্তাহের পাঠক প্রিয়</h3>
                    </div>

                    <div class="card titleNews2 mt-2 border-left border-right1" id="RelatedNews">

                    </div>
                </div>
            </div>
        </div>
        <div id="relatedNews" class="row">

        </div>
        
    </div>
    {{--<div class="row section-container  mt-5">
    <iframe src="https://widget.bongobd.com/widget?platform=abfea462-f64d-491e-9cd9-75ee001f45b0&widget=breakingnews&partner=breakingnews" width="100%" height="400" frameborder="0"></iframe>
</div>--}}
   <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v18.0" nonce="ZCsi6547"></script>
   <script>
    $(document).ready( function() { $(".fb-comments").attr("data-href", window.location.href.split('?')[0]); });
</script>
    <script>

        Advertise('/advertise/single_news_page_right_add',$('#single_news_page_right_add'))



        let getUrl = MakeUrlFromBrowserUrlSegment()
        // Parse URL segments: /{categorySlug}/{subcategorySlug}/{newsSlug} or /{categorySlug}/{newsSlug}
        let urlSegments = getUrl.split('/').filter(segment => segment !== '');
        let categorySlug = urlSegments[0] || '';
        let subcategorySlug = urlSegments[1] || null;
        let newsSlug = urlSegments[2] || urlSegments[1] || '';
        
        // If 2 segments, check if second is subcategory or news slug
        if (urlSegments.length === 2) {
            // Assume it's news slug (without subcategory)
            newsSlug = urlSegments[1];
            subcategorySlug = null;
        }
        
        // Build API URL (slug-based format)
        let apiUrl = '';
        if (subcategorySlug && subcategorySlug !== newsSlug && urlSegments.length === 3) {
            apiUrl = `/${categorySlug}/${subcategorySlug}/${newsSlug}`;
        } else {
            apiUrl = `/${categorySlug}/${newsSlug}`;
        }
        
        // Related News
        GetData(`/readers-choice/5/0`, function (response){
            let data = response.data;
            if(response.data.length > 0){
                data.forEach(function (item){
                    let newsUrl = item.newsUrl || (item.id ? `/get-news/${item.id}` : '#');
                    $('#RelatedNews').append(`
                     <a href="${newsUrl}" class="news link border-bottom">
                            <img style="height: 65px;" class="image" src="${item.image}">
                            <div>
                                <h5 class="title line-2" style="margin: 0!important;">${item.title}</h5>
                                <div class="hour"><i class="fas  fa-clock" style="margin: 0 5px 0 0;"></i>${site.localeDate(item.date)}</div>
                            </div>
                        </a>
                `)
                })
            }
        })


        GetData(apiUrl, function (response){
            if(response.status === 200){
                let news = response.data;
                News(news,news.id);
                BodyLoaderOFF();
            }else{
                console.log(response)
            }
        })

        function News(news,newsID){
            let catName = "";
            news.category.forEach(function (cat){
                let categoryUrl = cat.url || (cat.slug ? `/${cat.slug}` : `/get-news-by-category/${cat.id}`);
                var link = `<a href="${categoryUrl}" class=" d-inline">${cat.name}</a>`;
                catName += link + ",";
            })
            catName = catName.substr(0, catName.length -1);
            $('#b-category').html(catName);
            
            let subCat = ""
            news.sub_category.forEach(function(sub_cat){
                let subcategoryUrl = sub_cat.url || (sub_cat.slug && news.category[0] ? `/${news.category[0].slug}/${sub_cat.slug}` : `/get-news-by-sub-category/${sub_cat.id}`);
                var link = `<a href="${subcategoryUrl}" class="d-inline">${sub_cat.name}</a>`;
                subCat += link + ",";
            });
            if(news.sub_category.length > 0){
                $('#b-sub-category').html(subCat);
            }
            else{
                $('#b-sub-category').remove();
            }
            

            let googleNewsLink = ` <li class="nav-item">
                                    <a class="nav-link icon-link d-none d-sm-block" href="${news.google_drive_link}"><img src="https://cdn.dhakapost.com/media/common/google_news_180.png" height="20px" width="20px"> </a>
                                </li>`

            let video = `<div class="video mt-2">
            
                            <iframe
                                width="100%"
                                height="315"
                                src="${news.video_link}"
                                title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        </div>`

            let audio = `
                     <audio controls class="mt-3">
                      <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-11.mp3" type="audio/ogg">
                      <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-11.mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                    </audio>
            `

            $('#news').append(`
                    <div class="news-item" id="${newsID}">
                        <h5 class="news-ticker">${(news.ticker == null) ? "" :news.ticker }</h5>
                        <h1 class="news-title">${news.title}</h1>
                        <h5 class="news-shoulder">${(news.shoulder == null) ? "" :news.shoulder }</h5>
                 <!--<hr style="height: 10px;width: 100px;background: #fff;">-->
                        <div class="d-flex justify-content-between align-items-center">
                        
                        <div class="author-info">
                          <img src="${news.representative_image}" alt="Author Image" class="author-image" />
                          <div class="author-text">
                            <div class="author-name">${news.representative}</div>
                            <div class="author-date">${site.localeFullDate(news.date)} &nbsp;&nbsp;<img src="https://www.svgimages.com/svg-image/s5/tag-icon-256x256.png" height="15px"> ${catName}</div>
                          </div>
                        </div>





                            <ul class="nav">

    <li class="nav-item">
        <a id="" class="nav-link" style="text-decoration: none;"> {{-- <?php echo $st+10; ?>--}} </a>
    </li>
    <li class="nav-item">
        <a class="nav-link icon-link" href="https://www.facebook.com/sharer/sharer.php?u=https://breakingnews.com.bd${getUrl}" target="_blank"><img height="15px" src="{{ asset("img/f.png") }}" alt="site logo"></a>
    </li>
    <li class="nav-item ">
        <a class="nav-link icon-link" href="http://twitter.com/share?text=text goes here&url=https://breakingnews.com.bd${getUrl}" target="_blank"><img height="15px" src="{{ asset("img/t.png") }}" alt="site logo"></a>
    </li>
    <li class="nav-item ">
        <a class="nav-link icon-link" href="whatsapp://send?text=https://breakingnews.com.bd${getUrl}"><img height="15px" src="{{ asset("img/w.png") }}" alt="site logo"></a>
    </li>
    <li class="nav-item d-none d-sm-block">
        <a class="nav-link icon-link newsLinkCopy" href="whatsapp://send?https://breakingnews.com.bd${getUrl}"><img height="15px" src="{{ asset("img/c.png") }}" alt="site logo"></a>
    </li> 



                                ${ news.google_drive_link !== null ? googleNewsLink : ""}



                                <li class="nav-item d-none d-sm-block">
                                    <a class="nav-link icon-link newsPrintBtn" href="#"><img height="15px" src="{{asset("img/p.png")}}" alt="site logo"></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link icon-link fontPlusBtn" href="#"><i>ফ+</i> </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link icon-link fontMinusBtn" href="#"><i>ফ-</i></a>
                                </li>
                            </ul>
                        </div>

                        ${news.video_link !== null ? video : ""}

                        ${news.audio_link !== null ? audio : ""}

                        <div class="images news-image  mt-3 mb-2" >
                        
                    
    
{{--data-toggle="modal" data-target="#exampleModal${news.id}"--}}
                       
                                <div class="newsCardOverlay position-relative">
                               <img class="thumbnail" data-toggle="modal" data-target="#exampleModal${news.id}" style=" max-width: 100%;
    min-width: 100%;min-height: 150px;
    max-height: 950px;" src="${news.image}" alt="image-1" />
    
    <span class="" style="margin-bottom: 0;display: block;color: #757575;font-size: 18px;line-height: 30px;padding:5px;background:#f0f0ed;">${news.caption == null ?  "" :news.caption }</span>
                                           
                                    
                                    
                                </div>
                        
                            
<div class="modal fade" id="exampleModal${news.id}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " style="max-width:1500px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">X</button>

      </div>
      <div class="modal-body">
      <img class="thumbnail" style=" max-width: 100%;
    min-width: 100%;min-height: 150px;
    max-height: 600px;" src="${news.image}" alt="image-1" data-toggle="modal" data-target="#exampleModal${news.id}"/>
  <span class="" style="margin-bottom: 0;display: block;color: #757575;font-size: 18px;line-height: 30px;padding:5px;background:#f0f0ed;">${news.caption == null ?  "" :news.caption }</span>
      
    </div>
  </div>
</div>

                        </div>

                        <div class="f-18 news-description">${news.details}</div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <img height="20px" src="https://breakingnews.com.bd/img/logo2.png">
                    </div>
                    <hr>
                `)
        }

        // Get related news using news ID from response
        GetData(apiUrl, function (response){
            if(response.status === 200 && response.data.id){
                GetData(`/get-related-news/${response.data.id}/6/0`, function (relatedResponse){
                    let data = relatedResponse.data;
                    if(relatedResponse.data.length > 0){
                        data.forEach(function (item){
                            RelatedNews(item);
                        })
                    }
                })
            }
        })
        function RelatedNews(news){
            let newsUrl = news.newsUrl || (news.id ? `/get-news/${news.id}` : '#');
            $('#relatedNews').append(`
                <a href="${newsUrl}" class="col-6 col-md-6 col-lg-4  link mt-3 card border-0">
                    <div class="card-body border p-0">
                        <img height="160px" class="card-img" src="${news.image}">
                        <h6 class="line-2 p-2">${news.title}</h6>
                    </div>
                </a>
            `)
        }



        $(document).ready(function (){
            let fontsize = 18;
            let printID = 1;
            $('body').on('click','.fontPlusBtn', function (e){
                e.preventDefault();
                fontsize += 2;
                $('.news-description *').css({
                    fontSize: fontsize+"px"
                })
            })

            $('body').on('click','.fontMinusBtn', function (e){
                e.preventDefault();
                fontsize -= 2;
                $('.news-description *').css({
                    fontSize: fontsize+"px"
                })
            })

            $('body').on('click','.newsPrintBtn', function (e){
                printID += 1;
                e.preventDefault();
                let nav = $(this).parent().parent();
                nav.css('display','none')
                let printableNews = $(this).parent().parent().parent().parent();
                let newsTitle = printableNews.find('.news-title');
                var newWin=window.open('','Print-Window'+printID);

                newWin.document.open();

                newWin.document.write(`
                    <html>
                        <head>
                            <title>${newsTitle.html()}</title>
                        </head>

                        <body onload="window.print()">
                            <img height="100px" src="http://bnbd.rakibmia.com/img/logo-color.png">
                            ${printableNews.html()}
                        </body>
                    </html>
                `);

                newWin.document.close();
                nav.css('display','flex')

            })
        })


        ///////////////////////////////////////////
        // Note: Scroll-based sequential news loading disabled for slug-based URLs
        // Sequential ID-based navigation doesn't work with slug-based URLs
        // This feature can be re-implemented using category-based news list if needed



        function ChangeUrl(page, url) {
            if (typeof (history.pushState) != "undefined") {
                var obj = {Page: page, Url: url};
                history.pushState(obj, obj.Page, obj.Url);
            }
        }
        
        
    </script>
    <!-- Your Blade View -->
<script>
  function toggleFullscreen(elem) {
  elem = elem || document.documentElement;
  if (!document.fullscreenElement && !document.mozFullScreenElement &&
    !document.webkitFullscreenElement && !document.msFullscreenElement) {
    if (elem.requestFullscreen) {
      elem.requestFullscreen();
    } else if (elem.msRequestFullscreen) {
      elem.msRequestFullscreen();
    } else if (elem.mozRequestFullScreen) {
      elem.mozRequestFullScreen();
    } else if (elem.webkitRequestFullscreen) {
      elem.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
    }
  } else {
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    }
  }
}

// document.getElementById('btnFullscreen').addEventListener('click', function() {
//   toggleFullscreen();
// });

document.getElementsByTagName('img').addEventListener('click', function() {
  toggleFullscreen(this);
});
var elem = document.getElementById("myvideo");
function openFullscreen() {
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.webkitRequestFullscreen) { /* Safari */
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { /* IE11 */
    elem.msRequestFullscreen();
  }
}
</script>
    

    



@endsection