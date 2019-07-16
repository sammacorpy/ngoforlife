@extends('layout.base')

@section('title','Sign In')
@section('wavecolor','#FF6506')
@section('stylesheet')
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/signupstyle.css">
    
@endsection
@section('body')
 
<?php session_start();
?>


<div class="jumbotron " >
    @if(isset($_SESSION['wx089lgout']))
    <div class="lgoutmsg">
    <CENTER>{{ $_SESSION['wx089lgout'] }}</CENTER>
    </div>
    <?php unset($_SESSION['wx089lgout']);
    session_destroy(); ?>

    @elseif(isset($_SESSION['pwdchange']))
    <div class="lgoutmsg">
    <CENTER>Password changed successfully</CENTER>
    </div>
    <?php unset($_SESSION['pwdchange']);
    session_destroy(); ?>


    @endif
</div>

 <div class="container">
    <div class="row formsign">
        <div class="col-sm-5" style="padding-left:50px;padding-right:50px;" id ="switchreg">
        @if(count($errors)>0)
            <div style="border:1px solid orange;padding:10px;color:#909090;margin-bottom:5px;">
                @foreach($errors->all() as $e)
                {{$e}}<br>
                @endforeach
            </div>
        @endif
            <form action="/signin" method="POST" role="form">
                {{csrf_field()}}
                <div class="legend">Sign In <i class="fa fa-sign-in"></i></div>


                <div class="form-group">
                   
                    <input type="text" class="form-control" id="username" value= "{{ old('username')}}" name="username" placeholder="Username or Email" required>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required onkeypress="capLock(event)">
                    <div id="capskey" style="display:none;color:#EB4452;margin-top:5px;">Capslock is on.</div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="submit" class="custombutton btncustom  " value="Sign In">
                    </div>

                    
                    <div class="col-md-6 forgotpass"><a href="/fpwd">Forgot password?</a></div>   

                </div> 
            </form>
       
                    
        </div>
        <div class="col-sm-5 signuptemp">
            <h3>
                Don't have an account?
            </h3>
            

            <p><button class="btncustom signupbtn" id="sgnup">Click Here</button>
            </p>
        </div>
    </div>
    <br>
    <br>
    </div>
    <script src="/js/aj.js">

        
    </script>
    
    
            
          

             <nav class="footer" style="position:fixed;bottom:0px;top:auto;">
        Copyright © 2017 | ngoforlife.com Pvt. Ltd. | All Rights Reserved | Privacy Policy & Website Terms of Use
    </nav>


@endsection
