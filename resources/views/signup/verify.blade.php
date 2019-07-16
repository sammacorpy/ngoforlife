@extends('layout.base')

@section('title','verify')
@section('wavecolor','#FF6506')
@section('stylesheet')
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/signupstyle.css">
@endsection

@section('body')
 


<div class="jumbotron">
    @if(isset($_SESSION['verif#09']))
        <div class="lgoutmsg">
            <CENTER>"You have successfully verified your account"</CENTER>
        </div>
        <?php
            unset($_SESSION['verif#09']);
        ?>
</div>
<div class="container" >
    <div class="row">
        
            
                <br>
                <br>

                <center><a id="signinlink" href="/signin" class="custombutton btncustom" style="position:absolute;display:inline-block;top:0;bottom:0;left:0;right:0;margin:auto;width:100px;height:40px;">Sign In</a></center>
            @else

                <br>
                <br>

                <center><a id="signinlink" href="/" class="custombutton btncustom" style="position:absolute;display:inline-block;top:0;bottom:0;left:0;right:0;margin:auto;width:100px;height:40px;">Home</a></center>
            

            
            @endif

    </div>
                    


</div>
<nav class="footer" style="position:fixed;bottom:0px;top:auto;">
        Copyright © 2017 | ngoforlife.com Pvt. Ltd. | All Rights Reserved | Privacy Policy & Website Terms of Use
    </nav>
@endsection