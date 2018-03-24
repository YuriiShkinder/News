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
            <div class="col-lg-12 ">

                @if(isset($data))
                <form  action="{{route('admin_news_edit',['news'=>$data->id])}}" method="post">

                    <div class="form-group">
                        <label for="id">id:</label>
                        <input disabled id="id" type="text" name="id" class="form-control" value="{{$data->id}}">
                    </div>
                            <div class="form-group">
                                <label for="title">title:</label>
                                <input id="title" type="text" name="title" class="form-control" value="{{$data->title}}">
                            </div>
                    <div class="form-group">

                        <label for="category"> category:</label>
                        <input id="category" type="hidden" name="category_id" value="{{$data->category_id}}">
                        <select  class="form-control" >
                            @if($categorys)
                                @foreach($categorys as $category)
                                    @if($data->category->categorys===$category)
                                    <option selected>{{$category}}</option>
                                    @else
                                        <option>{{$category}}</option>

                                        @endif
                                @endforeach
                                @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="text">text:</label>
                        <input id="text" type="text" name="text" class="form-control" value="{{$data->text}}">
                    </div>
                    <div class="form-group">
                        <label for="fulltext">fulltext:</label>
                        <textarea style="resize: none; height: 150px" id="fulltext"  name="full_text" class="form-control" >{{$data->full_text}}</textarea>
                    </div>
                    <label for="chec">tags:</label>
                        <div id="chec" class="form-check">

                        @if(count($data->tags)>0)

                            @foreach($data->tags as $tags)
                                    <label class="form-check-label" for="tag">{{$tags->tags}}</label>
                                <input style="margin-right: 10px" id='tag' type="checkbox" name="tags[]" checked value="{{$tags->tags}}">
                            @endforeach

                        @else
                            <p>no tags</p>
                        @endif
                        <div style="margin: 10px" id="add_tag">
                            <a  class="btn btn-primary send">Add new tags</a>
                            <div style="display: none" class="add_form">
                                <div style="margin-top: 10px" class="row col-lg-4 input-group">

                                    <input style="margin-right: 10px" class="form-control" type="text" placeholder="new tag name">
                                    <a id="add_chec" class="btn btn-primary">add tags</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="images">image:</label>
                        <input type="hidden" name="images" value="{{$data->images}}">
                        <img style="height: 200px" id="images" src="{{$data->images}}"   name="images"  alt="{{$data->title}}">
                   <div style=" height:150px ;overflow:scroll">
                       @for($i=0;$i<12;$i++)
                           <img class="images_new" style="padding: 10px 5px" src="https://randomuser.me/api/portraits/men/{{ rand(0,100) }}.jpg">
                           @endfor
                   </div>
                    </div>
                    {{ csrf_field() }}
                            <button type="submit" class="btn btn-default">Submit form</button>
                </form>
                @endif

            </div>
        </div>

    </div>
    <script>
        $(document).ready(function() {
            $('.images_new').click(function () {
                var src=$(this).attr('src');
                $(this).parent().parent().children('#images').attr('src',src);
                $(this).parent().parent().children('input').attr('value',src);

            });

            $('.send').click(function () {
               $(this).hide(function () {
                   $(this).siblings('.add_form').slideToggle();
                    $('#add_chec').click(function () {
                        var tags=$(this).siblings('input').val();
                        if(tags!=''){
                        var  tag='<label class="form-check-label" for="tag">'+tags+'</label>' +
                            '<input id="tag" type="checkbox" name="tags[]" checked value="'+tags+'">';
                        console.log(tag);
                         $('#add_tag').before(tag);
                        $(this).siblings('input').val('');
                         $('.add_form').slideUp ();
                        $('.send').slideDown();
                        }
                    });

               });

            });

        });

    </script>
@endsection
