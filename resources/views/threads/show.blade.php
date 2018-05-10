@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header {{ $thread->id}}">{{ $thread->title }}</div>
                <div class="card-body">
                    <div class="card-title">{{ $thread->title }}</div>
                        <p class="card-text">{{ $thread->body }} </p>
                </div>
            </div>
            <br/>
            <div class="card">
                <div class="card-header">All Replies</div>
                @foreach($thread->replies as $reply)
                    <div class="card-body">
                        <div class="card-title"><a href="#">{{ $reply->author->name}}</a> said {{ $reply->created_at->diffForHumans() }}</div>
                        <p class="card-text">{{ $reply->body }} </p>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection