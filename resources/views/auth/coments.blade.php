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
                <form action="{{route('admin_coment_lock')}}" method="post">
                <table class="table table-bordered">
                    <thead>
                    <tr>

                        <th>id</th>
                        <th>new_id</th>
                        <th>user_id</th>
                        <th>text</th>
                        <th>/</th>

                    </tr>
                    </thead>
                    <tbody>

                    @if(isset($data))
                        @foreach($data as $val)
                            <tr>
                                <td>{{$val->id}}</td>
                                <td>{{$val->new_id}}</td>
                                <td>{{$val->user_id}}</td>
                                <td><input type="text" name="text[{{$val->id}}]" value="{{$val->text}}"></td>
                                <td><input type="checkbox" name="name[{{$val->id}}]">Lock</td>
                            </tr>
                            @endforeach


                    @endif



                    </tbody>
                </table>
                    @csrf
                  <input type="submit" value="Send">
                </form>

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
