@extends('layout.base')
@section('title','Profile')
@section('wavecolor','#EB4552')
@section('stylesheet')
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/profile.css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="/css/picker.css" />
    <script src="/js/timepicker.js"></script>
    
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nixie+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gentium+Book+Basic" rel="stylesheet">     

    
@endsection
@section('navitems')
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item" >
                <a href="/profile/{{$username}}" class="underline">{{$_SESSION['usrname']}}</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <img src="/storage/profimg/{{$p}}" style="margin-top:-5px;padding:0px;border-radius:100%;" width="30" height="30"></a>
                <ul class="dropdown-menu dropdown-cart" role="menu">
                    <li><a href="/logout" style="color:#808080;">Logout</a></li>
                </ul>
            </li>
        </ul>


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
                        <img src="/storage/profimg/{{$p}}" class="imgupload" >
                        <div class="changeimg">upload image</div>
                        <input type="file" id="inpfile" class="inpfileupload" name="imgprof">
                        
                    </form>
                </div>
                <div class="nameplate">
                     {{ $username }}
                </div>
            </div>
           
            @if($permission==1)
            <form method="post" action="/profile/e/{{$_SESSION['usrname']}}">
            {{ csrf_field() }}
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
                        
                        
                        @if($job_id=='1' || $job_id=='2')
                        <div class="element">{{ $fname.' '.$lname}}</div>
                        @else
                        <div class="element">
                            <input class="inpelement" type="text" value="@if(!empty($userdetails))  {{ $userdetails->name}} @endif" placeholder="" name="name">
                        </div>
                        @endif

                        @if($job_id=='1' || $job_id=='2')
                        <b>Blood Group</b>
                        <div class="element">
                            <select name="bloodgrp" class="selectelement">
                                <option value="A+" @if(!empty($userdetails)) @if($userdetails->bloodgrp=='A+') {{'selected'}} @endif @endif >A+</option>
                                <option value="A-" @if(!empty($userdetails)) @if($userdetails->bloodgrp=='A-') {{'selected'}} @endif @endif>A-</option>
                                <option value="B+" @if(!empty($userdetails)) @if($userdetails->bloodgrp=='B+') {{'selected'}} @endif @endif>B+</option>
                                <option value="B-" @if(!empty($userdetails)) @if($userdetails->bloodgrp=='B-') {{'selected'}} @endif @endif>B-</option>
                                <option value="AB+" @if(!empty($userdetails)) @if($userdetails->bloodgrp=='AB+') {{'selected'}} @endif @endif>AB+</option>
                                <option value="AB-" @if(!empty($userdetails)) @if($userdetails->bloodgrp=='AB-') {{'selected'}} @endif @endif>AB-</option>
                                <option value="O+" @if(!empty($userdetails)) @if($userdetails->bloodgrp=='O+') {{'selected'}} @endif @endif>O+</option>
                                <option value="O-" @if(!empty($userdetails)) @if($userdetails->bloodgrp=='O-') {{'selected'}} @endif @endif>O-</option>
                            </select> 
                        </div>
                        
                            
                        <b>Adhar Number</b>
                        <div class="element">
                            <input class="inpelement" type="text" value="@if(!empty($userdetails)) {{ $userdetails->adharno}} @endif" placeholder="" name="adharno">
                        </div>
                        @endif
                        <b>Contact <i class="fa fa-mobile" aria-hidden="true"></i></b>
                        <div class="element">
                            <input class="inpelement" type="text" value="@if(!empty($userdetails))  {{ $userdetails->mobile_no}} @endif" placeholder="" name="mobile_no">
                        </div>
                        @if($job_id=='1')
                        <b>Occupation</b>
                        <div class="element">
                            <input class="inpelement" type="text" value="@if(!empty($userdetails)) {{ $userdetails->occupation}} @endif" placeholder="" name="occupation">
                            
                        </div>
                        @endif
                        @if($job_id=='1' || $job_id=='2')
                        <b>Birth Date</b>
                        <div class="element">
                            <input class="inpelement" type="date" value="@if(!empty($userdetails)){{$userdetails->dob}}@endif"  name="dob">
                        </div>
                        @endif

                    </div>
                    
                    <div class="row profdesk">
                    @if($job_id=='1')
                        <b>Current Address</b></br><br>
                        <b>country</b>
                        <div class="element">
                            <input type="hidden" id="cscountry" value="@if(!empty($userdetails)) {{ $userdetails->curr_country}} @endif" name="curr_country">
                        {{--    --}}
                            <select class="inpelement" id="ccountry">
                            </select>
            
                        </div>
                        <b>State</b>
                        <div class="element">
                        {{--  value="@if(!empty($userdetails)) {{ $userdetails->curr_state}} @endif" placeholder=""  --}}
                            <input type="hidden" id="csstate" value="@if(!empty($userdetails)) {{ $userdetails->curr_state}} @endif" name="curr_state">
                            
                            <select class="inpelement" id="cstate"></select>
                        </div>
                        <b>City</b>
                        <div class="element">
                            <input type="hidden" id="cscity" value="@if(!empty($userdetails)) {{ $userdetails->curr_city}} @endif" name="curr_city">
                        
                            <select class="inpelement" id="ccity"></select> 
                        </div>
                        <b>Street</b>
                        <div class="element">
                            <input class="inpelement" id="cstreet" type="text" value="@if(!empty($userdetails)) {{ $userdetails->curr_street}} @endif" placeholder="" name="curr_street">
                        </div>
                        <b>Zip Code</b>
                        <div class="element">
                            <input class="inpelement" id="czip" type="text" value="@if(!empty($userdetails)) {{ $userdetails->curr_zip}} @endif" placeholder="" name="curr_zip">
                        </div>
                        
                        <br><br>
                        <b>permanent Address</b> <div style="margin-top:10px;"><input type="checkbox" id="smascurr" value="sameascurrent">Same as current Address</div><br><br>
                        <b>country</b>
                        <div class="element">
                            <input type="hidden" id="pscountry" value="@if(!empty($userdetails)) {{ $userdetails->perm_country}} @endif" name="perm_country">
                        
                        {{--  value="@if(!empty($userdetails)) {{ $userdetails->curr_country}} @endif" placeholder=""  --}}
                            <select class="inpelement" id="pcountry">
                            </select>
            
                        </div>
                        <b>State</b>
                        <div class="element">
                            <input type="hidden" id="psstate" value="@if(!empty($userdetails)) {{ $userdetails->perm_state}} @endif" name="perm_state">
                        
                        {{--  value="@if(!empty($userdetails)) {{ $userdetails->curr_state}} @endif" placeholder=""  --}}
                            <select class="inpelement" id="pstate"></select>
                        </div>
                        <b>City</b>
                        <div class="element">
                            <input type="hidden" id="pscity" value="@if(!empty($userdetails)) {{ $userdetails->perm_city}} @endif" name="perm_city">
                        
                            <select class="inpelement" id="pcity"></select> 
                        </div>
                        <b>Street</b>
                        <div class="element">
                            <input class="inpelement" id="pstreet" type="text" value="@if(!empty($userdetails)) {{ $userdetails->perm_street}} @endif" placeholder="" name="perm_street">
                        </div>
                        <b>Zip Code</b>
                        <div class="element">
                            <input class="inpelement" id="pzip" type="text" value="@if(!empty($userdetails)) {{ $userdetails->perm_zip}} @endif" placeholder="" name="perm_zip">
                        </div>
                        
                    @elseif($job_id=='2')
                        <b>Office Address</b></br><br>
                        <b>country</b>
                        <div class="element">
                            <input type="hidden" id="cscountry" value="@if(!empty($userdetails)) {{ $userdetails->offi_country}} @endif" name="offi_country">
                        {{--    --}}
                            <select class="inpelement" id="ccountry">
                            </select>
            
                        </div>
                        <b>State</b>
                        <div class="element">
                        {{--  value="@if(!empty($userdetails)) {{ $userdetails->curr_state}} @endif" placeholder=""  --}}
                            <input type="hidden" id="csstate" value="@if(!empty($userdetails)) {{ $userdetails->offi_state}} @endif" name="offi_state">
                            
                            <select class="inpelement" id="cstate"></select>
                        </div>
                        <b>City</b>
                        <div class="element">
                            <input type="hidden" id="cscity" value="@if(!empty($userdetails)) {{ $userdetails->offi_city}} @endif" name="offi_city">
                        
                            <select class="inpelement" id="ccity"></select> 
                        </div>
                        <b>Street</b>
                        <div class="element">
                            <input class="inpelement" id="cstreet" type="text" value="@if(!empty($userdetails)) {{ $userdetails->offi_street}} @endif" placeholder="" name="offi_street">
                        </div>
                        <b>Zip Code</b>
                        <div class="element">
                            <input class="inpelement" id="czip" type="text" value="@if(!empty($userdetails)) {{ $userdetails->offi_zip}} @endif" placeholder="" name="offi_zip">
                        </div>
                        
                        <br><br>
                        <b>permanent Address</b> <div style="margin-top:10px;"><input type="checkbox" id="smascurr" value="sameascurrent">Same as current Address</div><br><br>
                        <b>country</b>
                        <div class="element">
                            <input type="hidden" id="pscountry" value="@if(!empty($userdetails)) {{ $userdetails->perm_country}} @endif" name="perm_country">
                        
                        {{--  value="@if(!empty($userdetails)) {{ $userdetails->curr_country}} @endif" placeholder=""  --}}
                            <select class="inpelement" id="pcountry">
                            </select>
            
                        </div>
                        <b>State</b>
                        <div class="element">
                            <input type="hidden" id="psstate" value="@if(!empty($userdetails)) {{ $userdetails->perm_state}} @endif" name="perm_state">
                        
                        {{--  value="@if(!empty($userdetails)) {{ $userdetails->curr_state}} @endif" placeholder=""  --}}
                            <select class="inpelement" id="pstate"></select>
                        </div>
                        <b>City</b>
                        <div class="element">
                            <input type="hidden" id="pscity" value="@if(!empty($userdetails)) {{ $userdetails->perm_city}} @endif" name="perm_city">
                        
                            <select class="inpelement" id="pcity"></select> 
                        </div>
                        <b>Street</b>
                        <div class="element">
                            <input class="inpelement" id="pstreet" type="text" value="@if(!empty($userdetails)) {{ $userdetails->perm_street}} @endif" placeholder="" name="perm_street">
                        </div>
                        <b>Zip Code</b>
                        <div class="element">
                            <input class="inpelement" id="pzip" type="text" value="@if(!empty($userdetails)) {{ $userdetails->perm_zip}} @endif" placeholder="" name="perm_zip">
                        </div>


















                    @else
                        <b>Location</b></br><br>
                        <b>country</b>
                        <div class="element">
                            <input type="hidden" id="cscountry" value="@if(!empty($userdetails)) {{ $userdetails->country}} @endif" name="country">
                        {{--    --}}
                            <select class="inpelement" id="ccountry">
                            </select>
            
                        </div>
                        <b>State</b>
                        <div class="element">
                        {{--  value="@if(!empty($userdetails)) {{ $userdetails->curr_state}} @endif" placeholder=""  --}}
                            <input type="hidden" id="csstate" value="@if(!empty($userdetails)) {{ $userdetails->state}} @endif" name="state">
                            
                            <select class="inpelement" id="cstate"></select>
                        </div>
                        <b>City</b>
                        <div class="element">
                            <input type="hidden" id="cscity" value="@if(!empty($userdetails)) {{ $userdetails->city}} @endif" name="city">
                        
                            <select class="inpelement" id="ccity"></select> 
                        </div>
                        <b>Street</b>
                        <div class="element">
                            <input class="inpelement" id="cstreet" type="text" value="@if(!empty($userdetails)) {{ $userdetails->street}} @endif" placeholder="" name="street">
                        </div>
                        <b>Zip Code</b>
                        <div class="element">
                            <input class="inpelement" id="czip" type="text" value="@if(!empty($userdetails)) {{ $userdetails->zip}} @endif" placeholder="" name="zip">
                        </div>

                    @endif
                    </div>        
                    
                    

                    @if($job_id=='1')
                    <div class="row profdesk">
                       
                        
                        <b>Guardian</b><br><br>
                        <div class="row">
                            <div class="col-md-6">
                                <b>First Name</b>
                                <div class="element">
                                    <input class="inpelement" type="text" value="@if(!empty($userdetails)) {{ $userdetails->guardian_f }} @endif" placeholder="" name="guardian_f">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <b>Last Name</b>
                                <div class="element">
                                    <input class="inpelement" type="text" value="@if(!empty($userdetails)) {{ $userdetails->guardian_l }} @endif" placeholder="" name="guardian_l">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <b>Contact <i class="fa fa-mobile" aria-hidden="true"></i></b>
                                <div class="element">
                                    <input class="inpelement" type="text" value="@if(!empty($userdetails)) {{ $userdetails->guardian_cellno }} @endif" placeholder="" name="guardian_cellno">
                                </div>
                            </div>
                        </div>
                        
                    </div> 
                    @endif


                    @if($job_id=='2')
                    <div class="row profdesk">
                        <b>Degrees</b>
                        <div class="element">
                            <input class="inpelement" id="degree" type="text" value="@if(!empty($userdetails)) {{ $userdetails->education_details}} @endif" placeholder="" name="education_details">
                        </div>

                        <b>Specialization</b>
                        <div class="element">
                            <input class="inpelement" id="specs" type="text" value="@if(!empty($userdetails)) {{ $userdetails->specs}} @endif" placeholder="" name="specs">
                        </div>
                        
                        <b>Experience</b>
                        <div class="element">
                            <input class="inpelement" id="exp" type="text" value="@if(!empty($userdetails)) {{ $userdetails->experience}} @endif" placeholder="" name="experience">
                        </div>

                        <b>Works in Hospital</b>
                        <div class="element">
                            <input class="inpelement" id="winhosp" type="text" value="@if(!empty($userdetails)) {{ $userdetails->worksinhospital}} @endif" placeholder="" name="worksinhospital">
                        </div>
                        <b>Availibility Hours</b>
                        <div class="element">
                        From:
                            <input class="inpelement" type="text" id="from" name="availhoursbegin" value="@if(!empty($userdetails)) {{ $userdetails->availhoursbegin}} @endif"/><br>
                        To:
                            <input class="inpelement" type="text" id="to" name="availhoursend" value="@if(!empty($userdetails)) {{ $userdetails->availhoursend}} @endif"/>
                        </div>
                    </div>

                    @elseif($job_id=='3')
                    <div class="row profdesk">
                        <b>Availibility Hours</b>
                        <div class="element">
                        From:
                            <input class="inpelement" type="text" id="from" name="availhoursbegin" value="@if(!empty($userdetails)) {{ $userdetails->availhoursbegin}} @endif"/><br>
                        To:
                            <input class="inpelement" type="text" id="to" name="availhoursend" value="@if(!empty($userdetails)) {{ $userdetails->availhoursend}} @endif"/>
                        </div>                  
                    
                    </div>

                    @elseif($job_id=='4')
                    <div class="row profdesk">
                        <b>Number of doctors</b>
                        <div class="element">
                            <input class="inpelement" id="winhosp" type="text" value="@if(!empty($userdetails)) {{ $userdetails->noofdoctors}} @endif" placeholder="" name="noofdoctors">
                        </div>

                        <b>Availibility Hours</b>
                        <div class="element">
                        From:
                            <input class="inpelement" type="text" id="from" name="availhoursbegin" value="@if(!empty($userdetails)) {{ $userdetails->availhoursbegin}} @endif"/><br>
                        To:
                            <input class="inpelement" type="text" id="to" name="availhoursend" value="@if(!empty($userdetails)) {{ $userdetails->availhoursend}} @endif"/>
                        </div>
                    
                    </div>
                    @endif
                </div>

                {{--  <div class="row profdesk">
                Do you own any hospital?<br><br>
                <input type="radio" id="job_id" name="job_id1" value="2">Yes<br>
                <input type="radio" id="job_id" name="job_id1" value="-2">No<br><br><br>
                Are you a doctor?<br><br>
                <input type="radio" id="job_id" name="job_id2" value="3">Yes<br>
                <input type="radio" id="job_id" name="job_id2" value="-3">No<br><br><br>

                </div>
                <div class="row profdesk" id="hsptinfo">

                </div>  --}}

                <div class="row deldesk">
                   <input class="btn btn-save" type="submit" value="Save">     
                </div>
            
            </div>
            </form>
        @endif
            
            
            

        </div>

    </div>
    <script>
        $('#from').timepicker({
            
        });
         $('#to').timepicker({
             
         });
    </script>
    <script src="/js/profile.js">
    </script>
    <script src="/js/ajx.js">
    </script>

    <?php
    $_SESSION['job_id']=$job_id;
    ?>
@endsection
 