<h5>Tag</h5>
<div class="row" style="margin:0">
    @foreach ($tags as $tag)
        <div class="form-check form-check-inline">
            <input class="form-check-input" value="{{ $tag->id }}" type="checkbox" id="inlineCheckbox2" name="tag[]"
            {{ (!is_null($blog)) ? (!is_null($tag->blog($blog->id, $tag->id)) ? 'checked' : '') : '' }} >
        <label class="form-check-label" for="inlineCheckbox2">{{ $tag->name }}</label>
        </div>
    @endforeach
</div>