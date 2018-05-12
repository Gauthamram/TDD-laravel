<!-- @extends('layouts.app')

@section('content')
<div class="container">
    @if(auth()->id())
    <div class="row justify-content-center mt-3" >
        <div class="col-md-8">
            <form method="POST" action="/threads">
                {{ csrf_field() }}
                <fieldset class="form-group">
                   <input type="text" class="form-control" name="title" placeholder="title"/>
                </fieldset>
                <fieldset class="form-group">
                   <textarea class="form-control" name="body" rows="8" placeholder="Say Something!!!"></textarea>
                </fieldset>
                <fieldset class="form-group">
                     <button type="Submit" class="btn btn-primary">Reply</button>
                </fieldset>
            </form>
        </div>
    </div>
    @endif
</div>
@endsection -->