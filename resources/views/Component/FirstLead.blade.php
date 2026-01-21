<!--<div id="layout_top_adds" class="addBanner mt-3 d-flex justify-content-center">-->
    <!-- TOP Layout Advertise -->
<!---</div>-->

<div class="section-container">
    <div id="firstLead" class="mt-3 row  mb-3 d-flex justify-content-between">


        <div class="flLeft border-right col-12 col-sm-12 col-md-6 col-lg-3" >
            <div class="3news titleNews2" id="sideLeadNews">
                <!-- LEFT FIRST LEAD NEWS -->
            </div>
            <!--               Advertise   --->
            <div id="home_lead_left" class="advertise mt-4 mb-3 text-center  overflow-hidden">

            </div>
        </div>

        <div href="#" class="flLead col-12 col-sm-12 col-md-12 col-lg-6">
            <div id="mainLead" style="overflow: hidden;">
                <!--MAIN FIRST LEAD NEWS -->
            </div>
        </div>
        


        <div class="flRight col-12 col-sm-12 col-md-6 col-lg-3" >
            <div  class="endNews">
                <!-- Nav pills -->
                <ul class="nav border-bottom  mb-2  pb-1 pt-1 border-top nav-pills">
                    <li class="nav-item">
                        <a class="nav-link text-dark active f-20" data-bs-toggle="pill" href="#home">সর্বশেষ</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link text-dark f-20" data-bs-toggle="pill" href="#menu1">সর্বাধিক</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content endNewsItem">
                    <div class="tab-pane p-0 container active" id="home">
                        <div class="titleNews2" id="SorbosesNews">
                            <!--- Sorboses News -->
                        </div>
                    </div>
                    <div class="tab-pane p-0 container fade" id="menu1">
                        <div class="titleNews2" id="SorbadikNews">
                            <!-- Sorbadik News -->
                        </div>
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
        axios.get(site.url('/get-all-news/1/lead_news/5/0')).then(async function(response){
            if(response.status === 200){
                let data = response.data;

                //Side Lead News
                function siteLeadNews(newsID,image,title,time, description){
                    $('#sideLeadNews').append(`
                    <div class="link border-bottom   mb-4">
                        <a href="/get-news/${newsID}"  class="news first-lead-3news  ">
                            <img class="image" src="${image}">
                            <div class="ms-2">
                                <h5 class="title m-0 line-2" style="margin-bottom: 5px!important;">${title}</h5>
                            </div>
                        </a>
                        <p>${description}</p>
                    </div>
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

                        let news = data[i];
                        //Main Lead
                        $('#mainLead').append(`
                            <a id="mainLead" style="display: block;" class="link href="/get-news/${news.id}" >
                              <img class="image img-fluid" style="width: 100%;" src="${news.image}" alt="Image">
                                <h1 class="mt-3">${news.title}</h1>
                                <p class="line-2">${news.sort_description}</p>
                            </a>

                         `);

                    }

                    if(data[i].order == "2"){
                        siteLeadNews(data[i].id,data[i].image,data[i].title, data[i].date, data[i].sort_description)
                    }else if(data[i].order == "3"){
                        siteLeadNews(data[i].id,data[i].image,data[i].title, data[i].date, data[i].sort_description)
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