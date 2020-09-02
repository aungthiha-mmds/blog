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
<!-- <script>
$('.del').click(function(){
    url = '{{ route("blog.update", ":id") }}',
    url = url.replace(":id", $(this).attr('data-value'))
    $.ajax({
        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        url: url,
        type: 'DELETE',
        success: function(result) {
            $(this).closest('.card').hide()
        }
    });
})
</script> -->
@endsection
