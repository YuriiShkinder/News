@extends('layouts.app')

@section('content')
<div class="container">
    <div style="margin-top: 50px" class="row justify-content-center">
        <div class="col-lg-5 ">
    <div class="list-group">
        <a href="{{ route('admin_category') }}" class="list-group-item">Category</a>
        <a href="{{ route('admin_news') }}" class="list-group-item">News</a>
        <a href="{{ route('admin_blurds') }}" class="list-group-item">Blurds</a>
    </div>
            <div style="margin-top: 30px" class="list-group">
                <a href="{{ route('admin_styles') }}" class="list-group-item">Styles</a>
            </div>

        </div>
    </div>

</div>
    @endsection