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
        <a href="{{route('admin_blurds_add')}}" class="btn btn-primary send">Add blurds</a>

        <div style="margin-top: 50px" class="row justify-content-center">
            <div class="col-lg-12 ">
                <table  class="table table-bordered">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>price</th>
                        <th >firm</th>
                        <th >Delete</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if(isset($data))
                        @foreach($data as $item)

                            <tr >
                                <td>{{$item->id}}</td>
                                <td><a href="{{ route('admin_blurds_edit',['blurd'=>$item->id]) }}">{{$item->title}}</a></td>
                                <td> {{$item->price}}</td>
                                <td>{{ $item->firm }}</td>


                                <td class="text-center">
                                    <form action="{{route('admin_blurds',['blurd'=>$item->id])}}" method="post">
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