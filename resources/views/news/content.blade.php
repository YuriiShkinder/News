
<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
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
                                <a class="" href="{{route('category',['category'=>$category])}}">Back</a>
                            @endforeach
                        </div>

                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        @if(isset($blurds))
            @for($i=1;$i<=count($blurds);$i+=2)
                <div class="baner">
                    <h6 class="text-center overflow">{{$blurds[$i]['title']}}</h6>
                    <div class="price">
                        <img class="baner_img" src="https://randomuser.me/api/portraits/women/{{ rand(5,100) }}.jpg">
                        <p>{{$blurds[$i]['firm']}}</p>
                        <p class="float-right">{{$blurds[$i]['price']}}$</p>
                    </div>
                </div>
            @endfor
        @endif
    </div>
</div>
        </div>

    </div>
    <div class="col-lg-2"></div>
</div>