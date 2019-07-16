<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\userprofile;
use App\state;
use App\city;
use App\country;
use App\usersdata;
use App\doctersdata;
use App\hospitalsdata;
use App\pharmacydata;


class ajaxcontroller extends Controller
{
    //
    public function country(){
        session_start();
        session_regenerate_id();
        if(isset($_SESSION['usrname'])){
            $username=$_SESSION['usrname'];
        }
        else{
            return redirect()->back();
        }

        $usrdata=usersdata::where('username',$username)->first();
        if(!empty($usrdata)){
            $jid=$usrdata->job_id;
        }
        else{
            $jid=="";
        }
        if($jid==1){
            $us=userprofile::where('username',$username)->first();
        
        }
        elseif($jid==2){
            $us=doctersdata::where('username',$username)->first();
        }

        elseif($jid==4){
            $us=hospitalsdata::where('username',$username)->first();
        }
        else{
            $us=pharmacydata::where('username',$username)->first();
        }
        

            
        

        
        
        $res=country::all();
        $x="";
        $x.="<option id='default' class='countryoption' value=";
        if (!empty($us)){
            if($jid==1){
                $retr=country::where('name',$us->curr_country)->first();
            }
            elseif($jid==2){
                $retr=country::where('name',$us->offi_country)->first();
            }
            else{
                $retr=country::where('name',$us->country)->first();
            }
            $x.=$retr->id.">".$retr->name;
        }
        else{
            $x.="".">"."please select a Country";
        }

        $x.="</option>";
        foreach($res as $de){
            $x=$x."<option class='countryoption' value=".$de->id;
            $x.=" >".$de->name."</option>";
        }
    

        return $x;

    }

    public function statecurr($cntry){

        session_start();
        session_regenerate_id();
        if(isset($_SESSION['usrname'])){
            $username=$_SESSION['usrname'];

        
            $usrdata=usersdata::where('username',$username)->first();
            if(!empty($usrdata)){
                $jid=$usrdata->job_id;
            }
            else{
                $jid=="";
            }
            if($jid==1){
                $us=userprofile::where('username',$username)->first();
            
            }
            elseif($jid==2){
                $us=doctersdata::where('username',$username)->first();
            }
    
            elseif($jid==4){
                $us=hospitalsdata::where('username',$username)->first();
            }
            else{
                $us=pharmacydata::where('username',$username)->first();
            }
        

        $d=state::where('country_id',$cntry)->get();
        $x="";

        $x.="<option id='default' class='stateoption' value=";
        if (!empty($us)){
            if($jid==1){
                $retr=state::where('name',$us->curr_state)->first();
            }
            elseif($jid==2){
                $retr=state::where('name',$us->offi_state)->first();
            }
            else{
                $retr=state::where('name',$us->state)->first();
            }
            $x.=$retr->id.">".$retr->name;
        }
        else{
            $x.="".">"."please select a State";
        }

        $x.="</option>";

        foreach($d as $de){
            $x=$x."<option class='stateoption' value=".$de->id;

            $x.=" >".$de->name."</option>";
 
        }
    }


        return $x;
    }


    public function citycurr($stid){
        session_start();
        session_regenerate_id();
        if(isset($_SESSION['usrname'])){
            $username=$_SESSION['usrname'];

        
            $usrdata=usersdata::where('username',$username)->first();
            if(!empty($usrdata)){
                $jid=$usrdata->job_id;
            }
            else{
                $jid=="";
            }
            if($jid==1){
                $us=userprofile::where('username',$username)->first();
            
            }
            elseif($jid==2){
                $us=doctersdata::where('username',$username)->first();
            }
    
            elseif($jid==4){
                $us=hospitalsdata::where('username',$username)->first();
            }
            else{
                $us=pharmacydata::where('username',$username)->first();
            }
        
        

        $d=city::where('state_id',$stid)->get();
        $x="";
        $x.="<option id='default' class='cityoption' value=";
        if (!empty($us)){
            if($jid==1){
                $retr=city::where('name',$us->curr_city)->first();
            }
            elseif($jid==2){
                $retr=city::where('name',$us->offi_city)->first();
            }
            else{
                $retr=city::where('name',$us->city)->first();
            }
            
            $x.=$retr->id.">".$retr->name;
        }
        else{
            $x.="".">"."please select a City";
        }

        $x.="</option>";

        foreach($d as $de){
            $x=$x."<option class='cityoption' value=".$de->id;
            $x.=" >".$de->name."</option>";
 
        }
    }

        return $x;

    }

