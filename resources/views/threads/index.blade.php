@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Threads</div>
                @foreach($threads as $thread)
                <article>
                    <h2><a href="/thread/{{$thread->id}}">{{ $thread->title }}</a></h2>
                    <p>{{ $thread->body }} </p>
                </article>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection