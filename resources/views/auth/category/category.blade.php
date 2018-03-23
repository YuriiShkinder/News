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
        <a  class="btn btn-primary send">Add category</a>
        <form style="display: none" class="add_form" action="{{route('admin_category')}}" method="post">
            <div style="margin-top: 10px" class="row col-lg-4 input-group">
                {{ csrf_field() }}
            <input style="margin-right: 10px" class="form-control" type="text" name="categorys" placeholder="category name">
            <input  type="submit" class="btn btn-primary" value="Send">
            </div>
        </form>


        <div style="margin-top: 50px" class="row justify-content-center">
            <div class="col-lg-6 ">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Category</th>
                        <th >Delete</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if(isset($data))
                        @foreach($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td class="text-center">
                                    <a style="width: 75%" class="btn btn-info send">{{$item->categorys}}</a>
                                    <form style="display: none" class="add_form" action="{{route('admin_category',['id'=>$item->id])}}" method="post">
                                        <div style="margin-top: 10px" >
                                            {{ csrf_field() }}
                                            <input style="margin-bottom: 10px; " class="form-control" type="text" name="categorys" value="{{$item->categorys}}">
                                            <input   type="submit" class="btn btn-primary" value="Send">
                                        </div>
                                    </form>
                                </td>

                                <td class="text-center">
                                <form action="{{route('admin_category',['id'=>$item->id])}}" method="post">
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
    <script>
        $(document).ready(function() {
            $('.send').click(function () {
                var name=$(this).text();
                console.log($(this).text());
               $(this).text('News name category');
                $(this).siblings('.add_form').slideToggle();
                $(this).click(function () {
                    $(this).text(name);
                })
            })
        })

    </script>

    @endsection
