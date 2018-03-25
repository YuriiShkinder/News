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


        @if(isset($data))
                <div style="margin-top: 50px" class="row justify-content-center">
                    <div class="col-lg-12 ">
                        <form  action="{{route('admin_blurds_edit',['blurd'=>$data->id])}}" method="post">
                            <div class="form-group">
                                <label for="title">title:</label>
                                <input id="title" type="text" name="title" class="form-control" value="{{$data->title}}" >
                            </div>
                            <div class="form-group">
                                <label for="price">price:</label>
                                <input id="price" type="text" name="price" class="form-control" value="{{$data->price}}" >
                            </div>
                            <div class="form-group">
                                <label for="firm">firm:</label>
                                <input id="firm" type="text" name="firm" class="form-control" value="{{$data->firm}}" >
                            </div>
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-default">Submit form</button>
                        </form>

                    </div>
                </div>
            @endif






    </div>

@endsection