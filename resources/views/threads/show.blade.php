@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $thread->title }}</div>
                <article>
                    <h2>{{ $thread->title }}</h2>
                    <p>{{ $thread->body }} </p>
                </article>
            </div>
        </div>
    </div>
</div>
@endsection