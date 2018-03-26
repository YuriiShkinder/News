

<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class='row'>
            <div class="col-lg-12">

                @if(isset($data))
                    @foreach($data as $category=>$new)
                        <div class="category">
                            <h3>{{$category}}</h3>
                            @foreach($new as $val)
                                @if($val['id']>0)
                                    <div class="cat_news">
                                        <h4>{{$val['title']}}</h4>
                                        <p>{{$val['fulltext']}} ....</p>
                                        <a class="" href="{{route('news',['category'=>$category,'id'=>$val['id']])}}">Read more</a>

                                       <div class="row">
                                           <div class="col-lg-2">
                                           </div>
                                           <div class="col-lg-7 text-center">
                                                @if(isset($val['tags']))
                                                    @foreach($val['tags'] as $value)
                                                        <a style="display: inline-block; margin: 0 5px" href="{{route('tags',['tag'=>$value])}}"> #{{$value}}</a>
                                                        @endforeach
                                                    @endif
                                           </div>
                                           <div class="col-lg-3">

                                           </div>

                                       </div>

                                    </div>

                                @else
                                    {{$val['title']}}
                                @endif

                            @endforeach
                        </div>
                    @endforeach
                @endif

            </div>


        </div>

    </div>
    <div class="col-lg-2"></div>
</div>