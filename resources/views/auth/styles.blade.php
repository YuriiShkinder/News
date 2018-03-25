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

        <div style="margin-top: 50px" class="row justify-content-center">
            <div class="col-lg-6 ">
                <table class="table table-bordered">
                    <thead>
                    <tr>

                        <th>body</th>

                    </tr>
                    </thead>
                    <tbody>

                    @if(isset($data))

                            <tr>
                                <td class="text-center">
                                    <a style="width: 75%" class="btn btn-info send">{{$data->body}}</a>
                                    <form style="display: none" class="add_form" action="{{route('admin_styles',['style'=>$data->id])}}" method="post">
                                        <div style="margin-top: 10px" >
                                            {{ csrf_field() }}

                                            <input style="margin-bottom: 10px; " class="form-control" type="text" name="body" value="{{$data->body}}">
                                            <input   type="submit" class="btn btn-primary" value="Send">
                                        </div>
                                    </form>
                                </td>
                            </tr>
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
                $(this).text('News background body');
                $(this).siblings('.add_form').slideToggle();
                $(this).click(function () {
                    $(this).text(name);
                })
            })
        })

    </script>

@endsection
