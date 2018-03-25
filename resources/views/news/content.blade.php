
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <div class='row'>
            <div class="col-lg-12">

                @if(isset($data))
                        <div class="category">
                            @foreach($data as $category=>$val)
                                <div class="cat_news">
                                    <h4>{{$val['title']}}</h4>
                                    <img src="{{$val['images']}}" alt="{{$val['title']}}">
                                    <p>{{$val['fulltext']}} ....</p>

                                    <div class="row">
                                        <div class="col-lg-2">
                                            <span><i class="fa fa-anchor"></i>{{$val['count']}}</span>
                                        </div>
                                        <div class="col-lg-7 text-center">
                                            @if(isset($val['tags']))
                                                @foreach($val['tags'] as $value)
                                                    <a style="display: inline-block; margin: 0 5px" href="/"> #{{$value}}</a>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="col-lg-3">
                                            <span><i class="fa fa-thumbs-o-down"></i>{{$val['dislike']}}</span>
                                            <span><i class="fa fa-thumbs-o-up"></i>{{$val['like']}}</span>
                                        </div>
                                    </div>

                                </div>
                                {{--<a class="" href="{{route('category',['category'=>$category])}}">Back</a>--}}
                            @endforeach
                            @if($coments)

                            <div class="coments">
                                <div class="row justify-content-center">
                                    <div class="col-lg-12">
                                        @foreach($coments as $coment)
                                            <div class="coment">
                                                <h5>{{$coment->user->name}}</h5>
                                                <p>{{$coment->text}}</p>

                                            </div>

                                            @endforeach

                                    </div>
                                </div>

                            </div>
                                @endif

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