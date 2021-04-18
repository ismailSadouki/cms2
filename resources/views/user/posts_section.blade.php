@forelse ($contents->posts as $post)
    <div class="col-md-6  mb-3">
        <div class="card">
            <div class="card-body">
                <a href="{{route('post.show', $post->slug)}}">
                    <h5 class="card-title">{{\Illuminate\Support\Str::limit($post->title, 50)}}</h5>
                </a>
            </div>
            @can('delete', $post)
                <div class="card-footer">
                    <a class="btn btn-danger" href="{{ route('post.destroy',$post->id) }}">حذف</a>
                </div>
            @endcan
            
            
        </div>
        
    </div>
@empty
    <div class="col-lg-6 col-md-4 mb-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">لم يتم اضافة اي مقالات</h5>
            </div>
        </div>
        
    </div>
@endforelse