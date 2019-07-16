<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/bootstrap.css">

    <link rel="stylesheet" href="/css/bootstrap-theme.css">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="/js/capskey.js"></script>
    

    @section('stylesheet')
    @show
    <link rel="stylesheet" href="/wow/css/libs/animate.css">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">

    <link href="#" rel="shortcut icon" type="image/vnd.microsoft.icon">

    <style type="text/css">
        @font-face {
            font-family: 'Aladin';
            font-style: normal;
            font-weight: 400;
            src: local('Aladin Regular'), local('Aladin-Regular'), url(/wzM-ZeRLnblnioNhK00GaA.woff2) format('woff2');
            unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        
        @font-face {
            font-family: 'Aladin';
            font-style: normal;
            font-weight: 400;
            src: local('Aladin Regular'), local('Aladin-Regular'), url(/wzM-ZeRLnblnioNhK00GaA.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
        }
        
        
    </style>





    <title>Ngo For Life || @yield('title')</title>

</head>
    <body>

        <nav class="navbar navbar-default navbar-fixed-top" id="topfixnav">
            <div class="container">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" id="navbut">
                <span class="icon-bar" style="width:20px;" ></span>
                <span class="icon-bar" style="width:20px;"></span>	
                <span class="icon-bar" style="width:20px;"></span>



                </button>

                    <a id="imglogo" style="width:130px;" href="/" class="navbar-brand">
                        <div class="heart-rate">
                            <svg width="100" height="40" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                                    <g>
                                    <title>Life</title>
                                    <polyline id="svg_1" points="6.000001907348633,24.819334030151367 28.851642608642578,24.819334030151367 32.4597053527832,18.212888717651367 36.0677604675293,24.819334030151367 40.27745819091797,24.819334030151367 43.283878326416016,30.325246810913086 48.69567108154297,5.000001907348633 53.50642013549805,34.729000091552734 55.91238784790039,24.819334030151367 63.72955322265625,24.819334030151367 67.33820343017578,22.066917419433594 71.54731750488281,24.819334030151367 95,24.819334030151367 " stroke-miterlimit="10" stroke-width="3" fill="none" stroke= @yield('wavecolor') opacity="0.8"/>
                                    </g>
                            </svg>

                        </div>
                    </a>






                </div>
                
                
                <div class="navbar-collapse collapse" style="margin-top:0px;">
                    <ul class="nav navbar-nav navbar-left " id="topnava">

                        <li class="nav-item"><a class="active" href="/" id="lol"><i class="fa fa-home fa-lg"></i></a></li>
                         <li class="nav-item">
                        <a href="/bs">Find Blood</a>
                        </li>
                        <li class="nav-item"><a href="/news">News</a></li>
                        
                    
                    

                

                    </ul>
                    @section('navitems')
                    @show

                </div>





            </div>

        </nav>
        
        
            @section('body')
            @show
            

        

        
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </body>
</html>