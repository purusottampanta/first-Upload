@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('message.welcome') }}</div>
                <div class="panel-body">
                @foreach($posts as $post)
                    <a href="{{ $post->slug }}"><h3>{{ $post->title }}</h3>
                    <small class="fa fa-user">{{ $post->user->name }}</small>
                    <p>{{ $post->body }}</p></a>
                @endforeach
                <p>@lang('message.post')</p> <br> {{ trans("message.post") }}
                <p>@lang('pagination.previous')</p>
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection
