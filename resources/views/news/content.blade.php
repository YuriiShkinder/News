
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <div class='row'>
            <div class="col-lg-12">

                @if(isset($data))
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>
                    @endif
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    @endif

                        <div class="category">
                            @foreach($data as $category=>$val)
                                <div class="cat_news" news-id="{{$val['id']}}">
                                    <h4>{{$val['title']}}</h4>
                                    <img src="{{$val['images']}}" alt="{{$val['title']}}">
                                    <p>{{$val['fulltext']}} ....</p>

                                    <div class="row">
                                        <div class="col-lg-2">
                                            <span><i id="read" class="fa fa-anchor">5</i></span>

                                        </div>
                                        <div class="col-lg-7 text-center">
                                            @if(isset($val['tags']))

                                                @foreach($val['tags'] as $value)

                                                    <a style="display: inline-block; margin: 0 5px" href="{{route('tags',['tag'=>$value])}}"> #{{$value}}</a>
                                                @endforeach

                                            @endif
                                        </div>
                                        <div class="col-lg-3">
                                            <p>Reads: <span id="count">{{$val['count']}} </span></p>
                                        </div>
                                    </div>
                                    @endforeach
                                    @guest
                                        <a href="{{route('login')}}" style="width: 400px;margin-top: 50px; margin-left: 150px"  class=" btn btn-danger">Авторизуйтесь, для перегляду коментарів!!!</a>

                                        @else
                                        <div style="padding: 10px" class="coments">
                                            @if(!$coments->isEmpty())
                                                <h4 style="text-align: center;margin-top: 30px">Коментарі</h4>
                                                @foreach($coments as $coment)
                                                    <div class="coment" user-id="{{Auth::user()->id}}" coment-id="{{$coment->id}}" >
                                                    <div >
                                                        <img style="height: 50px ;border-radius: 50%;" src="https://randomuser.me/api/portraits/women/{{rand(0,100)}}.jpg">
                                                        <h5 style="display: inline-block">{{$coment->user->name}}</h5>
                                                    
                                                    </div>
                                                    <p>{{$coment->text}}</p>

                                                        @if($coment->likes->where('user_id',Auth::user()->id)->isEmpty())

                                                            <span class="dislike"><i class="fa fa-thumbs-o-down">{{$coment->dislike}}</i></span>
                                                            <span class="like"><i class="fa fa-thumbs-o-up">{{$coment->like}}</i></span>
                                                        @else

                                                            <span><i class="fa fa-thumbs-o-down">{{$coment->dislike}}</i></span>
                                                            <span><i class="fa fa-thumbs-o-up">{{$coment->like}}</i></span>
                                                        @endif

                                                    </div>
                                                    @endforeach
                                                @else
                                                <h5 style="text-align: center">Немає коментарів</h5>
                                            @endif

                                            @if(array_keys($data)[0]=='politics')
                                                    <form style="margin-top: 20px" action="{{route('admin_coment')}}" method="post">
                                                        <div class="form-group">
                                                            <input class="form-control"  type="text" name="text" placeholder="coment">
                                                            <input   type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                            <input   type="hidden" name="new_id" value="{{array_shift($data)['id']}}">
                                                        </div>
                                                        {{ csrf_field() }}
                                                        <button  type="submit" class="btn btn-default ">Send</button>
                                                    </form>

                                                @else
                                                            <form style="margin-top: 20px" action="{{route('coment')}}" method="post">
                                                                <div class="form-group">
                                                                    <input class="form-control"  type="text" name="text" placeholder="coment">
                                                                    <input   type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                                    <input   type="hidden" name="new_id" value="{{array_shift($data)['id']}}">
                                                                </div>
                                                                {{ csrf_field() }}
                                                                <button  type="submit" class="btn btn-default ">Send</button>
                                                            </form>

                                                @endif



                                        </div>
                                    @endguest

                                </div>
                                {{--<a class="" href="{{route('category',['category'=>$category])}}">Back</a>--}}

                        </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-1"> </div>
</div>
        </div>

    </div>
    <div class="col-lg-2"></div>
</div>

<script>
    $(document).ready(function(){



        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var id=$('.cat_news').attr('news-id');
        console.log(id);
        var reds_news= setInterval(function () {
            var count=parseInt($('#count').text());
            var rand = (Math.random()*2)+1;
            rand = Math.floor(rand);

            $('#count').text(rand+count);
            var item=$('#read').text(rand);
            $.ajax({
                url: '/ajax/reads',
                type: 'POST',
                data:{
                    _token: CSRF_TOKEN,
                    id:id,
                    count:rand+count
                },

                success: function( msg ) {
                    console.log(msg);
                }
            })

        },5000);


        $(".like ").one('click',function(){
             var count_like= parseInt($(this).text()) + 1;
            $(this).children('i').text(count_like);

            var coment_id=$(this).parent('.coment').attr('coment-id');
            var user=$(this).parent('.coment').attr('user-id');
            data=  {
                _token: CSRF_TOKEN,
                new_id:id,
                coment_id:coment_id,
                user_id:user,
                like:count_like
            };

            ajax(data);

        });

        $(".dislike ").one('click',function(){
            var count_like= parseInt($(this).text()) + 1;
            $(this).children('i').text(count_like);

            var coment_id=$(this).parent('.coment').attr('coment-id');
            var user=$(this).parent('.coment').attr('user-id');

          data= {
                _token: CSRF_TOKEN,
                new_id:id,
                coment_id:coment_id,
                user_id:user,
                dislike:count_like
            };

            ajax(data);

        });

        function ajax(data) {
            $.ajax({
                url: '/ajax/like',
                type: 'POST',
                data:data,

                success: function( msg ) {
                    console.log(msg);
                }
            })
        }
    });
</script>