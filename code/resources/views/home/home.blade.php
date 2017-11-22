<!doctype html>
<html lang="en">
<head>
    <title>Inholland Informatica</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
@include('home.modal')
<section id="banner" class="banner container-fluid">
    <div class="message">
        <h1>
            Inholland Informatica
        </h1>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris pretium libero sit amet tempus pretium. Suspendisse rutrum purus in ipsum dignissim, sit amet mollis sem vestibulum. Sed feugiat tellus at odio efficitur gravida. Sed nec tincidunt tellus, ac dapibus velit. Duis tincidunt leo libero, at ullamcorper arcu blandit ut. Nulla id eros malesuada, mollis purus sed, feugiat nibh. Nam aliquam eget lorem et faucibus.
        </p>
        <a href="#secondcontainer"><i class="fa fa-4x fa-arrow-circle-o-down"></i></a>
    </div>
</section>
@include('menu')
<div id="showcase" class="showcase container-fluid">
    <h1>
        Projecten van onze Studenten
    </h1>
    <div class="underline"></div>
    <p>
        hier onder projecten van studenten van Informatica Inholland
    </p>
    <div class="filters row">
        <button class="filter__btn" data-action="cat1"><i class="fa fa-2x fa-gamepad"></i></button>
        <button class="filter__btn" data-action="cat2"><i class="fa fa-2x fa-handshake-o"></i></button>
        <button class="filter__btn" data-action="cat3"><i class="fa fa-2x fa-pinterest"></i></button>
    </div>
    <div class="exhibit row">
        @for($i = 0; $i < 12; $i++)
              <div class="exhibit__frame col-4 col-sm-3 col-md-2 {{$i % 2 ==0 ? ($i % 3 == 0 ? "cat2": "cat3" ):"cat1"}}">
                  <a href="/project/{{$i}}" data-id="{{$i}}"><i class="fa fa-2x fa-search"></i></a>
                  <img class="exhibit__image" src="https://pbs.twimg.com/profile_images/848471660860538880/pevXVsIp.jpg">
              </div>
        @endfor
    </div>
</div>
<div id="events" class="events row container-fluid">
       @php
            $object = (object) [
                    'date' => new \DateTime(),
                    'img' => "https://static.pexels.com/photos/126407/pexels-photo-126407.jpeg",
                    'title' => "this is title",
                    'description' =>'This is text',
                    'id' =>1,
                    'creator'=>"Martin van der Gragt",
                ];
                $events = [$object,$object];

        @endphp
        @foreach($events as $event)
                @include('home.event', ['event' => $event])
            @endforeach
</div>
<div id="usps" class="usps container-fluid">
    <div class="row">
       <div class="col-md-3" style="text-align: center">
           <div class="usp">
               <i class="fa fa-4x fa-university"></i>
           </div>
           <h4>Doorgroei mogelijkheden</h4>
       </div>
        <div  class="col-md-3" style="text-align: center">
            <div class="usp">
                <i class="fa fa-4x fa-graduation-cap"></i>
            </div>
            <h4>Erkende HBO diploma</h4>
        </div>
        <div class="col-md-3" style="text-align: center">
            <div class="usp">
                <i class="fa fa-4x fa-rocket"></i>
            </div>
            <h4>Leer de nieuwste technieken</h4>
        </div>
        <div class="col-md-3" style="text-align: center">
            <div class="usp">
                <i class="fa fa-4x fa-users"></i>
            </div>
            <h4>
                De leerlingen staan centraal
            </h4>
        </div>
    </div>
</div>
<div id="map" class="map container-fluid">
    <div class="mapouter">
        <div class="gmap_canvas">
            <iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=inholland haarlem&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        </div>
        <style>.mapouter{overflow:hidden;height:500px;width:100%;}.gmap_canvas {background:none!important;height:500px;width:100%;}</style></div>
</div>
<div id="overons" class="over_ons container">
    <div class="row">
        <div class="col-md-4">
            <img width="100%" src="https://www.smashingmagazine.com/wp-content/uploads/2015/06/10-dithering-opt.jpg">
        </div>
        <div class="col-md-8">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris pretium libero sit amet tempus pretium. Suspendisse rutrum purus in ipsum dignissim, sit amet mollis sem vestibulum. Sed feugiat tellus at odio efficitur gravida. Sed nec tincidunt tellus, ac dapibus velit. Duis tincidunt leo libero, at ullamcorper arcu blandit ut. Nulla id eros malesuada, mollis purus sed, feugiat nibh. Nam aliquam eget lorem et faucibus.
        </div>
    </div>
</div>
<div id="contact" class="over_ons container">
    <div class="row">
        <div class="offset-md-2 col-md-8">

        </div>
    </div>
</div>
<div id="footer" class="footer container-fluid">
    <div class="sitemap container">
       <div class="row">
            <div class="col-md-12">
                <b>Sitemap</b>
            </div>
           <ul class="col-md-3 sitemap__list">
               <li>
                   <a href="#">Link </a>
               </li>
               <li>
                   <a href="#">Link </a>
               </li>
               <li>
                   <a href="#">Link </a>
               </li>
               <li>
                   <a href="#">Link </a>
               </li>
           </ul>
           <ul class="col-md-3 sitemap__list">
               <li>
                   <a href="#">Link </a>
               </li>
               <li>
                   <a href="#">Link </a>
               </li>
               <li>
                   <a href="#">Link </a>
               </li>
               <li>
                   <a href="#">Link </a>
               </li>
           </ul>
           <div class="createdby col-md-12">
              <b> Created by Martin van der Gragt</b>
           </div>
       </div>
    </div>
</div>
<script
        src="https://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script>
    $("a[href^='#']").on('click', function(e) {
        // prevent default anchor click behavior
        e.preventDefault();
        // animate
        $('html, body').animate({
            scrollTop: $(this.hash).offset().top
        }, 300, function(){
            // when done, add hash to url
            // (default click behaviour)
            window.location.hash = this.hash;
        });
    });
    $(".filter__btn").on("click",function(e){
        e.preventDefault();
        let filter = $(this).attr("data-action");
        $('.exhibit__frame').each(function(){
            $(this).show();
        });
        $('.exhibit__frame:not(.'+filter+')').each(function () {
            $(this).hide();
        });
    });
    $('.exhibit__frame a').on('click',function (e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax("/project/modal/"+id,{
            success:function (result) {
                $('.modal-content').html(result);
                $('#myModal').modal();
            }
        });
    });
</script>
</body>
</html>