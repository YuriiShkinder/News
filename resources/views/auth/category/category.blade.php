@extends('layouts.app')

@section('content')

    <div class="container">

        <a  class="btn btn-primary send">Add category</a>
        <form style="display: none" class="add_form" action="{{route('admin_category')}}" method="post">
            <div style="margin-top: 10px" class="row col-lg-4 input-group">
            <input style="margin-right: 10px" class="form-control" type="text" placeholder="category name">
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
                                <td>
                                    <a class="btn btn-info send">{{$item->categorys}}</a>
                                    <form style="display: none" class="add_form" action="{{route('admin_category',['id'=>$item->id])}}" method="post">
                                        <div style="margin-top: 10px" >
                                            <input style="margin-bottom: 10px" class="form-control" type="text" value="{{$item->categorys}}">
                                            <input  type="submit" class="btn btn-primary" value="Send">
                                        </div>
                                    </form>
                                </td>

                                <td class="text-center">
                                <form action="{{route('admin_category',['id'=>$item->id])}}" method="post">
                                    {{method_field('DELETE')}}
                                    <button type="button" class="btn btn-warning">Delete</button>
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
