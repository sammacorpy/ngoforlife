@extends('layout.base')

@section('title','Sign In')
@section('wavecolor','#FF6506')
@section('stylesheet')
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/signupstyle.css">
    
    
@endsection
@section('body')
 



<div class="jumbotron " >
    
</div>

 <div class="container">
    <div class="row formsign">
        <div class="col-sm-offset-3 col-sm-6" style="padding-left:50px;padding-right:50px;" id ="switchreg">
        @if(count($errors)>0)
            <div style="border:1px solid orange;padding:10px;color:#909090;margin-bottom:5px;">
                @foreach($errors->all() as $e)
                {{$e}}<br>
                @endforeach
            </div>
        @endif
     
            <form action="" method="POST" role="form">
            {{ method_field('PUT') }}
                {{csrf_field()}}
                <div class="legend">Password Reset <i class="fa fa-lock" aria-hidden="true"></i></div>

                <div class="form-group">
                    <input type="password" class="form-control" id="" value= "" name="oldpassword" placeholder="Old password" required onkeypress="capLock(event)">
                    <div id="capskey" style="display:none;color:#EB4452;margin-top:5px;">Capslock is on.</div>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="" value= "" name="newpassword" placeholder="New password" required onkeypress="capLock(event)">
                    <div id="capskey" style="display:none;color:#EB4452;margin-top:5px;">Capslock is on.</div>
                </div>
                
                <div class="form-group">
                    <input type="password" class="form-control" id="" value= "" name="confpassword" placeholder="Confirm password" required>
                </div>

                <br>
                <p style="color:#909090;">OTP is Sent to Your Email.</p>
                <div class="form-group">
                    <input type="text" class="form-control" id="" value= "" name="otp" placeholder="Enter OTP" required>
                </div>

                <div class="form-group">
                <input type="submit" class="custombutton btncustom" value="Reset" style="width:100px;border-radius:10px 0 10px 0;">
                </div>

                    
                   

                </div> 
            </form>
       
                    
        </div>
        
    </div>
    <br>
    <br>
    </div>
    
    
    
            
          

             <nav class="footer" style="position:fixed;bottom:0px;top:auto;">
        Copyright © 2017 | ngoforlife.com Pvt. Ltd. | All Rights Reserved | Privacy Policy & Website Terms of Use
    </nav>


@endsection