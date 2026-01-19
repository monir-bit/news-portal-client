<div class="section-container position-relative">
    <div class="container-fluid">
        <div id="siteLead" class="pt-2 pb-2 d-flex justify-content-between align-items-center">
            <div class="siteLeft">
                <div class="siteAction d-flex">
                    <button data-bs-toggle="offcanvas" href="#sideMenu" role="button" aria-controls="sideMenu" class="fas fa-bars"></button>
                    <a href="/search-archive"><button id="" class="fas fa-search"></button></a>
                    <!--<div  method="get" class="d-flex d-none bg-white align-items-center position-absolute check" style="left: 100px;"  id="openSearchBoxArea">-->
                    <!--    <input type="text"  class="form-control" id="searchTextInput">-->
                    <!--    <button id="searchingTextBtn"  class="fas fa-search"></button>-->
                    <!--    <button type="button" id="openSearchClose" class="fas btn-warning fa-times"></button>-->
                    <!--</div>-->
                 </div>
                <div class="siteDate d-none d-md-block ">
                    
                    <p class="f-12 mt-2 mb-0" id="todayDate">
                        <i class="fas fa-calendar-alt"></i>
                        <script>
                            let dateText = moment().locale('bn').format('LLLL').toString();
                            let date = dateText.split(',');
                            document.write(date[0] + ", " + date[1] + " ইং")
                        </script>
                  
                  
                        <script>
                            let dateConverted = new buetDateConverter().convert("j F, Y");
                            document.write(dateConverted + " বঙ্গাব্দ")
                        </script>
                </p>
              
                 </div>
            </div>
            <div class="siteLogo">
                <a href="/"><img  src="{{asset("img/logo.jpg")}}" alt="Agamir Somoy logo"></a>
            </div>
            <div class="siteRight">
                <div class="siteLanguage text-end f-16">
                    <a href="https://www.facebook.com/Newsagamirsomoy" class="col"><img height="18px" src="{{asset("img/f.png")}}" alt="site logo"></a>
                    <a href="https://www.youtube.com/@দৈনিকআগামীরসময়" class="col"><img height="18px" src="{{asset("img/y.png")}}" alt="site logo"></a>
                    <a href="#" class="col"><img height="18px" src="{{asset("img/t.png")}}" alt="site logo"></a>
                    <a href="#" class="col"><img height="18px" src="{{asset("img/i.png")}}" alt="site logo"></a>

            </div>
        </div>
    </div>
</div>

<script>

    $('#language').on('change', function(){
        let val = $(this).val();
        if(val == "english"){
             window.location.href = "https://en.bnbd24.com";
        }
    });


    $('#searchingTextBtn').on('click',function (){
        let data = $('#searchTextInput').val();
        if(data !== ""){
            window.location.href = site.front_site_url + "/search/"+data;
        }

    })

    $('#openSearchBtn').on('click', function (){
        $(this).addClass('d-none');
        $('#openSearchBoxArea').removeClass("d-none")
    })

    $('#openSearchClose').on('click', function (){
        $('#openSearchBtn').removeClass('d-none');
        $('#openSearchBoxArea').addClass("d-none")
    })



</script>