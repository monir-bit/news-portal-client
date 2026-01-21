<div id="top-nav" class="border-top border-bottom shadow-sm" style="background-color:#FFFFFF; color:#00000;">
    <nav class="navbar section-container navbar-light navbar-expand-md  d-none d-md-block">
        <div class="container-fluid">
            <div class="collapse navbar-collapse d-flex justify-content-left" id="navbarSupportedContent">
                <button data-bs-toggle="offcanvas" href="#sideMenu" role="button" aria-controls="sideMenu" class="fas btn btn-outline-secondary fa-bars"></button>
                <div class="w-100 d-flex justify-content-center">
                    <ul id="category" class="navbar-nav">

                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>

<script>
    let nav = $('#category');
    axios.get(site.url('/category')).then(function(response){
        if(response.status === 200){
            let data = response.data[0];
            let catLimit = 0;
            let order = 9;
            for(let i = 0; i < data.length; i++){
                for(let j = 0; j < order; j++){
                    if(data[i].order == j+1){
                        if(data[i].id == "1"){
                            nav.append(`
                                <li class="nav-item">
                                    <a class="nav-link top-menu text-black" href="/latest-news">সর্বশেষ</a>
                                </li>
                            `);
                        }else{
                            if(data[i].visible == 1){
                                if(data[i].sub_categories.length > 0){
                                    nav.append(`
                                    <li class="nav-item dropdown" >
                                        <a class="nav-link top-menu text-black dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            ${data[i].name}
                                        </a>
                                        <ul id="sub${data[i].id}"  class="dropdown-menu" style="background-color:#FFFFFF; color:#000000;">

                                        </ul>
                                    </li>
                                `);

                                    let subcat = data[i].sub_categories;
                                    let visibleItemList = [];
                                    for(let sci = 0; subcat.length > sci;sci++ ){
                                        if(subcat[sci].visible == 1){
                                            visibleItemList.push(sci);
                                            let subcategoryUrl = subcat[sci].url || (subcat[sci].slug ? `/${data[i].slug || 'category-' + data[i].id}/${subcat[sci].slug}` : `/get-news-by-sub-category/${subcat[sci].id}`);
                                            $('#sub'+data[i].id).append(`
                                            <li><a class="dropdown-item top-menu" href="${subcategoryUrl}">${subcat[sci].name}</a></li>
                                        `);
                                        }
                                    }
                                    let categoryUrl = data[i].url || (data[i].slug ? `/${data[i].slug}` : `/get-news-by-category/${data[i].id}`);
                                    $('#sub'+data[i].id).append(`
                                    <li><a class="dropdown-item top-menu" href="${categoryUrl}">সকল  ${data[i].name}</a></li>
                                `);

                                    //if All Category Visible in Subcategory then dropdown item remove
                                    if(visibleItemList.length < 1){
                                        $('#sub'+data[i].id).prev().removeClass('dropdown-toggle');
                                        $('#sub'+data[i].id).remove();
                                    }
                                }else{
                                    let categoryUrl = data[i].url || (data[i].slug ? `/${data[i].slug}` : `/get-news-by-category/${data[i].id}`);
                                    nav.append(`
                                        <li class="nav-item">
                                            <a class="nav-link top-menu text-black" href="${categoryUrl}">${data[i].name}</a>
                                        </li>
                                    `);
                                }

                                catLimit++
                                if(catLimit == 9){break}
                            }
                        }
                    }
                }
            }
        }
    }).catch(function (error){
        console.log(error)
    });
</script>

<?php  $breaking = \DB::table('breaking_news')->where('status', 1)->orderBy('id', 'desc')->get()?>

@if(count($breaking) > 0)
<div id="marque" style="background: red!important;padding: 0; height: auto;position: initial;font-size:24px" class="d-flex align-items-center marque-breaking">
    <div class="bg-danger text-white pt-2 pb-2 ps-3 pe-3"> ব্রেকিংনিউজ:</div>
    <marquee direction="left">
        <button type="button" id="MarqueFixedBottomClose" class="position-absolute btn" style="right: 10px;top: -15px;">
            <i class="fas fa-times text-danger"></i>
        </button>
        
        <div id="marque-news-" class="pt-2 pb-2 ps-3 pe-3">
        @foreach ($breaking as $val)
            <a href="{{$val->news_url}}" style="color: #fff;text-decoration: none;">{{$val->headline}} | </a>  
        @endforeach 
        </div>
    </marquee>
    
    <button class="close-btn" onclick="toggleTicker()">X</button>
</div>
@endif

<script>
        $(function() {
            
            $('.close-btn').on('click', function(e){
                $(".marque-breaking").remove();
            });
        });
    </script>


