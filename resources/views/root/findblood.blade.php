@extends('layout.base')

@section('title','Search For Blood')
@section('wavecolor','orange')
@section('stylesheet')
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/profile.css">
    <link rel="stylesheet" href="/css/bs.css">
    
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nixie+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gentium+Book+Basic" rel="stylesheet">     

    
@endsection
@section('navitems')
    @if(!isset($_SESSION['usrname']))
        <form class="navbar-form navbar-right" role="search" action="/signin" method="post">
        {{ csrf_field() }}
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btncustom custombutton" style="background-color:orange;">Sign In</button>
        </form>

    @else
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item" >
                <a href="/profile/{{ $_SESSION['usrname'] }}" class="underline">{{$_SESSION['usrname']}}</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> 
                    <img src="https://ngoforlife.s3.ap-south-1.amazonaws.com/{{$p}}" style="margin-top:-5px;padding:0px;border-radius:100%;" width="30" height="30">
                </a>
                <ul class="dropdown-menu dropdown-cart" role="menu">
                    <li><a href="/logout" style="color:#808080;">Logout</a></li>
                </ul>
            </li>
        </ul>   

    @endif

@endsection

@section('body')
    
    @if(count($errors)>0)
    <div class="jumbotron">
        <div class="errors">
            @foreach($errors->all() as $e)
                {{$e}}  
            @endforeach
        </div>
    </div>
    @endif
    

    <div class="container searchbox">

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="heading">
                <i class="fa fa-search" style="color:orange"></i> Find your blood donor
            </div>
            <form action="/bs" method="POST" class="" role="form">
                {{ csrf_field() }}

                <div class="form-group city">
                    <input type="text" class="form-control" name="ccity" id="ccity" placeholder="City" required>
                </div>
                <div class="form-group bgrp" >
                    <input type="text" class="form-control" name="bloodgrp" id="bloodgrp" placeholder="Blood Group" required>
                </div>

                
                <div class="form-group btnpress">
                    <button type="button" id="search" class="btn btncustom">Find</button>
                </div>
            </form> 
        </div>

    



    </div>

    <div class="result" id="result">
        <div class="tablesres">
            <div class="cross"><i class="fa fa-window-close fa-2x" aria-hidden="true"></i></div>
            <button type='button' class='backwardbtn' id='backward' data-value='1'><i class='fa fa-chevron-up fa-2x' aria-hidden='true' style='color:gray;'></i></button>
       
            <div class="tablesembed" id="embed">
               
            </div>


            <br>
            <br>
            <button type='button' class='forwardbtn' id='forward' data-value='1'><i class='fa fa-chevron-down fa-2x' aria-hidden='true' style='color:gray;'></i></button>
       
        </div>

        
    </div>
    <script src="/js/bsajx.js"></script>
    <script src="/js/profile.js"></script>
@endsection