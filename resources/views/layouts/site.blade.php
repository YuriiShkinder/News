<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="News site">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@if(isset($title))
    <title>{{$title}}</title>
    @else
    <title>News site</title>
    @endif

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body>

<style>
    body{
        background: {{DB::table('styles')->first()->body}};
    }
</style>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('page')}}">News</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarResponsive">
            <ul style="float: right" class="navbar-nav ml-auto">

                <form autocomplete="off" style="margin-right:50px "  action="{{route('ajax_search')}}"  method="post" class="form-inline">
                    <input id="search" class="form-control mr-sm-2" name="tags" type="text" placeholder="Search #tag" value="" aria-label="Search">

                    @csrf
                    <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Go">
                </form>
                <ul class="list" >

                </ul>

                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>

                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                            {{--<span class="caret"></span>--}}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ route('panel') }}">
                                Admin panel
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>

<div class="container ">

    @yield('content')

</div>
<!-- Footer -->
<footer class="py-3 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Yurii Website 2018</p>
    </div>
    <!-- /.container -->
</footer>
</body>


<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</html>

<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');



    $('#search').keydown(function () {
        var str=$('#search').val();
        if(str.length>=1){
            $('.list').slideDown();
            $.ajax({
                url: '/ajax/search',
                type: 'POST',
                data:{
                    _token: CSRF_TOKEN,
                    str:str
                },

                success: function( msg ) {

                    if(msg.length==0){
                        $('.list').children().remove();
                        $('.list').append('<li>No search</li>')
                    }else{
                        $('.list').children().remove();

                            console.log(msg[0].tags);
                            for(var i in msg){

                               $('.list').append('<li class="test">'+msg[i].tags+'</li>')
                            }

                    }


                }
            })

    }else {
            $('.list').slideUp();
        }
    })

       $('.list').on('click','.test',function () {

            $('#search').val($(this).text())
           $('.list').hide();
       })


</script>