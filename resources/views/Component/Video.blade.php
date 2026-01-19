{{--<div class="row section-container national-bongo mt-5">
    <iframe src="https://widget.bongobd.com/widget?platform=abfea462-f64d-491e-9cd9-75ee001f45b0&widget=breakingnews&partner=breakingnews" width="100%" height="400" frameborder="0"></iframe>
</div>--}}
<div class="mt-5 d-md-block d-none">
    <div class="section-container">
        <div class="shadow-sm border-bottom border-secondary  p-2  d-flex justify-content-between align-items-center">
            <h4 class="m-0">ভিডিও</h4>
            <button class="btn btn-danger rounded-pill"><a href="{{url('all')}}" style="color: white;
  text-decoration:none;">সব ভিডিও</a> </button>
        </div>
    </div>
</div>

{{--<div id="VideoComponent" class="bg-dark d-md-block d-none mt-3 p-4 section-container">
    <div class="row" id="gallery-container">


    </div>
</div>--}}

<div id="VideoComponent" class="p-4 pt-0 p-lg-3 p-lg-2 position-relative" >
    <button class="f-prev position-absolute feature-action-btn" style="left: 30px;"><i class="fas fa-angle-left"></i></button>
    <button class="f-next position-absolute feature-action-btn" style="right: 30px;"><i class="fas fa-angle-right"></i></button>
    <div class="feature-wrap p-0 row" id="gallery-container">

    </div>
</div>


<script>
    GetData('/get-all-video/6/0',function (response){
        if(response.status === 200){
            let data = response.data;
            let GalleryContainer = $('#gallery-container');

            for(let i = 0; i <  data.length ;i++){
                if(i == 0){
                    let item = data[i];
                    GalleryContainer.append(`
                        <div class="col-4 mt-2 mb-2" data-lg-size="1280-720" data-pinterest-text="Pin it3" data-tweet-text="lightGallery slide  4" data-src="${item.video_link}" data-poster="${item.video_thumbnail}" data-sub-html="<h4>Here Is Video Title Shown</h1>">
                            <div class="card video-card position-relative">
                                <img class="card-img img-fluid" src="${item.video_thumbnail}">
                                <div class="video-card-overlay d-none  h-100 w-100 position-absolute d-flex align-items-center justify-content-center" ><i class="fas fa-play text-danger" style="font-size: 80px;"></i></div>
                            </div>
                        </div>
                    `)
                }else if(i == 1){
                    let item = data[i];
                    GalleryContainer.append(`
                        <div class="col-4 mt-2 mb-2" data-lg-size="1280-720" data-pinterest-text="Pin it3" data-tweet-text="lightGallery slide  4" data-src="${item.video_link}" data-poster="${item.video_thumbnail}" data-sub-html="<h4>Here Is Video Title Shown</h1>">
                            <div class="card video-card position-relative">
                                <img class="card-img img-fluid" src="${item.video_thumbnail}">
                                <div class="video-card-overlay d-none  h-100 w-100 position-absolute d-flex align-items-center justify-content-center" ><i class="fas fa-play text-danger" style="font-size: 80px;"></i></div>
                            </div>
                        </div>
                    `)
                }else if( i == 2){
                    let item = data[i];
                    GalleryContainer.append(`
                        <div class="col-4 mt-2 mb-2" data-lg-size="1280-720" data-pinterest-text="Pin it3" data-tweet-text="lightGallery slide  4" data-src="${item.video_link}" data-poster="${item.video_thumbnail}" data-sub-html="<h4>Here Is Video Title Shown</h1>">
                            <div class="card video-card position-relative">
                                <img class="card-img img-fluid" src="${item.video_thumbnail}">
                                <div class="video-card-overlay d-none  h-100 w-100 position-absolute d-flex align-items-center justify-content-center" ><i class="fas fa-play text-danger" style="font-size: 80px;"></i></div>
                            </div>
                        </div>
                    `)
                }else if( i == 3){
                    let item = data[i];
                    GalleryContainer.append(`
                        <div class="col-4 mt-2 mb-2" data-lg-size="1280-720" data-pinterest-text="Pin it3" data-tweet-text="lightGallery slide  4" data-src="${item.video_link}" data-poster="${item.video_thumbnail}" data-sub-html="<h4>Here Is Video Title Shown</h1>">
                            <div class="card video-card position-relative">
                                <img class="card-img img-fluid" src="${item.video_thumbnail}">
                                <div class="video-card-overlay d-none  h-100 w-100 position-absolute d-flex align-items-center justify-content-center" ><i class="fas fa-play text-danger" style="font-size: 80px;"></i></div>
                            </div>
                        </div>
                    `)
                }else if(i ==  4){
                    let item = data[i];
                    GalleryContainer.append(`
                        <div class="col-4 mt-2 mb-2" data-lg-size="1280-720" data-pinterest-text="Pin it3" data-tweet-text="lightGallery slide  4" data-src="${item.video_link}" data-poster="${item.video_thumbnail}" data-sub-html="<h4>Here Is Video Title Shown</h1>">
                            <div class="card video-card position-relative">
                                <img class="card-img img-fluid" src="${item.video_thumbnail}">
                                <div class="video-card-overlay d-none  h-100 w-100 position-absolute d-flex align-items-center justify-content-center" ><i class="fas fa-play text-danger" style="font-size: 80px;"></i></div>
                            </div>
                        </div>
                    `)
                }else if(i ==  5){
                    let item = data[i];
                    GalleryContainer.append(`
                        <div class="col-4 mt-2 mb-2" data-lg-size="1280-720" data-pinterest-text="Pin it3" data-tweet-text="lightGallery slide  4" data-src="${item.video_link}" data-poster="${item.video_thumbnail}" data-sub-html="<h4>Here Is Video Title Shown</h1>">
                            <div class="card video-card position-relative">
                                <img class="card-img img-fluid" src="${item.video_thumbnail}">
                                <div class="video-card-overlay d-none  h-100 w-100 position-absolute d-flex align-items-center justify-content-center" ><i class="fas fa-play text-danger" style="font-size: 80px;"></i></div>
                            </div>
                        </div>
                    `)
                }
            }

            lightGallery(document.getElementById("gallery-container"), {
                speed: 500,
                plugins: [lgVideo]
            });
        }



    })
</script>