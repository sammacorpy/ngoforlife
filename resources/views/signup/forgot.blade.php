@extends('layout.base')

@section('title','Sign In')
@section('wavecolor','#FF6506')
@section('stylesheet')
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/signupstyle.css">
    
@endsection
@section('body')
 



<div class="jumbotron" >


 
    
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
            <form action="/fpwd" method="POST" role="form">
                {{csrf_field()}}
                <div class="legend">Password Reset <i class="fa fa-lock" aria-hidden="true"></i></div>


                <div class="form-group">
                    <input type="text" class="form-control" id="username" value= "{{ old('username') }}" name="username" placeholder="username or Email" required>
                </div>

                <div class="form-group">
                <input type="submit" class="custombutton btncustom" value="Next" style="width:100px;border-radius:10px 0 10px 0;">
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