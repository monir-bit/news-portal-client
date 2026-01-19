<!--<div id="layout_top_adds" class="addBanner mt-3 d-flex justify-content-center">-->
    <!-- TOP Layout Advertise -->
<!---</div>-->

<div class="section-container">
    <div id="firstLead" class="mt-3 row  mb-3 d-flex justify-content-between">

        <div href="#" class="flLead col-12 col-sm-12 col-md-12 col-lg-6">
            <div id="mainLead" style="overflow: hidden;">
                <!--MAIN FIRST LEAD NEWS -->
            </div>
            <!--<div class="titleNews row border-top" id="bottomMainLead">-->
               <!--BOTTOM MAIN LEAD -->
            <!--</div>-->
        </div>
        
        <div class="flLeft border-right col-12 col-sm-12 col-md-6 col-lg-3" >
            <div class="3news titleNews2" id="sideLeadNews">
                <!-- LEFT FIRST LEAD NEWS -->
            </div>
            <!--               Advertise   --->
            <!--<div id="home_lead_left" class="advertise mt-4 mb-3 text-center  overflow-hidden">

            </div>-->
        </div>

        <div class="flRight col-12 col-sm-12 col-md-6 col-lg-3 border-motamot" >
            
            <!-- ramadan start --->
                <!--<div class="category-ber shadow-sm border-bottom border-secondary  p-2  d-flex justify-content-between align-items-center" style="position: relative;">
                    <h4 class="m-0">
                        <div class="spinner-grow spinner-grow-sm text-danger" role="status">
                            <span class="visually-hidden">Loading...</span>
                    </div> ভিডিও সংবাদ</h4>
                </div>-->
            <!-- ramadan end ---> 
            <!--               Advertise   --->
            <!--<div id="home_lead_right" class="advertise mt-0 mb-1 text-center overflow-hidden">-->
                <!-- Home Lead Right Add -->
            <!--</div>-->
            <div class="motamot">
            <style>
  mark {
    background-color: #F7E2C7; /* Custom highlight color */
    color: black; /* Text color for contrast */
    padding: 10px 20px 3px 20px;
    
  }
</style>
                <h5 class="text-center p-10 mb-5 fw-bold"> <mark>মতামত </mark> </h5>
                <ul  class="list-group list-group-flush" id="motamotSection">

                </ul>
            </div>

            {{--<div class="corona">
                <h5 class="text-center p-2 border-top border-bottom mt-1 mb-0 fw-bold">করোনা আপডেট</h5>
                <div class="coronaTable d-flex">
                    <div class="coronaTableItem">
                        <div class="text-center lh-lg">বাংলাদেশ</div>
                        <table class="table table-sm table-striped table-light">
                            <tr>
                                <td>মোট আকান্ত</td>
                                <td>:</td>
                                <td id="bnTotal"></td>
                            </tr>
                            <tr>
                                <td>মোট সুস্থ</td>
                                <td>:</td>
                                <td id="bnRecover"></td>
                            </tr>
                            <tr>
                                <td>মোট মৃত্যুঃ</td>
                                <td>:</td>
                                <td id="bnDeath"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="coronaTableItem">
                        <div class="text-center lh-lg">বিশ্ব</div>
                        <table class="table table-sm table-striped table-light">
                            <tr>
                                <td>মোট আকান্ত</td>
                                <td>:</td>
                                <td id="inTotal"></td>
                            </tr>
                            <tr>
                                <td>মোট সুস্থ</td>
                                <td>:</td>
                                <td id="inRecover"></td>
                            </tr>
                            <tr>
                                <td>মোট মৃত্যুঃ</td>
                                <td>:</td>
                                <td id="inDeath"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="coronaActionBtn d-flex justify-content-center">
                    <div class="mt-0">
                        <button class="cnext btn btn-sm btn-secondary rounded-pill m-1"><i class="fas fa-angle-left"></i></button>
                        <button class="cprev btn btn-sm btn-secondary rounded-pill m-1"><i class="fas fa-angle-right"></i></button>
                    </div>
                </div>
            </div>--}}
            <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
   {{--      <div class="bg-light mt-5 border-top border-bottom border-secondary shadow-sm">
            <div class="bg-light p-2  d-flex justify-content-between align-items-center">
                <h4 class="m-0">অনলাইন ভোট</h4>
                <button class="btn btn-danger rounded-pill">সকল</button>
            </div>
        </div> --}}

        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-12">
                <div id="vote-item-container" class="vs-slide-item" >
                    <!-- Vote Item Area -->
                </div>

            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-12">

                {{--                Advertise--}}
                <div id="home_sports_right" class="advertise mt-4 mb-3 text-center d-none">

                </div>
            </div>
        </div>
    </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-12">

                {{--                Advertise--}}
                <div id="home_sports_right" class="advertise mt-4 mb-3 text-center">

                </div>
            </div>
        </div>

        </div>
    </div>
