<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\subscribe;
use App\userprofile;
use App\profimage;
use App\usersdata;
use App\doctersdata;
use App\pharmacydata;
use App\hospitalsdata;
use Illuminate\Support\Facades\Storage;

class homepanel extends Controller
{


    // homeeee

    public function home(){
        session_start();
        session_regenerate_id();
        if (!isset($_SESSION['usrname'])){
            return view('root.home');
        }
        else{
            $d=profimage::where('username',$_SESSION['usrname'])->first();
            if(!empty($d)){
                $p=$d->profile_image;
    
                return view('root.home',compact('p'));
            }
            else{
                $p="avatar.png";
                return view('root.home',compact('p'));
            }
            

        }
     
    }

    //subscribe
    public function subscribeus(Request $r){
        $d=new subscribe;

        $this->validate($r,[
            'emailid'=>'required|email|unique:subscribes'
        ]);
        $d->emailid=$r->emailid;

        $d->save();

        return redirect('/')->withErrors('Thanks For Subscribing Us');

        
    }

    //profileview

    public function profileview( $username ){
        session_start();
        session_regenerate_id();
        
        $permission=0;

        $ps="";
        
        if (!isset($_SESSION['usrname'])){
            $_SESSION['urltov']="/profile/".$username;
            
            $d=profimage::where('username',$username)->first();
            if(!empty($d)){
                $p=$d->profile_image;
    
            }
            else{
                $p="avatar.png";
            }
            
        }
        else{
            if(strcmp($_SESSION['usrname'],$username)==0){
                $permission=1;
            }
            $ds=profimage::where('username',$_SESSION['usrname'])->first();
            $d=profimage::where('username',$username)->first();
            if(!empty($d)){
                $p=$d->profile_image;
    
            }
            else{
                $p="avatar.png";
            }

            if(!empty($ds)){
                $ps=$ds->profile_image;
            }
            else{
                $ps="avatar.png";
            }
        }

        $ud=usersdata::where('username',$username)->first();
        if(!empty($ud)){
            if($ud->job_id=='1'){
                $sr=userprofile::where('username',$username)->first();
                if (!empty($sr)){
                    return view('signin.profile',['username'=>$username,'p'=>$p,'ps'=>$ps,'permission'=>$permission,'fname'=>$ud->fname,'lname'=>$ud->lname,'userdetails'=>$sr,'job_id'=>$ud->job_id]);
                }
                else{
                    return view('signin.profile',['username'=>$username,'p'=>$p,'ps'=>$ps,'permission'=>$permission,'fname'=>$ud->fname,'lname'=>$ud->lname,'userdetails'=>$sr,'job_id'=>$ud->job_id])->withErrors("We don't have enough info about the ".$username);
                }
            }
            elseif($ud->job_id=='2'){
                $sr=doctersdata::where('username',$username)->first();
                if (!empty($sr)){
                    return view('signin.profile',['username'=>$username,'p'=>$p,'ps'=>$ps,'permission'=>$permission,'fname'=>$ud->fname,'lname'=>$ud->lname,'userdetails'=>$sr,'job_id'=>$ud->job_id]);
                }
                else{
                    return view('signin.profile',['username'=>$username,'p'=>$p,'ps'=>$ps,'permission'=>$permission,'fname'=>$ud->fname,'lname'=>$ud->lname,'userdetails'=>$sr,'job_id'=>$ud->job_id])->withErrors("We don't have enough info about the ".$username);
                }
            }
            elseif($ud->job_id=='3'){
                $sr=pharmacydata::where('username',$username)->first();
                if (!empty($sr)){
                    return view('signin.profile',['username'=>$username,'p'=>$p,'ps'=>$ps,'permission'=>$permission,'fname'=>$ud->fname,'lname'=>$ud->lname,'userdetails'=>$sr,'job_id'=>$ud->job_id]);
                }
                else{
                    return view('signin.profile',['username'=>$username,'p'=>$p,'ps'=>$ps,'permission'=>$permission,'fname'=>$ud->fname,'lname'=>$ud->lname,'userdetails'=>$sr,'job_id'=>$ud->job_id])->withErrors("We don't have enough info about the ".$username);
                }

            }
            elseif($ud->job_id=='4'){
                $sr=hospitalsdata::where('username',$username)->first();
                if (!empty($sr)){
                    return view('signin.profile',['username'=>$username,'p'=>$p,'ps'=>$ps,'permission'=>$permission,'fname'=>$ud->fname,'lname'=>$ud->lname,'userdetails'=>$sr,'job_id'=>$ud->job_id]);
                }
                else{
                    return view('signin.profile',['username'=>$username,'p'=>$p,'ps'=>$ps,'permission'=>$permission,'fname'=>$ud->fname,'lname'=>$ud->lname,'userdetails'=>$sr,'job_id'=>$ud->job_id])->withErrors("We don't have enough info about the ".$username);
                }

            }
        }
        else{
            return redirect()->back()->withErrors($username." does not exist");
            
        }
              
    }

