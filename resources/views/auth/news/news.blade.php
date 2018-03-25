@extends('layouts.app')

@section('content')

    <div class="container">

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
        <a href="{{route('admin_news_add')}}" class="btn btn-primary ">Add news</a>

        <div style="margin-top: 50px" class="row justify-content-center">
            <div class="col-lg-12 ">
                <table  class="table table-bordered">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>Category</th>
                        <th >text</th>
                        <th>tags</th>
                        <th>images</th>
                        <th>reads</th>
                        <th>like</th>
                        <th>gislike</th>
                        <th >Delete</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if(isset($data))
                        @foreach($data as $item)

                            <tr >
                                <td>{{$item->id}}</td>
                                <td><a href="{{route('admin_news_edit',['news'=>$item->id])}}" alt="{{$item->title}}">{{$item->title}}</a></td>

                                <td> {{$item->category->categorys}}</td>
                                <td>{{ $item->text }}</td>

                                <td>
                                    @if(count($item->tags)>0)

                                        @foreach($item->tags as $tags)
                                            <span>#{{$tags->tags}}</span>
                                        @endforeach

                                        @else
                                            <span>no tags</span>
                                        @endif

                                </td>
                                <td><img style="height: 100px" src="{{ $item->images }}"> </td>
                                <td> {{ $item->counts }}</td>
                                <td> {{ $item->like }}</td>
                                <td> {{ $item->dislike }}</td>
                                <td class="text-center">
                                    <form action="{{route('admin_news_edit',['news'=>$item->id])}}" method="post">
                                        {{method_field('DELETE')}}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-warning">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>

            </div>
        </div>

    </div>

@endsection