</div>



<script>

    HomeFirstLead();


    Advertise('/advertise/layout_top_add',$('#layout_top_add'))
    Advertise('/advertise/home_lead_left_add', $('#home_lead_left'))
    Advertise('/advertise/home_lead_right_add', $('#home_lead_right'))

    function HomeFirstLead(){
        axios.get(site.url('/get-all-news/1/lead_news/7/0')).then(async function(response){
            if(response.status === 200){
                let data = response.data;
              
             

                //Side Lead News
                function siteLeadNews(newsID,image,title,time){
                    $('#sideLeadNews').append(`
                    <a href="/get-news/${newsID}" class="news  link border-bottom  mb-4">
                        <div>
                            <h5 class="title m-0 line-2" style="margin-bottom: 5px!important;">${title}</h5>
                        </div>
                        <img class="image" src="${image}">
                    </a>
                `);
                }

                //function Bottom Lead News
                function bottomLeadNews(newsID,image,title,time){
                    $('#bottomMainLead').append(`
                    <a href="/get-news/${newsID}" class="news link col-sm-6 border-bottom mt-2 ">
                        <img class="image" src="${image}">
                        <div>
                            <h5 class="title line-2" style="margin-bottom: 5px!important;">${title}</h5>
                            

                        </div>
                    </a>
                `);
                }

                for(let i = 0;data.length > i;i++){
                    
                    if(data[i].order == 1){
                        
                        await GetData('/get-all-live-news/1/0', function (response){
                            if(response.status === 200){
                                let data = response.data;
                                if(data.length > 0){
                                    $('#sideLeadNews').append(`
                                        <a href="/get-live-news/${data[0].id}" class="news  p-0 link border-bottom mt-2 mb-2">
                                            <div class="position-relative">
                                                <img style="height: 65px;" class="image" src="${data[0].image}">
                                                <div class="position-absolute text-center text-white " style="height: 20px;width: 90%;background: rgba(255,255,255,1);bottom: 0">
                    
                                                    <img src="https://www.pngall.com/wp-content/uploads/2018/03/Live-PNG-File.png" height="20px">
                                                </div>
                                            </div>
                                            <div>
                                                <h5 class="title line-2" style="margin-bottom: 0px!important;">${data[0].title}</h5>
                                                <p class="hour"></p>
                                            </div>
                                        </a>
                                    `)}
                                }
                            })
                        
                        //Main Lead
                        $('#mainLead').append(`
                            <a id="mainLead" style="display: block;position: relative;" class="link hover-zoom" href="/get-news/${data[i].id}" >
                              <img class="image img-fluid" style="width: 100%; border: 4px solid #f20000; animation: animated-border 2s infinite;" src="${data[i].image}" alt="Image">
<style>
  @keyframes animated-border { 0% { border: 4px solid #f20000; } 50% { border: 4px solid #000000; } 100% { border: 4px solid #f20000; } }
</style>
                                <div style="bottom: 0;color: #fff;" class="cardOverlay w-100 position-absolute p-2"><h1 class="mt-2 line-2">${data[i].title}</h1></div>
                            </a>
                         `);
                         //<p class="line-2">${data[i].sort_description}</p>
                    }
                    
                    if(data[i].order == "2"){
                        siteLeadNews(data[i].id,data[i].image,data[i].title, data[i].date)
                    }else if(data[i].order == "3"){
                        siteLeadNews(data[i].id,data[i].image,data[i].title, data[i].date)
                    }else if(data[i].order == "4"){
                        siteLeadNews(data[i].id,data[i].image,data[i].title, data[i].date)
                    }

                    //Bottom Leaed News
                    else if(data[i].order == "5"){
                        bottomLeadNews(data[i].id,data[i].image,data[i].title, data[i].date)
                    }else if(data[i].order == "6"){
                        bottomLeadNews(data[i].id,data[i].image,data[i].title, data[i].date)
                    }

                }
            }
        }).catch(function(error){
            console.log({...error})
        });

        //Motamot
        GetData('/get-all-news/17/lead_news/2/0',function(res){
            if(res.status === 200){
               BodyLoaderOFF();
                let data = res.data;
                for(let i =0; i< data.length; i++){
                //    if(data[i].order == "1"){
                        motamot(data[i].id,data[i].image,data[i].title,data[i].sort_description)
               //     }
                }
            }else{

            }

            //Motamot Function
            function motamot(newsID,image,title,name){
                $('#motamotSection').append(`
                    <a href="/get-news/${newsID}" class="list-group-item link d-flex align-items-center border-bottom list-group-item-action d-flex">
                        <div class="motamot-text">
                            <h5 class="m-0">${title}</h5>
                            <p class="m-0 line-1 f-16 text-secondary">${name}</p>
                        </div>
                   <img style="margin-left: 10px; border-radius: 15px; border: 2px solid #ccc; padding: 5px;" src="${image}" class="rounded-circle" height="100px" width="100px">

                    </a>
                `)
            }
        })

        //Corona Update
        GetData('/get-all-info',function(res){
            if(res.status === 200){
                let c = res.data;
                $('#bnTotal').append(c[0].info_value);
                $('#bnRecover').append(c[1].info_value);
                $('#bnDeath').append(c[2].info_value);
                $('#inTotal').append(c[3].info_value);
                $('#inRecover').append(c[4].info_value);
                $('#inDeath').append(c[5].info_value);
            }else{

            }
        })
    }



    $(document).ready(function(){
        $('.coronaTable').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            autoplay: true,
            autoplaySpeed: 2000,
            nextArrow: '.cnext',
            prevArrow: '.cprev'
        });
    });
