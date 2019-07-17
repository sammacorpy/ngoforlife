@foreach($news as $n)
                    <div class="eachnews" id="eachnews_{{$n->newsfeed_id}}">

                        <div class="username"><span class="profimg"><img src="{{$n->profile_image}}" id=""></span><span> {{ $n->username}}</span>  
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
                            <i class="fa fa-thumbs-up" aria-hidden="true"></i> <a href="">Likes</a>
                            </div>
                            <div class="comment">
                            <i class="fa fa-comments" aria-hidden="true"></i>  <a href="">Comments</a>
                            </div>
                        </div>
                        <div id="totallike">
                            <span id="likecount">174</span> Likes
                        </div>
                        
                        <div class="commentbox">
                            <div id="totalcomments">
                            </div>
                            @if(isset($_SESSION['usrname']))
                            <span class="profimg cmnt">
                                <img src="{{$p}}">
                            </span> 
                            <span>
                                <input id="cmmentinput" type="text" name="comment" placeholder="Write a comment...">
                            </span>
                            <input type="hidden" value="{{$n->newsfeed_id}}">
                            @endif
                        </div>
                    </div>

                @endforeach