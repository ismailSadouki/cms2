@extends('layouts.app')

@section('content')


                    @forelse ($posts as $post)
                        <div class="card card_color posts mb-3 p-3 text-right border-0">
                          <a href="{{route('post.show',$post->slug)}}">
                            <img src="{{asset('images/'.$post->image_path)}}" class="card-img-top" alt="..." height="500">
                          </a>
                          <div class="card-body">
                            <a href="{{route('post.show',$post->slug)}}">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <p class="card-text">{!!\Illuminate\Support\Str::limit($post->body, 200)!!}</p>
                            <p class="card-text"><small class="text-muted">  {{$post->created_at->diffForHumans()}}</small></p>
                            </a>
                          </div>
                        </div>
                    @empty
                    <div class="text-right h3">
                       لا يوجد نتائج.
                      </div>
                    @endforelse           

                    <ul class="pagination justify-content-center mb-4">
            
                        {{$posts->links("pagination::bootstrap-4")}}
                      
                    </ul>
               

@endsection
