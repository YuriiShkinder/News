@extends('layouts.site')

@section('content')




    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class='row'>
                <div class="col-lg-12">

                    @if(isset($data))
                        <h4 style="margin: 50px 0 ">Результат по #{{$data->first()->tags}}</h4>
                        @foreach($data as $val)
                            <div class="category">
                                <h5><a href="{{route('news',['id'=>$val->news->id,'category'=>$val->news->category->categorys])}}">{{$val->news->title}}</a></h5>
                            </div>
                        @endforeach
                    @endif

                </div>


            </div>

        </div>
        <div class="col-lg-2"></div>
    </div>


@endsection