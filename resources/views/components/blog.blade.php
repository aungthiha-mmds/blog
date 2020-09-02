<div class="card" style="margin-bottom: 12px;">
    <div class="card-header">
        <div class="row">
            <div class="col-md-3">
                {{ $blog->title }}
                <br>
                <span>Author by : {{ $blog->user->name }}</span>
                @if($blog->edit == 1)
                    <span>Edited</span>
                @endif
            </div>
            <div class="col-md-6">
                Category
                <br>
                <span>{{ $blog->category->name }}</span>
            </div>
            @if(\Auth::user())
                @if($blog->user->id == \Auth::user()->id)
                    <div class="col-md-3">
                        <a href="{{ route('blog.edit', ['blog' => $blog->id]) }}" class="btn btn-primary btn-md">Edit</a>
                        <a href="{{ route('blog.destroy', ['blog' => $blog->id]) }}" class="btn btn-danger btn-md del" data-value="{{ $blog->id }}">Del</a>
                    </div>
                @endif
            @endif
        </div>
    </div>

    <div class="card-body">
        {{ $blog->content }}
    </div>
</div>