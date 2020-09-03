<div class="card" style="margin-bottom: 12px;">
    <div class="card-header">
        <div class="row">
            <div class="col-md-5">
                {{ $blog->title }}
                <br>
                <span>Author by : {{ $blog->user->name }}</span>
                @if($blog->edit == 1)
                    <span><i>Edited</i></span>
                @endif
            </div>
            <div class="col-md-4">
                Category
                <br>
                <span>{{ $blog->category->name }}</span>
            </div>
            @if(\Auth::user())
                @if($blog->user->id == \Auth::user()->id)
                    <div class="col-md-3">
                        <div class="row">
                            <a href="{{ route('blog.edit', ['blog' => $blog->id]) }}" class="btn btn-primary btn-md">Edit</a>
                            <form action="{{ route('blog.destroy', ['blog' => $blog->id]) }}" method="POST" class="btn-md" style="margin-left:5px;">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-md del">Del</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3">
                        @if($blog->status == 1)
                        <p>Publish</p>
                        @else
                        <p>Unpublish</p>
                        @endif
                    </div>
                @endif
            @endif
        </div>
    </div>

    <div class="card-body">
        {{ $blog->content }}
        @if(count($blog->tags) != 0)
        <div class="row" style="margin-left:0;">
            @foreach ($blog->tags as $tag)
                <p style="background: #c1c1c7;border-radius: 5px;padding: 4px;font-size: 11px;font-weight: bold;margin-right:3px;">{{ $tag->name }}</p>
            @endforeach
        </div>
        @endif
    </div>
</div>