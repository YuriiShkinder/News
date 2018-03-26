@extends('layouts.site')

@section('content')

    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class='row'>
                <div class="col-lg-12">

                    @if(isset($data))
                        <h4 style="margin: 50px 0; text-align: center ">Коментарі user {{$data->name}}</h4>

                        @foreach($data->coments->groupBy('new_id') as $k=> $val)
                            <div class="category">

                                <h3><a href="{{route('news',['id'=>$val->first()->new->id,'category'=>$val->first()->new->category->categorys])}}">{{$val->first()->new->title}}</a></h3>

                                @foreach($val as $item)
                                    
                                    <img style="border-radius: 50%; height: 30px" src="https://randomuser.me/api/portraits/women/{{rand(0,100)}}.jpg">
                                    <span>{{$item->user->name}}</span>
                                    <p style="margin-bottom: 40px">{{$item->text}}</p>
                                    @endforeach

                            </div>
                        @endforeach
                    @endif

                </div>


            </div>

        </div>
        <div class="col-lg-2"></div>
    </div>


@endsection