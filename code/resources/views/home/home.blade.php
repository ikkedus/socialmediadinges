<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style></style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"></head>
    <style>
        .banner{
            height: 100vh;
            color:white;
            background: url("http://www.sigids.nl/wp-content/uploads/2014/08/inhollandhaarlem.jpg");
            background-size: cover;
            position: relative;
        }
        .banner nav > a {
            text-shadow: 1px 1px 6px #000;
        }
        .banner nav .nav-item > a {
            text-shadow: 1px 1px 6px #000;

        }
        .banner-text{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 90vh;
        }
        .banner-text > *{
            color:white;
            text-align: center;
            text-shadow: 1px 1px 6px #000;
        }
        .arrow,
        .arrow:before {
            position: absolute;
            left: 50%;
            bottom: 5%;
        }

        .arrow {
            width: 40px;
            height: 40px;
            margin: -20px 0 0 -20px;
            -webkit-transform: rotate(45deg);
            border-left: none;
            border-top: none;
            border-right: 3px #fff solid;
            border-bottom: 3px #fff solid;
        }

        .arrow:before {
            content: "";
            width: 20px;
            height: 20px;
            margin: -10px 0 0 -4px;
            border-left: none;
            border-top: none;
            border-right: 2px #fff solid;
            border-bottom: 2px #fff solid;
            animation-duration: 2s;
            animation-iteration-count: infinite;
            animation-name: arrow;
        }

        @keyframes arrow {
            0% {
                opacity: 1;
            }
            100% {
                opacity: 0;
                transform: translate(-15px, -15px);
            }
        }
        footer{
            background-color: #222;
        }
        footer ul{
            list-style: none;
        }
    </style>
<body>
<div class="banner">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="banner-text">
            <div>
                <h1 id="homeHeading">Informatica op de Hogeschool Inholland</h1>
                <h3>Onze visie is work hard and play hard!</h3>
            </div>
        </div>
    </div>
    <a href="#">
        <div class="arrow"></div>
    </a>
</div>
<div class="container">
    <h2>
        Events
    </h2>
    //todo:laad hier EVENTS in
</div>
<div class="container">
    <h2>
        Showcase projecten
    </h2>
    //todo:laad hier highlights in
</div>

<div class="container">
    <h2>
        Algemene informatie
    </h2>
    //todo:laad hier contentblocks in
</div>
<div class="container">
    <h2>
        Social Media sectie
    </h2>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul class="sitemap">
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>