<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\usersdata;
use App\profimage;
use App\userprofile;
use App\newsfeed;
use App\voteanduser;
class news extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        session_start();
        session_regenerate_id();
        $_SESSION['urltov']="/news";
        $news=DB::table('newsfeeds')->join('profimages',function($join){
            $join->on('newsfeeds.username','=','profimages.username');
        })->orderBy('newsfeeds.nf_updated_at','desc')->paginate(15);

        
                   
        if(isset($_SESSION['usrname'])){
            $username=$_SESSION['usrname'];
            $d=profimage::where('username',$_SESSION['usrname'])->first();
        
            if(!empty($d)){
                $p=$d->profile_image;

            }
            else{
                $p="avatar.png";
            }

            
            if(isset($_GET['page'])){
                return view('news.nvmajx',compact('news','p','username'));
            }
            return view('root.news',['p'=>$p,'username'=>$username,'news'=>$news]);
        }
        else{

            if(isset($_GET['page'])){
                return view('news.nvmajx',compact('news'));
            }
            
            return view('root.news',compact('news'));    
        }
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        session_start();
        session_regenerate_id();

        if(!isset($_SESSION['usrname'])){ return false;}

        $d=new newsfeed;
        $d->username=$_SESSION['usrname'];
        $d->news=$request->news;
        $d->save();
        return redirect('/news');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)//delete message news
    {
        session_start();
        session_regenerate_id();
        $username=$_SESSION['usrname'];
        
        $d=newsfeed::find($id);
        if(!empty($d)){

            if($d->username==$_SESSION['usrname']){
                $d->delete();
            }
        }
        $x=1;

        return($x);
        
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $n=newsfeed::find($id);
        return view('news.ajaxnewsedit',compact('n'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatenews(Request $request, $id)
    {
        session_start();
        session_regenerate_id();
        $newnews=$_GET['nws'];

        $d=newsfeed::find($id);
        if(!empty($d) && isset($_SESSION['usrname'])){
            if(strcmp($_SESSION['usrname'],$d->username)==0){
                $d->news=$newnews;
                $d->save();
                return ($d->news);
            }
          
        }
       
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }



    public function likes($id){

        session_start();
        session_regenerate_id();
        if(isset($_SESSION['usrname'])){

            $d=newsfeed::find($id);
            $d->increment('votes');
            $d->save();

            $e=new voteanduser;
            $e->newsfeed_id=$d->newsfeed_id;
            $e->username=$_SESSION['usrname'];
            $e->liked=1;
            $e->save();

            return($d->votes);

        }
        else{
            $d=newsfeed::find($id);
            
            return($d->votes);
        }
        

    }
}