    public function stateperm($cntry){
             
        session_start();
        session_regenerate_id();
        if(isset($_SESSION['usrname'])){
            $username=$_SESSION['usrname'];
        
                
            $usrdata=usersdata::where('username',$username)->first();
            if(!empty($usrdata)){
                $jid=$usrdata->job_id;
            }
            else{
                $jid=="";
            }
            if($jid==1){
                $us=userprofile::where('username',$username)->first();
            
            }
            elseif($jid==2){
                $us=doctersdata::where('username',$username)->first();
            }
    
            elseif($jid==4){
                $us=hospitalsdata::where('username',$username)->first();
            }
            else{
                $us=pharmacydata::where('username',$username)->first();
            }

                
        
            $d=state::where('country_id',$cntry)->get();
            $x="";
        
            $x.="<option id='default' class='stateoptionperm' value=";
            if (!empty($us)){
                if($jid==1){
                    $retr=state::where('name',$us->curr_state)->first();
                }
                elseif($jid==2){
                    $retr=state::where('name',$us->offi_state)->first();
                }
                else{
                    $retr=state::where('name',$us->state)->first();
                }
                $x.=$retr->id.">".$retr->name;
            }
            else{
                $x.="".">"."please select a State";
            }
        
            $x.="</option>";
        
            foreach($d as $de){
                $x=$x."<option class='stateoptionperm' value=".$de->id;
        
                $x.=" >".$de->name."</option>";
         
            }
        }
        
        
        return $x;
    }
        
        
    public function cityperm($stid){
                session_start();
                session_regenerate_id();
                if(isset($_SESSION['usrname'])){
                    $username=$_SESSION['usrname'];
        
                
                    $usrdata=usersdata::where('username',$username)->first();
                    if(!empty($usrdata)){
                        $jid=$usrdata->job_id;
                    }
                    else{
                        $jid=="";
                    }
                    if($jid==1){
                        $us=userprofile::where('username',$username)->first();
                    
                    }
                    elseif($jid==2){
                        $us=doctersdata::where('username',$username)->first();
                    }
            
                    elseif($jid==4){
                        $us=hospitalsdata::where('username',$username)->first();
                    }
                    else{
                        $us=pharmacydata::where('username',$username)->first();
                    }
        
                
        
                $d=city::where('state_id',$stid)->get();
                $x="";
                $x.="<option id='default' class='cityoptionperm' value=";
                if (!empty($us)){
                    if($jid==1){
                        $retr=city::where('name',$us->curr_city)->first();
                    }
                    elseif($jid==2){
                        $retr=city::where('name',$us->offi_city)->first();
                    }
                    else{
                        $retr=city::where('name',$us->city)->first();
                    }
                    
                    $x.=$retr->id.">".$retr->name;
                }
                else{
                    $x.="".">"."please select a City";
                }
        
                $x.="</option>";
        
                foreach($d as $de){
                    $x=$x."<option class='cityoptionperm' value=".$de->id;
                    $x.=" >".$de->name."</option>";
         
                }
            }
        
                return $x;
        
            }

























    public function findcntryname($cid){
        $d=country::where('id',$cid)->first();
        return $d->name;

    }
    public function findstatename($cid){
        $d=state::where('id',$cid)->first();
        return $d->name;

    }
    public function findcityname($cid){
        $d=city::where('id',$cid)->first();
        return $d->name;

    }






    public function searchblood(Request $request){
        // $this->validate($request,[
        //     'bloodgrp'=>'required',
        //     'ccity'=>'required',

        // ]);
        
       
        $data=DB::table('usersdatas')
              ->join('userprofiles', function ($join) {
                    $join->on('usersdatas.username', '=', 'userprofiles.username');
                 })
                ->where('userprofiles.bloodgrp',$_GET['bloodgrp'])
                ->where('userprofiles.curr_city',$_GET['ccity'])
                ->simplePaginate(10);
        

        $x="";
        // $x="<button type='button' class='backwardbtn' id='backward'><i class='fa fa-chevron-up fa-2x' aria-hidden='true' style='color:gray;'></i></button>";
                
        if(!empty($data)){
            $x="<table id='restable'><tr><th>Blood Group</th><th>Name</th><th>Contact</th></tr>";
        
            foreach($data as $d){
                $x.="<tr><td>".$d->bloodgrp."</td><td>".$d->fname." ".$d->lname."</td><td>".$d->mobile_no."</td></tr>";
            }
            $x.="</table>";
        }
        else{
            $x="sorry no data";
        }

        


        return $x;

    }



}


