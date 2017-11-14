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
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
    <a class="navbar-brand" href="#"><img src="/images/inholland.svg"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#banner">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
        </ul>
    </div>
</nav>
<div id="showcase" class="showcase container-fluid">
    <h1>
        Projecten van onze Studenten
    </h1>
    <div class="underline"></div>
    <p>
        hier onder projecten van studenten van Informatica Inholland
    </p>
    <div class="filters row">

    </div>
    <div class="exhibit">
        @for($i = 0; $i < 12; $i++)
              <div class="exhibit__frame">
                  <a href="http://www.google.nl"><i class="fa fa-2x fa-search"></i></a>
                  <img class="exhibit__image" src="https://pbs.twimg.com/profile_images/848471660860538880/pevXVsIp.jpg">
              </div>
        @endfor
    </div>
</div>
<div id="events" class="events container-fluid">

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
</script>
</body>
</html>