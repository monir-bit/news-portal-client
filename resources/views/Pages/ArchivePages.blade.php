@extends('Layout.app')
@section('title', "Home")


@section('content')
    <div class="section-container mt-2 p-5">
        <div class="Title pt-2 pb-2 border-bottom border-dark">
            <h1 class="m-0">অনুসন্ধান </h1>
        </div>

        <form action="/search-archive" method="get" id="areaFilter" class="archiveFilter mt-3 mb-3">
            <div class="row">
                <div class="col-sm-12 p-2">
                    <input name="title" id="fiterText" type="text" class="form-control" placeholder="যা খুঁজতে চান ">    
                    
                    </div>
                <div class=" col-sm-6 p-2">
                    <input name="startDate" type="text" onfocusout="(this.type='text')" onfocus="(this.type = 'date')" class="form-control"  placeholder="তারিখ ">
                </div>
                 <div class="col-sm-6 p-2">
                    <select name="category_id" id="categoryElem" class="form-select shadow-none" aria-label="Default select example">
                        <option value="">ক্যটাগরি</option>
                    </select>
                </div>
             
                <input type="hidden" name="limit" value="20">
                <div class="col-md-12">
                    <input id="archiveFilter" type="submit" class="btn btn-secondary w-100" value="খুজুন">
                </div>
            </div>



        </form>

        <div id="archiveCardContent">
            <div class="row">
            <div class="col-md-8 container p-2" id="archiveItem">
                <!-- Archive Data -->
            </div>
                <!--   Advertise   --->
            <div id="home_lead_left" class="advertise col-md-4 mt-4 mb-3 text-center  overflow-hidden">

            </div>
            </div>
            <!--<div class="loadMore text-center mt-4">-->
            <!--    <button id="archiveLoadMore" class="btn btn-outline-danger">আরও দেখুন</button>-->
            <!--</div>-->
        </div>
    </div>




    <script>
     


    Advertise('/advertise/layout_top_add',$('#layout_top_add'))
    Advertise('/advertise/home_lead_left_add', $('#home_lead_left'))
    Advertise('/advertise/home_lead_right_add', $('#home_lead_right'))
        //Area Filter
        GetData('/get-all-divisions', function (response){
            if(response.status === 200){
                let data = response.data;
                data.forEach(function (item){
                    $('#division').append(`
                        <option value="${item.id}">${item.bn_name}</option>
                   `)
                })
            }
        });
        //Division Wise District
        $('#areaFilter').on('change','#division', function(){
            let divisionID = $(this).val();
            $('#district').empty();
            $('#upazila').empty();
            $('#upazila').append(`<option value="">উপজেলা</option>`)
            $('#district').append(`<option value="">জেলা</option>`)
            GetData('/get-all-district-by-division/'+divisionID, function (response){
                if(response.status === 200){
                    let data = response.data;
                   
                    data.forEach(function (item){
                        $('#district').append(`
                        <option value="${item.id}">${item.bn_name}</option>
                    `)
                    })
                }
            });
        });

        //District Wise Upazila
        $('#areaFilter').on('change','#district', function(){
            let districtID = $(this).val();
            $('#upazila').empty();
            $('#upazila').append(`<option value="">উপজেলা</option>`)
            GetData('/get-all-upozilla-by-district/'+districtID, function (response){
                if(response.status === 200){
                    let data = response.data;
                    data.forEach(function (item){
                        $('#upazila').append(`
                        <option value="${item.id}">${item.bn_name}</option>
                    `)
                    })
                }
            });
        });


        GetData('/category',function (response){
            if(response.status === 200){
                let data = response.data[0];
                let catElem = $('#categoryElem');
                data.forEach(function (catItem){
                    if(catItem.visible == 1){
                        catElem.append(`
                            <option value="${catItem.id}" >${catItem.name}</option>
                        `)
                    }
                })
            }
        })


        /* ---------------  Filter ------------*/

        if(window.location.search.length > 3) {
            let getFilterObj = MakeObjectFromBrowserUrlParams();
            PostData('/archive/filters', getFilterObj, function (response) {
                if (response.status === 200) {
                    let data = response.data;
                    let archiveItem = $('#archiveItem');
                    if (data.length > 0) {
                        data.forEach(function (item) {
                            
                            archiveItem.append(`
                                <div class="col-md-12 p-2">
                                    <a href="/get-news/${item.id}" class="card border-0 pt-0 pb-0 link">
                                        <div class="row">
                                         <div class="col-md-6">
                                       
                                        <div class="card-body border-bottom pb-0  plr-0">
                                            <h5 class="pb-1">${item.title}</h5>
                                            <p>${item.sort_description}</p>
                                            <p class="m-0">${moment(item.date).locale("bn").format('MMMM Do YYYY, h:mm:ss a')}<p>
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                         <img src="${item.image}" class="card-img">
                                        </div>
                                        </div>
                                    </a>
                                </div>
                            `);
                        });
                    }else{
                        archiveItem.append(`
                            <div class="alert alert-danger text-center" role="alert">
                               দুঃখিত! কোন ডাটা পাওয়া যায়নি ।
                            </div>
                        `);

                        $('#archiveLoadMore').remove();
                    }

                    BodyLoaderOFF();
                }
            })
        }
        /*--------------- Filter End ----------*/
        else{
            let firstTimeNews = 100;
            let loadCount = 1;
            GetData('/archive/index/'+firstTimeNews,function(response){
                if(response.status === 200){
                    let data = response.data;
                    let archiveItem = $('#archiveItem');
                    //console.log(data)
                    data.forEach(function(item){
                        let d1 = new Date(item.date);
                        console.log(item.date)
                        archiveItem.append(`
                        <div class="col-md-12 p-2">
                                    <a href="/get-news/${item.id}" class="card border-0 pt-0 pb-0 link">
                                        <div class="row">
                                         <div class="col-md-6">
                                        <img src="${item.image}" class="card-img">
                                        </div>
                                        <div class="col-md-6">
                                        <div class="card-body border-bottom pb-0  plr-0">
                                            <h5 class="pb-1">${item.title}</h5>
                                            <p>${item.sort_description}</p>
                                            <p class="m-0">${moment(item.date).locale("bn").format('MMMM Do YYYY, h:mm:ss a')}<p>
                                        </div>
                                        </div>
                                        </div>
                                    </a>
                                </div>
                    `);
                    })

                    BodyLoaderOFF();
                }
            });
        }
    </script>
@endsection