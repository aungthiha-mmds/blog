@extends('layouts.app')

@section('content')

<div class="container">
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
         {{$error}} <br>
        @endforeach
        </div>
    @endif
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
    @endif
    <form method="POST" action="{{ route('blog.update', ['blog' => $blog->id]) }}">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <textarea name="title" class="form-control" cols="30" rows="3">{{ $blog->title }}</textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Content</label>
            <textarea name="content" class="form-control" cols="30" rows="6">{{ $blog->content }}</textarea>
        </div>
        <h5>Choose Category</h5>
        <select class="custom-select" name="category" >
            @foreach($categoires as $category)
                <option value="{{ $category->id }}" {{ ($category->id == $blog->category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
        <br><br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="status"  value="1" {{ ($blog->status == 1) ? 'checked' : '' }} />
            <label class="form-check-label" for="inlineCheckbox1">Publish</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="status" value="0" {{ ($blog->status == 2) ? 'checked' : '' }} >
            <label class="form-check-label" for="inlineCheckbox2">Unpublish</label>
        </div>
        <br><br>
        <h5>Tag</h5>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="tag">
            <label class="form-check-label" for="inlineCheckbox2">Tag</label>
        </div>
        <br><br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="text" id="inlineCheckbox2" name="tag_">
            <label class="form-check-label" for="inlineCheckbox2">Add tag</label>
        </div>
        <br><br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