    public function profileimgupload(request $r){
        session_start();
        session_regenerate_id();
        $username=$_SESSION['usrname'];
        if ($r->hasFile('imgprof') && ($r->imgprof->extension()=='jpeg' || $r->imgprof->extension()=='png' || $r->imgprof->extension()=='jpg' || $r->imgprof->extension()=='gif' || $r->imgprof->extension()=='bmp' || $r->imgprof->extension()=='jpeg' || $r->imgprof->extension()=='tiff')){
                $d=profimage::where('username',$username)->first();
                if(!empty($d)){
                    Storage::delete('public/profimg/'.$d->profile_image);
                    $p=$r->file('imgprof')->store('public/profimg');
                    $p=explode('/',$p);
                    $p=$p[2];
                    $d->profile_image=$p;
                    $d->save();

                }
                else{
                    $p=$r->file('imgprof')->store('public/profimg');
                    $p=explode('/',$p);
                    $p=$p[2];
                    $d=new profimage;
                    $d->profile_image=$p;
                    $d->username=$username;
                    $d->save();
                }
                
                return redirect('/profile/'.$username);
            }
            
            else{
                return redirect('/profile/'.$username)->withErrors('Please upload a valid image');

            }
        



    }

    public function profileeditview($username){


        session_start();
        session_regenerate_id();
        $permission=0;

        $_SESSION['urltov']="/profile/".$username;
        
        if (!isset($_SESSION['usrname'])){
            
            return redirect('/');
            
        }

        else{
            if(strcmp($_SESSION['usrname'],$username)==0){
                $permission=1;
            }
            $d=profimage::where('username',$username)->first();
            if(!empty($d)){
                $p=$d->profile_image;
    
            }
            else{
                $p="avatar.png";
            }
        }
        if ($permission==0){
            return redirect('/');
        }
        else{
            $ud=usersdata::where('username',$username)->first();

            if($ud->job_id=='1'){
                $sr=userprofile::where('username',$username)->first();
                return view('signin.profileedit',['username'=>$username,'p'=>$p,'permission'=>$permission,'fname'=>$ud->fname,'lname'=>$ud->lname,'userdetails'=>$sr,'job_id'=>$ud->job_id]);
            }
            elseif($ud->job_id=='2'){
                $sr=doctersdata::where('username',$username)->first();
                return view('signin.profileedit',['username'=>$username,'p'=>$p,'permission'=>$permission,'fname'=>$ud->fname,'lname'=>$ud->lname,'userdetails'=>$sr,'job_id'=>$ud->job_id]);
            }
            elseif($ud->job_id=='3'){
                $sr=pharmacydata::where('username',$username)->first();
                return view('signin.profileedit',['username'=>$username,'p'=>$p,'permission'=>$permission,'fname'=>$ud->fname,'lname'=>$ud->lname,'userdetails'=>$sr,'job_id'=>$ud->job_id]);
            }
            elseif($ud->job_id=='4'){
                $sr=hospitalsdata::where('username',$username)->first();
                return view('signin.profileedit',['username'=>$username,'p'=>$p,'permission'=>$permission,'fname'=>$ud->fname,'lname'=>$ud->lname,'userdetails'=>$sr,'job_id'=>$ud->job_id]);
            }
        }

    }

