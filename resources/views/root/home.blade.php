<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ngo For Life || Home</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/bootstrap.css">

    <link rel="stylesheet" href="css/bootstrap-theme.css">

    <link rel="stylesheet" href="/css/style.css">
    
    <link rel="stylesheet" href="/wow/css/libs/animate.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js "></script>
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
        
        body {
            background-color: #fffcff;
            margin: 0px;
            padding: 0px;
            color: #909090;
        }
    </style>





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
                                 <polyline id="svg_1" points="6.000001907348633,24.819334030151367 28.851642608642578,24.819334030151367 32.4597053527832,18.212888717651367 36.0677604675293,24.819334030151367 40.27745819091797,24.819334030151367 43.283878326416016,30.325246810913086 48.69567108154297,5.000001907348633 53.50642013549805,34.729000091552734 55.91238784790039,24.819334030151367 63.72955322265625,24.819334030151367 67.33820343017578,22.066917419433594 71.54731750488281,24.819334030151367 95,24.819334030151367 " stroke-miterlimit="10" stroke-width="3" fill="none" stroke="#E61627" opacity="0.8"/>
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
                    <li class="nav-item"><a href="news">News</a></li>
                    
                    
                    

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item" >
                        @if(isset($_SESSION['usrname']))
                            <a href="/profile/{{ $_SESSION['usrname'] }}" class="underline">{{$_SESSION['usrname']}}</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <img src="https://ngoforlife.s3.ap-south-1.amazonaws.com/{{$p}}" style="margin-top:-5px;padding:0px;border-radius:100%;" width="30" height="30"></a>
                        <ul class="dropdown-menu dropdown-cart" role="menu">
                            <li>
                                <a href="/profile/{{ $_SESSION['usrname'] }}" style="color:#808080;">View profile</a>
                            </li>

                            <li>
                                <a href="/profile/e/{{ $_SESSION['usrname'] }}" style="color:#808080;">Edit Profile</a>
                            </li>
                            <li>
                                <a href="/changepass/e/{{$_SESSION['usrname']}}" style="color:#808080;">Change Password</a>
                            </li>

                            <li><a href="/logout" style="color:#808080;">Logout</a></li>
                        </ul>
                    </li>
                
                @else                
                    <a href="/signin" class="underline">Login <i class="fa fa-sign-in"></i></a></li>
                @endif
                </ul>

            </div>





        </div>

    </nav>
        @if(isset($_SESSION['usrname']) && isset($_SESSION['verified']))
            @if($_SESSION['verified']==0)
                
                <div class="verinotif">
                    <div class="cross"><i class="fa fa-window-close fa-2x" aria-hidden="true"></i></div>
                    <div class="verificmsg">
                        Please verify your account, Verification link has been sent to your Email address.
                    </div>
                    <canvas width="370px" height="370px" id="logring">
                    </canvas>
                    <script src="/js/anim.js">
                    </script>
                    <center>
                        <div class="verifyerror">didn't recieve the verification mail yet?</div>
                        <a href="/resendverif/{{ $_SESSION['usrname'] }}"><div class="btnverif">Resend verification mail</div></a>
                    </center>
                </div>

                
                    
                @endif
            @endif

        @if(count($errors)>0)
            @foreach($errors->all() as $err)
                
                <div class="verinotif">
                    <div class="cross"><i class="fa fa-window-close fa-2x" aria-hidden="true"></i></div>
                    <div class="verificmsg">
                       {{ $err }}
                    </div>
                    <canvas width="370px" height="370px" id="logring">
                    </canvas>
                    <script src="/js/anim.js">
                    </script>
                </div>

                
                    
            @endforeach
        @endif
    <div class="jumbotron">
        <div class="container">
            

            <div class="row">
                <div class="col-md-6">
                    <img src="/img/jumbblood.jpg" width="500px" height="500px" class="img-circle img-responsive" style="margin:auto;position:relative;top:0;bottom:0;">
                </div>
                <div class="col-md-6">
                    <div id="quotes">Donate Blood & Save Life</div>
                    <p style="color:#fffcff;font-size:18px;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Blood Donation is service to Humankind, By Donating Blood you help a needy and save a precious life. Transfusion of blood every year saves Millions of life all over the world every year, there are Millions of Blood Donors all over
                        the world But still there are number of countries who don’t have adequate number of blood suppliers and face the challenge of blood supply to the patients.</p>
                </div>
            </div>


        </div>
    </div>







    <div class="container-fluid" id="maincontent">

        <div class="row">
            <div class="col-md-6">
                <br>
                <div style="margin-left:10%;margin-top:10%;font-family: 'Slabo 27px', serif;font-size:3em;color:#eb4452">No one should die because they cannot afford health care.</div>
                <p style="margin-left:10%;font-family: 'Slabo 27px', serif;font-size:1.5em;color:#eb4452">
                 Yes, People die when they don't have access to health care. One study in 2009 found 45,000 people died every year for lack of health insurance.
                   <br> 
                </p>
                <a href="#" style="font-size:20px;display:inline-block;margin-top:10px;margin-left:10%;" class="btndonate">Donate here</a>
            </div>
            <div class="col-md-6">
                <div style="margin:0%;border-radius:100%;">
                    <img src="/img/help.png" class="img-responsive img-rounded">
                </div>

            </div>

        </div>













        <div class="row" id="hospitaldetails">
            <div class="col-md-4">
                <div style="padding:10%;margin:10%;">
                    <img src="/img/moneytree.png" class="img-responsive">
                </div>

            </div>

            <div class="col-md-8">

                <h1 style="margin-left:10%;margin-top:10%;"><a href="#" class="btnmoneyreq"><b>Request for help </b></a>
                </h1>
                <br>
                <p class="paramtree">Need money for your treatment? Send us your medical details and and get financial help for your treatment.As the patient, you don't have the time or energy for a difficult process to manage. With Life, you can start a free, easy fundraiser using our wizard in just a few minutes to help with medical bills and cover healthcare costs. </p><br>
                <p class="paramtree">Your friends and family want to find a way to show you their support without being a burden all the time and asking what you need. Life's social sharing features will make it easy for you to spread the word to starting bringing in donations right away. (It's fast and easy to link your bank account using wePay too!) Your fundraiser is an easy way to allow your family and friends to make a donation, and you can use features right on the page to keep all your supporters updated with your progress throughout your treatment and recovery. </p>

            </div>

        </div>




    </div>



    <div class="container-fluid" style="padding-left:0px;">

        <div class="row" id="parentrobot">
            <div class="col-md-5">
                <div class="inflex">
                    <div class="square">



                    </div>
                    <div class="circle">

                    </div>
                </div>


            </div>

            <div class="col-md-6">
                <div class="robotex">
                    <div id="alc">How you can Help</div>
                </div>

                <div class="svgdia wow bounceInLeft">
                    <svg id="svga" width="165" height="430" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                            <g>
                             <title>Layer 1</title>
                             <g id="svg_1" stroke="null"/>
                             <g id="svg_7"/>
                             <g id="svg_9">
                              <ellipse id="svg_2" fill="none" stroke-width="4" cx="124" cy="114" class="svga" rx="11.5" ry="11.5" stroke="#eb4452"/>
                              <ellipse id="svg_3" fill="none" stroke-width="4" cx="145" cy="216" class="svga" rx="11.5" ry="11.5" stroke="#eb4452"/>
                              <ellipse id="svg_4" fill="none" stroke-width="4" cx="119" cy="314" class="svga" rx="11.5" ry="11.5" stroke="#eb4452"/>
                              <ellipse id="svg_5" fill="none" stroke-width="4" stroke-opacity="null" fill-opacity="null" cx="124" cy="114" class="svga" rx="4.5" ry="4.5" stroke="#eb4452"/>
                              <ellipse id="svg_6" fill="none" stroke-width="4" stroke-opacity="null" fill-opacity="null" cx="145" cy="216" class="svga" rx="4.5" ry="4.5" stroke="#eb4452"/>
                              <ellipse id="svg_8" fill="none" stroke-width="4" stroke-opacity="null" fill-opacity="null" cx="119" cy="314" class="svga" rx="4.5" ry="4.5" stroke="#eb4452"/>
                              <line fill="none" stroke="#eb4452" stroke-width="2" x1="112" y1="120" x2="6" y2="180" id="svg_12"/>
                              <line fill="none" stroke-width="2" x1="131" y1="215" x2="14" y2="215" id="svg_13" stroke="#eb4452"/>
                              <line fill="none" stroke="#eb4452" stroke-width="2" x1="107" y1="309" x2="8" y2="254" id="svg_14"/>
                             </g>
                            </g>
                           </svg>


                    <div>
                        <div id="txt1help">
                            Donate Blood
                        </div>
                        <div id="txt2help">
                            Donate Body Organs

                        </div>
                        <div id="txt3help">
                            Donate Money
                        </div>
                    </div>
                </div>


            </div>




        </div>





    </div>


    <div class="container-fluid" id="aboutus">
    
        <div class="row">
            
            <div class="col-md-12 " id="abtushead">ABOUT US</div>
            
    
        </div>
        <div class="row" id="abtusbody">
            <div class="col-md-4 abtcol">
                <h3>
                    Our Health Mission
                </h3>
                <p> 
                    Our experienced medical professionals put your healing needs first. We are proud to provide a high quality level of customer service, medical experience, and commitment to health and wellness to all our patients. Our goal is to make you feel better as quickly as possible.
                </p>
            </div>
            <div class="col-md-4 abtcol">
                <h3>
                    Experience and Professionalism
                </h3>
                <p> 
                    With years of experience, ur medical team will assess you and create a custom recovery plan that's right for you. We understand the importance of educating you on the most effective ways to take care of your body, so that you can heal quickly.
                </p>
            </div>
            <div class="col-md-4 abtcol">
                <h3>
                    Physicians Who Care
                </h3>
                <p> 
                    Not only will our doctors treat your existing conditions, we also work to prevent pain and illness from occurring. we strive to help you improve your quality of life, achieve your wellness goals, and heal your body to live your best life possible.
                </p>
            </div>
        
        </div>

        <div class="row" id="subscribebody">
        <center><h2>SUBSCRIBE</h2></center>
        <center><p>Sign up to hear from us</p></center>
        <br>
            <div class="col-md-8 col-md-offset-2">
                <form action="/sbscr" method="POST" class="form-horizontal" role="form">
                {{ csrf_field() }}
                    <div style="display:flex">
                        <input type="email" id="fsubem" name="emailid" placeholder="Email Address" required>   
                        <button type="submit" class="subscr">Subscribe</button>
                    
                    </div>
                    {{--  @if(count($errors)>0)
                    
                        <div class="subscrmsg">
                            @foreach($errors->all() as $err)
                                <div style="color:#fff;margin-top:20px;">
                                     {{ $err }}
                                 </div>
                            @endforeach
                        </div>
                    @endif  --}}

                    
                   
                </form>

            </div>
        </div>
    
    </div>

    




    <div class="divhr"></div>
    <nav class="footer">
        Copyright © 2017 | ngoforlife.com Pvt. Ltd. | All Rights Reserved | Privacy Policy & Website Terms of Use
    </nav>
    
    <script type="text/javascript " src="/js/bootstrap.js "></script>
    <script src="/js/site.js"></script>
    <script src="/wow/dist/wow.js"></script>
    <script>
        wow = new WOW({
            animateClass: 'animated',
            offset: 100,
            callback: function() {}


        });
        wow.init();
    </script>



</body>

</html>