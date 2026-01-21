<div class="section-container position-relative">
    <div class="container-fluid">
        <div id="siteLead" class="pt-2 pb-2 d-flex justify-content-between align-items-center">
            <div class="siteLeft">
                <div class="siteAction d-flex">
                    <div class="siteDate d-none d-md-block ">

                        <p class="f-12 mt-2 mb-0" id="todayDate">
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

            </div>
            <div class="siteLogo">
{{--                <a href="/"><img  src="{{asset("img/logo.jpg")}}" alt="Agamir Somoy logo"></a>--}}
                <h1 style="font-size: 56px; font-weight: bolder; color: red">আগামীর সময়</h1>
            </div>
            <div class="siteRight">
                <a href="/search-archive"><button id="" class="fas btn btn-outline-secondary fa-search"></button></a>

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