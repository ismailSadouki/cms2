@forelse ($contents->comments as $comment)
<div class="col-md-6  mb-3">
    <div class="card">
        <div class="card-body">
            <a href="{{route('post.show', $comment->post->slug)}}">
                <h5 class="card-title">{{\Illuminate\Support\Str::limit($comment->body, 30) }}</h5>
            </a>
        </div>                            
    </div>
</div>
@empty
<div class="col-md-6  mb-3">
    <div class="card">
        <div class="card-body">
                <h5 class="card-title">لا توجد اي تعليقات بعد.</h5>
        </div>                            
    </div>
</div>
@endforelse