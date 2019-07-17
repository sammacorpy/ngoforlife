@extends('layout.base')
@section('title','Profile')
@section('wavecolor','#EB4552')
@section('stylesheet')
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/profile.css">
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
            <button type="submit" class="btncustom custombutton">Sign In</button>
        </form>

    @else
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item" >
                <a href="#abtuser" class="underline">{{$_SESSION['usrname']}}</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <img src="https://ngoforlife.s3.ap-south-1.amazonaws.com/{{$ps}}" style="margin-top:-5px;padding:0px;border-radius:100%;" width="30" height="30"></a>
                <ul class="dropdown-menu dropdown-cart" role="menu">
                    <li>
                        <a href="e/{{ $_SESSION['usrname'] }}" style="color:#808080;">Edit profile</a>
                    </li>
                                <li><a href="/logout" style="color:#808080;">Logout</a></li>
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
    

    <div class="container">

        <div class="row prf" id="abtuser">
            
            
            <div class="col-md-2 rightpart">
                <div>
                    <form enctype="multipart/form-data" method="post" action="/imgupload" id="imageup">
                    {{ csrf_field() }}
                        <img src="https://ngoforlife.s3.ap-south-1.amazonaws.com/{{$p}}" class="imgupload" >
                        @if($permission==1)
                        <div class="changeimg">upload image</div>
                        <input type="file" id="inpfile" class="inpfileupload" name="imgprof">
                        @endif
                    </form>
                </div>
                <div class="nameplate">
                     {{ $username }}
                </div>
            </div>
            @if(!empty($userdetails))
            <div class="col-md-7 col-md-offset-1 leftpart">
                <div class="data-content">
                
                    <div class="row profdesk">
                            @if($job_id=='1' || $job_id=='2')
                                <b>Name</b>
                            @elseif($job_id=='3')
                                <b>Pharmacy Name</b>
                            @else
                                <b>Hospital Name</b>
                            @endif

                            <div class="element">
                                @if($job_id=='2')
                                Dr. {{ $fname.' '.$lname}}
                                @elseif($job_id=='3')
                                {{ $userdetails->name }}
                                @elseif($job_id=='4')
                                {{ $userdetails->name }}
                                @else                            
                                {{ $fname.' '.$lname}}
                                @endif
                            </div>
                            @if($job_id=='2' || $job_id=='1')
                            <b>Blood Group</b>
                            <div class="element"> {{ $userdetails->bloodgrp}}</div>
                            @endif
                            @if($permission==1)
                                @if($job_id=='1' || $job_id=='2')
                                <b>Adhar Number</b>
                                <div class="element">{{ $userdetails->adharno}}</div>
                                @endif
                            @endif
                            <b>Contact <i class="fa fa-mobile" aria-hidden="true"></i></b>
                            <div class="element">{{ $userdetails->mobile_no}}</div>
                            @if($job_id=='1')
                            <b>Occupation</b>
                            <div class="element">{{ $userdetails->occupation}}</div>
                            @endif
                            @if($job_id=='1' || $job_id=='2')
                            <b>Age</b>
                            <div class="element">{{ date_diff(date_create(date('y-m-d')),date_create($userdetails->dob))->format('%y') }} Years</div>
                            @endif
                    </div>


                    @if($permission==1)
                        @if($job_id=='2')
                            <div class="row profdesk">
                                <b>Degrees</b>
                                <div class="element"> {{ $userdetails->education_details}}</div>
                                <b>Experience</b>
                                <div class="element"> {{ $userdetails->experience}} Years</div>
                                <b>Specialization</b>
                                <div class="element"> {{ $userdetails->specs}}</div>
                                <b>Works in Hospital</b>
                                <div class="element"> {{ $userdetails->worksinhospital}}</div>
                                <b>Availibity Hours</b>
                                <div class="element">From: {{$userdetails->availhoursbegin }}<br>
                                                     To: {{ $userdetails->availhoursend}}
                                </div>
                            </div>
                        @elseif($job_id=='3')
                            <div class="row profdesk">
                                <b>Availibity Hours</b>
                                <div class="element">From: {{$userdetails->availhoursbegin }}<br>
                                                     To: {{ $userdetails->availhoursend}}
                                </div>
                            </div>
                        @elseif($job_id=='4')
                            <div class="row profdesk">
                                <b>Number of Doctors</b>
                                <div class="element"> {{ $userdetails->noofdoctors}}</div>
                                <b>Availibity Hours</b>
                                <div class="element">From: {{$userdetails->availhoursbegin }}<br>
                                                     To: {{ $userdetails->availhoursend}}
                                </div>
                            </div>
                            
                        @endif

                    @endif



                    @if($permission==1)
                        <div class="row profdesk">
                        @if($job_id=='2')
                            <b>Office Address</b>
                            <div class="element">{{ $userdetails->offi_street.', '.$userdetails->offi_city.", ".$userdetails->offi_state.", ".$userdetails->offi_zip.", ".$userdetails->offi_country}}</div>
                            <b>Home Address</b>
                            <div class="element">{{ $userdetails->perm_street.', '.$userdetails->perm_city.", ".$userdetails->perm_state.", ".$userdetails->perm_zip.", ".$userdetails->perm_country}}</div>
                        
                        @elseif($job_id=='3' || $job_id=='4')
                            <b>Location</b>
                            <div class="element">{{ $userdetails->street.', '.$userdetails->city.", ".$userdetails->state.", ".$userdetails->zip.", ".$userdetails->country}}</div>
                        @else
                            <b>Current Address</b>
                                <div class="element">{{ $userdetails->curr_street.', '.$userdetails->curr_city.", ".$userdetails->curr_state.", ".$userdetails->curr_zip.", ".$userdetails->curr_country}}</div>
                            <b>permanent Address</b>
                                <div class="element">{{ $userdetails->perm_street.', '.$userdetails->perm_city.", ".$userdetails->perm_state.", ".$userdetails->perm_zip.", ".$userdetails->perm_country}}</div>
                                
                        
                        @endif

                        </div>        
                    @endif
                    

                    
                    @if($permission==1)
                        @if($job_id=='1')
                        <div class="row profdesk">
                       
                        
                            <b>Guardian</b>
                            <div class="element">{{ $userdetails->guardian_f.' '.$userdetails->guardian_l}}</div>
                            <b>Contact <i class="fa fa-mobile" aria-hidden="true"></i></b>
                            <div class="element"> {{ $userdetails->guardian_cellno}}</div>
                        </div>
                        @endif
                    @endif
                

                    

                
                    
                </div>

                <div class="row deldesk">
                    @if($permission==1)
                        <a href="e/{{$_SESSION['usrname']}}"><div class="edtprof">Edit profile</div></a>     
                    @else
                        @if(isset($_SESSION['usrname']))
                            <a href="/profile/{{ $_SESSION['usrname'] }}"><div class="edtprof">View your Profile <i class="fa fa-arrow-right" aria-hidden="true"></i></div></a>
                        @endif
                    @endif
                </div>
            
            </div>
            
            @else
                <div class="col-md-10 nedata">
                    Sorry don't have enough data about {{$username}}

                    <div class="row deldesk">
                        @if($permission==1)
                            <a href="e/{{$_SESSION['usrname'] }}"><div class="edtprof">Edit profile</div></a>     
                        @else
                            @if(isset($_SESSION['usrname']))
                                <a href="/profile/{{ $_SESSION['usrname'] }}"><div class="edtprof">View your Profile <i class="fa fa-arrow-right" aria-hidden="true"></i></div></a>
                            @endif
                        @endif
                    </div>
                </div>
            @endif
            
            

        </div>

    </div>

    <script src="/js/profile.js">
    </script>
@endsection
 