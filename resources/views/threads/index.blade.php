@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Threads</div>
                @foreach($threads as $thread)
                    <div class="card-body">
                        <div class="card-title"><a href="{{ $thread->path() }}">{{ $thread->title }}</a></div>
                        <p class="card-text">{{ $thread->body }} </p>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection