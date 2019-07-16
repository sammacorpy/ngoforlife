@extends('layout.base')

@section('wavecolor','#606060')
@section('title','News')

@section('stylesheet')
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/profile.css">
    <link rel="stylesheet" href="/css/news.css">
    
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nixie+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gentium+Book+Basic" rel="stylesheet">   

    <script>
        var d;

        function dispshow(d) {
            d = ".menuitems" + d;
            $(d).toggleClass('show');
   
        }
        function dispout(d){
            d = ".menuitems" + d;
            $(d).removeClass('show');
        }
    </script>  
    <script src="/js/newsmenu.js"></script>
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
                    <img src="/storage/profimg/{{$p}}" style="margin-top:-5px;padding:0px;border-radius:100%;" width="30" height="30">
                </a>
                <ul class="dropdown-menu dropdown-cart" role="menu">
                    <li><a href="/profile/e/{{ $_SESSION['usrname'] }}" style="color:#808080;">Edit Profile</a></li>
                    <li><a href="/changepass/e/{{$_SESSION['usrname']}}" style="color:#808080;">Change Password</a></li>
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
    

    
    <div class="container">
        <div class="col-md-10 col-md-offset-1 posts">
            <div class="col-md-8 col-md-offset-2">
                @if(isset($username))
                    <div class="blockfpost">
                        <form method="POST" action="/news"  role="form">
                        {{ csrf_field() }}
                            <legend><i class="fa fa-newspaper-o" aria-hidden="true"  style="color:#606060"></i> Post your news</legend>

                            <div class="form-group">
                                <textarea class="form-control" id="news" name="news" placeholder="Hi, {{$username}}! Tell us about your days" rows="5" col="50"></textarea></textarea>
                            </div>  



                    
                            <button type="submit" class="btn btn-primary" id="btn-news">Post</button>
                        </form>
                    </div>
                @endif

                <div class="titlefeed"> News Feed</div>
                <div class="newsfeed">


                @foreach($news as $n)
                    <div class="eachnews" id="eachnews_{{$n->newsfeed_id}}">

                        <div class="username"><span class="profimg"><img src="/storage/profimg/{{$n->profile_image}}" id=""></span><span> {{ $n->username}}</span>  
                        @if(isset($_SESSION['usrname']))
                        @if(strcmp($_SESSION['usrname'],$n->username)==0)
                            <span class="newsmenu">
                                <span class="menuicon"  onclick= "dispshow({{$n->newsfeed_id}})" >...
                                <ul class="menuitems{{$n->newsfeed_id}}">
                                    <li onclick="ajaxfuned({{$n->newsfeed_id}})"> Edit
                                    </li>
                                    <li onclick="ajaxfundel({{$n->newsfeed_id}})" onmouseout="dispout({{$n->newsfeed_id}})"> Delete
                                    </li>
                                </ul>
                                </span>
                            </span>
                        @endif
                        @endif
                        <span class="timer">{{ Carbon\Carbon::parse(DB::table('newsfeeds')->where('newsfeed_id',$n->newsfeed_id)->first()->nf_updated_at)->diffforhumans()}}</span></div>
                        
                        <div class="newsups" id="newsup_{{$n->newsfeed_id}}">                   
                            {{ $n->news}}
                        </div>

                        <div class="lcnav">
                            <div class="like">
                                <i class="fa fa-thumbs-up" aria-hidden="true" onclick="voteup({{$n->newsfeed_id}})"> Likes</i>
                            </div>
                            <div class="comment">
                                <i class="fa fa-comments" aria-hidden="true" data-value="{{$n->newsfeed_id}}"> Comments</i>
                            </div>
                        </div>
                        <div class="totallike">
                            <span id="lc{{$n->newsfeed_id}}">{{$n->votes}}</span> Likes
                        </div>
                        
                        <div class="commentbox">
                            <div id="totalcomments">
                            </div>
                            @if(isset($_SESSION['usrname']))
                            <span class="profimg cmnt">
                                <img src="/storage/profimg/{{$p}}">
                            </span> 
                            <span>
                                <input id="cmmentinput" type="text" name="comment" placeholder="Write a comment...">
                            </span>
                            <input type="hidden" value="{{$n->newsfeed_id}}">
                            @endif
                        </div>
                    </div>

                @endforeach
                
                </div>
                
                    <button type="button" id="viewmore" data-value="1" onclick="viewmore()"><i class="fa fa-caret-down fa-2x" aria-hidden="true"></i></button>
                
            </div>
            
        </div>
        <input id="lp" type="hidden" value="{{$news->lastpage()}}"/>
    </div>
    <script src="/js/profile.js"></script>
    
@endsection
