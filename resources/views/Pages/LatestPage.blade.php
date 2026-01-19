@extends('Layout.app')
@section('title', "Home")


@section('content')
    <div class="section-container mt-2">
        <div class="Title pt-2 pb-2 border-bottom border-dark">
            <h1 class="m-0">সর্বশেষ খবর </h1>
        </div>

        <div id="archiveCardContent">
            <div class="row" id="archiveItem">
                <!-- Archive Data -->
            </div>

            <!--<div class="loadMore text-center mt-4">-->
            <!--    <button id="archiveLoadMore" class="btn btn-outline-danger">আরও দেখুন</button>-->
            <!--</div>-->
        </div>
    </div>




    <script>
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
            PostData('/archive/filter', getFilterObj, function (response) {
                if (response.status === 200) {
                    let data = response.data;
                    let archiveItem = $('#archiveItem');
                    if (data.length > 0) {
                        data.forEach(function (item) {
                            
                            archiveItem.append(`
                                <div class="col-12  col-sm-6 col-md-4 col-lg-3">
                                    <a href="/get-news/${item.id}" class="card border-0 pt-0 pb-0 link">
                                        <img src="${item.image}" class="card-img">
                                        <div class="card-body border-bottom pb-0  plr-0">
                                            <h5 class="pb-1">${item.title}</h5>
                                            <p class="m-0">${moment(item.date).locale("bn").format('MMMM Do YYYY, h:mm:ss a')}<p>
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
            let firstTimeNews = 52;
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
                        <div class="col-12  col-sm-6 col-md-4 col-lg-3">
                            <a href="/get-news/${item.id}" class="card border-0 pt-0 pb-0 link">
                                <img src="${item.image}" class="card-img">
                                <div class="card-body border-bottom pb-0  plr-0">
                                    <h5 class="pb-1">${item.title}</h5>
                                    <p class="m-0">${moment(item.date).locale("bn").format('MMMM Do YYYY, h:mm:ss a')}<p>
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
