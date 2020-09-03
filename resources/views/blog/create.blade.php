@extends('layouts.app')
@section('content')
<div class="container">
    <x-error />
    <x-alert />
    <form method="POST" action="{{ route('blog.store') }}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <textarea name="title" class="form-control" cols="30" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Content</label>
            <textarea name="content" class="form-control" cols="30" rows="6"></textarea>
        </div>
        <h5>Choose Category</h5>
        <select class="custom-select" name="category" >
            @foreach($categoires as $category)
            <option value="{{ $category->id }}" >{{ $category->name }}</option>
            @endforeach
        </select>
        <br><br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="status"  value="1">
            <label class="form-check-label" for="inlineCheckbox1">Publish</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="status" value="0">
            <label class="form-check-label" for="inlineCheckbox2">Unpublish</label>
        </div>
        <br><br>
        <x-tag :tags="$tags" />
        <br><br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@include('blog.googleValidation')
@endsection