    public function profileedit(Request $req, $username){
        session_start();
        session_regenerate_id();
        if(!isset($_SESSION['job_id'])){
            return rediect()->back()->withErrors('Server Error');
        }
        else{
            $job_id=$_SESSION['job_id'];

            if($job_id=='1'){

                $this->validate($req,[
                    'bloodgrp'=>'required',
                    'adharno'=>'required|max:12|min:12',
                    'mobile_no'=>'required',
                    'occupation'=>'required',
                    'dob'=>'required',
                    'guardian_cellno'=>'required',
                    'curr_street'=>'required',
                    'curr_city'=>'required',
                    'curr_state'=>'required',
                    'curr_country'=>'required',
                    'curr_zip'=>'required',
                    'guardian_f'=>'required',
                    'guardian_l'=>'required',
                    'perm_street'=>'required',
                    'perm_city'=>'required',
                    'perm_state'=>'required',
                    'perm_country'=>'required',
                    'perm_zip'=>'required'
                ]);
                $userdata=usersdata::where('username',$username)->first();
                $insd=userprofile::where('username',$username)->first();
                if (empty($insd)){
                    $insd=new userprofile;
                }
                $insd->username=$username;
                $insd->bloodgrp=$req->bloodgrp;
                $insd->adharno=$req->adharno;
                $insd->mobile_no=$req->mobile_no;
                $insd->occupation=$req->occupation;
                $insd->dob=$req->dob;
                $insd->guardian_cellno=$req->guardian_cellno;
                $insd->guardian_f=$req->guardian_f;
                $insd->guardian_l=$req->guardian_l;
                $insd->curr_street=$req->curr_street;
                $insd->curr_city=$req->curr_city;
                $insd->curr_state=$req->curr_state;
                $insd->curr_country=$req->curr_country;
                $insd->curr_zip=$req->curr_zip;
                $insd->perm_street=$req->perm_street;
                $insd->perm_city=$req->perm_city;
                $insd->perm_state=$req->perm_state;
                $insd->perm_country=$req->perm_country;
                $insd->perm_zip=$req->perm_zip;
                $insd->save();
        

            }

            elseif($job_id=='2'){

                $this->validate($req,[
                    'bloodgrp'=>'required',
                    'adharno'=>'required|max:12|min:12',
                    'mobile_no'=>'required',
                    'dob'=>'required',
                    'offi_street'=>'required',
                    'offi_city'=>'required',
                    'offi_state'=>'required',
                    'offi_country'=>'required',
                    'offi_zip'=>'required',
                    'perm_street'=>'required',
                    'perm_city'=>'required',
                    'perm_state'=>'required',
                    'perm_country'=>'required',
                    'perm_zip'=>'required',
                    'availhoursbegin'=>'required',
                    'availhoursend'=>'required',
                    'specs'=>'required',
                    'experience'=>'required',
                    'education_details'=>'required',
                    'worksinhospital'=>'required'
                ]);
                $userdata=usersdata::where('username',$username)->first();
                $insd=doctersdata::where('username',$username)->first();
                if (empty($insd)){
                    $insd=new doctersdata;
                }
                $insd->username=$username;
                $insd->bloodgrp=$req->bloodgrp;
                $insd->adharno=$req->adharno;
                $insd->mobile_no=$req->mobile_no;
                $insd->dob=$req->dob;
                $insd->offi_street=$req->offi_street;
                $insd->offi_city=$req->offi_city;
                $insd->offi_state=$req->offi_state;
                $insd->offi_country=$req->offi_country;
                $insd->offi_zip=$req->offi_zip;
                $insd->perm_street=$req->perm_street;
                $insd->perm_city=$req->perm_city;
                $insd->perm_state=$req->perm_state;
                $insd->perm_country=$req->perm_country;
                $insd->perm_zip=$req->perm_zip;
                $insd->specs=$req->specs;
                $insd->experience=$req->experience;
                $insd->availhoursbegin=$req->availhoursbegin;
                $insd->availhoursend=$req->availhoursend;
                $insd->worksinhospital=$req->worksinhospital;
                $insd->education_details=$req->education_details;

                $insd->save();
        
                
            }

            elseif($job_id=='3'){
                $this->validate($req,[
                    'name'=>'required',
                    'mobile_no'=>'required',
                    'street'=>'required',
                    'city'=>'required',
                    'state'=>'required',
                    'country'=>'required',
                    'zip'=>'required',
                    'availhoursbegin'=>'required',
                    'availhoursend'=>'required',
                ]);
                $userdata=usersdata::where('username',$username)->first();
                $insd=pharmacydata::where('username',$username)->first();
                if (empty($insd)){
                    $insd=new pharmacydata;
                }
                $insd->name=$req->name;
                $insd->username=$username;
                $insd->mobile_no=$req->mobile_no;
                $insd->street=$req->street;
                $insd->city=$req->city;
                $insd->state=$req->state;
                $insd->country=$req->country;
                $insd->zip=$req->zip;
                $insd->availhoursbegin=$req->availhoursbegin;
                $insd->availhoursend=$req->availhoursend;

                $insd->save();
        



            }

            else{
                $this->validate($req,[
                    'name'=>'required',
                    'mobile_no'=>'required',
                    'street'=>'required',
                    'city'=>'required',
                    'state'=>'required',
                    'country'=>'required',
                    'zip'=>'required',
                    'availhoursbegin'=>'required',
                    'availhoursend'=>'required',
                    'noofdoctors'=>'required',
                ]);
                $userdata=usersdata::where('username',$username)->first();
                $insd=hospitalsdata::where('username',$username)->first();
                if (empty($insd)){
                    $insd=new hospitalsdata;
                }
                $insd->username=$username;
                $insd->mobile_no=$req->mobile_no;
                $insd->street=$req->street;
                $insd->city=$req->city;
                $insd->state=$req->state;
                $insd->country=$req->country;
                $insd->zip=$req->zip;
                $insd->availhoursbegin=$req->availhoursbegin;
                $insd->availhoursend=$req->availhoursend;
                $insd->name=$req->name;
                $insd->noofdoctors=$req->noofdoctors;


                $insd->save();
        

            }

        }

        return redirect('/profile/'.$username);
        
    }


    public function bs(){
        session_start();
        session_regenerate_id();
        $_SESSION['urltov']="/bs";
        if(isset($_SESSION['usrname'])){
            $username=$_SESSION['usrname'];
            $d=profimage::where('username',$_SESSION['usrname'])->first();
        
            if(!empty($d)){
                $p=$d->profile_image;

            }
            else{
                $p="avatar.png";
            }
            return view('root.findblood',['p'=>$p,'username'=>$username]);
        }
        else{
            return view('root.findblood');    
        }
    }

}