// vote
    var loaded = 0;
    var voting = [];
    $('#vote-item-container').on('click','.vote-select', function (){
        let voteID = $(this).attr('vote-id');
        let voteType = $(this).attr('vote-type');
        if(loaded == 0){
            loaded =  1;
            if(voting.length > 0){
                for(let i = 0 ; i < voting.length; i++){
                    var vote = voting[i];
                    if(vote.id === voteID){
                        voting.splice(i,1);
                        voting.push({id: voteID, type: voteType})
                    }else{
                        voting.push({id: voteID, type: voteType});
                        break;
                    }
                }
            }else{
                voting.push({id: voteID, type: voteType})
            }
        }
    })

    setInterval(function (){
        loaded = 0;
    }, 200)


    //Give Vote
    $('#vote-item-container').on('click','.GiveVoteBtn', function (){
        let voteID = $(this).attr('vote-id');
        if(voteID !== ""){
            for(let i = 0; i < voting.length; i++){
                let vote = voting[i];
                if(vote.id == voteID){
                    GetData(`/give-vote/${vote.id}/${vote.type}`, function (response){
                        if(response.status === 200){
                            let voted = localStorage.getItem('voted');
                            if(voted == null || voted == ""){
                                let votedArray = [{id: vote.id, type: vote.type}]
                                voting.splice(i,1);
                                localStorage.setItem('voted',JSON.stringify(votedArray));
                                GetData('/vote-result',function (response) {
                                    if (response.status === 200) {
                                        let data = response.data[0];
                                        if(data.id == votedArray[0].id){
                                            $('#vote-item-container').slick('slickRemove',null, null, true)
                                            $('#vote-item-container').slick('slickAdd',VoteItem(data,votedArray[0].type));
                                        }
                                    }
                                });
                            }else{
                               let votedArray =  JSON.parse(voted)

                                votedArray.forEach(function (item,index){
                                    if(item.id == voting[i].id){
                                       votedArray.splice(index,1);
                                       let obj = {id: voting[i].id, type: voting[i].type}
                                        votedArray.push(obj)
                                        localStorage.setItem('voted',JSON.stringify(votedArray));
                                        voting.splice(i,1);
                                    }else{
                                        let obj = {id: voting[i].id, type: voting[i].type}
                                        votedArray.push(obj)
                                        localStorage.setItem('voted',JSON.stringify(votedArray));
                                        voting.splice(i,1);
                                    }
                                })
                                GetData('/vote-result',function (response) {
                                    if (response.status === 200) {
                                        let data = response.data[0];
                                        votedArray.forEach(function (item){
                                            if(item.id == data.id){
                                                $('#vote-item-container').slick('slickRemove',null, null, true)
                                                $('#vote-item-container').slick('slickAdd',VoteItem(data,item.type));
                                            }else{
                                                $('#vote-item-container').slick('slickRemove',null, null, true)
                                                $('#vote-item-container').slick('slickAdd',VoteItem(data,item.type));
                                            }
                                        })
                                    }
                                });
                            }
                        }
                    })
                }
            }
        }
    });


</script>