<?php $topbannar=\DB::table('advertises')->where('type','layout_top_add')->first(); ?>

@if($topbannar)
<div id="layout_top_adds" class="addBanner mt-3 d-flex justify-content-center">
    <!-- TOP Layout Advertise -->
  
     <a href="{{@$topbannar->image_link}}" class="news  link border-bottom  ">
                        <img class="img-fluid" src="{{@$topbannar->image}}" >
                        
                    </a>
</div>
@endif

<div id="trending" class="section-container ">
    <div class="keywords mt-2 mb-2 menu">
     
        <div id="trendingItems" class="">
   <label style="margin-right: 10px;" class="f-15">আলোচিত: </label>
        </div>
    </div> 
</div>

<script>

    GetData('/get-all-trending/6', function (response){
        if(response.status === 200){
            let data = response.data;
            if(data.length > 0){
                data.forEach(function (item){
                    $('#trendingItems').append(`
                        <a href="/get-trending-news/${item.id}" class="btn btn-sm  m-2  " style="background:#c1f6ff;">${item.name}</a>
                    `)
                })
            }else{
                $('#trending').remove();
            }
        }
    })
</script>