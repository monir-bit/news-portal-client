<div class="mt-5 d-md-block d-none">
    <div class="section-container">
        <div class="shadow-sm border-bottom border-secondary  p-2  d-flex justify-content-between align-items-center">
            <h4 class="m-0">ফটো গ্যালারি</h4>
            {{--            <button class="btn btn-danger rounded-pill">সকল</button>--}}
        </div>
    </div>
</div>

<div id="ImageGallery"  class="mt-3 d-none d-md-block section-container">
    <div class="row">
        <div class="col-3">
            <div class="row" id="galleryAnotherImagesLeft"></div>
        </div>
        <div class="col-6" id="galleryFirstImage">
            <div class="swiffy-slider">
                <ul class="slider-container" id="gallery">
                  
                </ul>
            
                <button type="button" class="slider-nav"></button>
                <button type="button" class="slider-nav slider-nav-next"></button>
            
               
            </div>
        </div>
        <div class="col-3">
            <div class="row" id="galleryAnotherImages"></div>
        </div>
    </div>
</div>


<script>

    ImageGallery();

    function ImageGallery() {
        GetData('/get-all-image', function (response){
            if(response.status === 200){
                let data = response.data;
                let FirstImage = $('#gallery');
                let anotherImages = $('#galleryAnotherImages');
                let anotherImagesLeft = $('#galleryAnotherImagesLeft');

                for(let i = 0; i < data.length; i++){
                  
                        let item = data[i];
                        FirstImage.append(`
                          <li>
                            <a href=""  class="card position-relative overflow-hidden" >
                          <img style="height: 435px;object-fit: cover;width: 100%;"  src="${item.image_file}" class="img-fluid"/>
                           <div  class="cardOverlay p-3 w-100 position-absolute" style="bottom: 0; text-align: left;padding:0;">
                                               <h5 class="card-title text-white " style="margin-bottom: 0;">${item.title}</h5>
                                           </div>
                            </a>
                          </li>
                        `)
                    
                }
            for(let i = 0; i < 4; i++){
                  
                        let item = data[i];
                       
                        if(i > 1) {
                            anotherImages.append(`
                                 <div class="col-md-12">
                                  <a href="/images/${item.cdate}" style="color: #252628;   text-decoration: none !important;margin-top: 0px;
    " class="p-2 card ">
                                 
                                        <img style="height: 175px;object-fit: cover;width: 100%" src="${item.image_file}" />
                                    
                                        <div  class="" style="bottom: 0;">
                                            <span class="">${site.localeDays(item.cdate)}</span>
                                        </div>
                        
                                         </a>
                                   
                                    
                                 </div>
                            `)
                        } else {
                            anotherImagesLeft.append(`
                                 <div class="col-md-12">
                                  <a href="/images/${item.cdate}" style="color: #252628;   text-decoration: none !important;margin-top: 0px;
        " class="p-2 card ">
                                 
                                        <img style="height: 175px;object-fit: cover;width: 100%" src="${item.image_file}" />
                                    
                                        <div  class="" style="bottom: 0;">
                                            <span class="">${site.localeDays(item.cdate)}</span>
                                        </div>
                        
                                         </a>
                                   
                                    
                                 </div>
                            `)
                       }
                    
                }
             /*   data.forEach(function(item){
                    if(item.order == "1"){
                        FirstImage.append(`
                         <a  data-lg-size="1400-1400"  data-src="${item.image_file}" data-sub-html="<h4>${item.title}</h4>">
                            <div class="newsCardOverlay position-relative">
                                <img style="height: 700px;object-fit: cover;width: 100%;"  src="${item.image_file}" />
                                <div  class="cardOverlay w-100 position-absolute" style="bottom: 0;">
                                    <h5 class="card-title text-white line-1 p-2">${item.title}</h5>
                                </div>
                            </div>
                         </a>
                    `)
                    }

                    else if(item.order == "2"){
                        anotherImages.append(`
                         <a data-lg-size="1400-1400" class="col-12" data-src="${item.image_file}" data-sub-html="<h4>${item.title}</h4>">
                            <div class="newsCardOverlay position-relative">
                                <img style="height: 385px;object-fit: cover;width: 100%" src="${item.image_file}" />
                                <div  class="cardOverlay w-100 position-absolute" style="bottom: 0;">
                                    <h5 class="card-title text-white line-1 p-2">${item.title}</h5>
                                </div>
                            </div>
                         </a>
                    `)
                    }
                    else if(item.order == "3"){
                        anotherImages.append(`
                         <a data-lg-size="1400-1400" class="col-6 mt-4" data-src="${item.image_file}" data-sub-html="<h4>${item.title}</h4>">
                            <div class="newsCardOverlay position-relative">
                                <img style="height: 290px;object-fit: cover;width: 100%" src="${item.image_file}" />
                                <div  class="cardOverlay w-100 position-absolute" style="bottom: 0;">
                                    <h5 class="card-title text-white line-1 p-2">${item.title}</h5>
                                </div>
                            </div>
                        </a>
                    `)
                    }
                    else if(item.order == "4"){
                        anotherImages.append(`
                         <a data-lg-size="1400-1400" class="col-6 mt-4" data-src="${item.image_file}" data-sub-html="<h4>${item.title}</h4>">
                            <div class="newsCardOverlay position-relative">
                                <img style="height: 290px;object-fit: cover;width: 100%" src="${item.image_file}" />
                                <div  class="cardOverlay w-100 position-absolute" style="bottom: 0;">
                                    <h5 class="card-title text-white line-1 p-2">${item.title}</h5>
                                </div>
                            </div>
                        </a>
                    `)
                    }
                });
*/

                const colours = ['#6a7583', '#1e304b', '#315460', '#080607'];
                const galleryEventsDemo2 = document.getElementById('galleryAnotherImage');
                galleryEventsDemo2.addEventListener('lgBeforeSlide', (event) => {
                    const { index } = event.detail;
                    document.querySelector('.lg-backdrop').style.backgroundColor =
                        colours[index];
                });
                lightGallery(galleryEventsDemo2);




                lightGallery(document.getElementById('galleryFirstImage'));
            }
        })
    }
</script>