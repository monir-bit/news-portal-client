<div id="secondLead" class="section-container">
    <div class="row">


        <div class="col-12">
            <div class="row" id="secondLeadNews">
                <!--SECOND LEAD NEWS -->
            </div>
        </div>
    </div>
</div>

<script>

    HomeSecondLead();

  /*  Advertise('/advertise/home_second_lead_left_add',$('#home_second_lead_left'))*/

    function HomeSecondLead(){
        GetData('/get-all-news/1/second_lead/4/0', function(response){
            if(response.status === 200){
                let data = response.data;
                let order = 9;
                for(let i = 0;i < data.length; i++){

                    for(let j = 0;j < order; j++){
                        if(data[i].order == j+1){
                            SecondLead(data[i].id,data[i].title, data[i].image, data[i].date);
                        }
                    }
                }
            }
            else{
                console.log(response)
            }

            function SecondLead(newsID,title,image,time,category){
                $('#secondLeadNews').append(`
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">
                    <a  href="/get-news/${newsID}" class="card link overflow-hidden w-100" style="width: 18rem;height: 300px;">
                        <img src="${image}" height="180px" style="object-fit: cover" alt="Tittle">
                        <div class="card-body">
                            <p class="card-text f-18">${title}</p>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex f-13 align-items-center"></div>
<!--                                <div class="f-13"><i class="fas fa-tags" style="margin-right: 5px"></i> ${category} </div>-->
                            </div>
                        </div>
                    </a>
                </div>
            `);
            }
        })



        GetData('/get-all-latest/10/0', function (response){
            if(response.status === 200){
                let data = response.data;
                let order = 12;
                for(let i = 0; i < data.length; i++){
                    // for(let j = 0; j < order ; j++){
                    //     if(data[i].order == j+1){
                            //console.log(j+1)
                            $('#SorbosesNews').append(`
                            <a href="/get-news/${data[i].id}" class="news p-0 link border-bottom mt-2 mb-2">
                                <img  style="height: 65px;" class="image" src="${data[i].image}">
                                <div>
                                    <h5 class="title line-2" style="margin-bottom: 5px!important;">${data[i].title}</h5>
                                  
                                </div>
                            </a>
                         `);
                        // }
                    // }
                }
            }
        });




        GetData('/get-all-sorbadhik/10', function (response){
            if(response.status === 200){
                let data = response.data;
                for(let i = 0; i < data.length; i++){
                    $('#SorbadikNews').append(`
                    <a href="/get-news/${data[i].id}" class="news p-0 link border-bottom mt-2 mb-2">
                        <img style="height: 65px;" class="image" src="${data[i].image}">
                        <div>
                            <h5 class="title line-2" style="margin-bottom: 5px!important;">${data[i].title}</h5>
                            
                        </div>
                    </a>
                `);
                }
            }
        });
    }
</script>