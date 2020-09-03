@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @foreach($blogs as $blog)
            <x-blog :blog="$blog" />
        @endforeach
        </div>
    </div>
</div>
@endsection
