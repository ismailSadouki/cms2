@extends('layouts.app')

@section('style')
    <link href="{{ asset('css/showPost.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="card card_color posts mb-3 p-3 text-right border-0">

      <img src="{{asset('images/'.$post->image_path)}}" class="card-img-top" alt="{{$post->title}}" height="500">

    <div class="card-body">

      <h5 class="card-title">{{$post->title}}</h5>
      <p class="card-text">{!!$post->body!!}</p>
      <p class="card-text"><small class="text-muted">  
        {{$post->created_at->diffForHumans()}}
        بواسطة
        <a href="{{ route('profile', $post->user->id) }}">
          {{ $post->user->name }}
        </a>
      </small></p>

    </div>
</div>


<!-- Comments Form -->
<div class="row order-2 order-lg-1 text-right" dir="rtl">
  <div class="comments">
      <div class="comments-details mb-3">
          <span>التعليقات {{count($comments)}}</span>
      </div>
      <div class="public-comments">
          <div class="form-group">
            <form action="{{ route('comment.store') }}" method="POST">
              @csrf
              <textarea class="form-control @error('body') is-invalid @enderror" id="exampleFormControlTextarea1" name="body" rows="4" placeholder="اضافة تعليق عام"></textarea>
              <input type="hidden" name="post_id" value="{{$post->id}}">
                @error('body')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              <button type="submit" class="btn btn-info mt-3">تعليق</button>
            </form>

            @forelse ($comments as $comment)
                <div class="card mt-5 mb-3">
                  <div class="card-body card_color ">
                      <div class="row">
                          <div class="col-2">
                              <img src="{{isset($comment->user->avatar) ? asset('avatars/'.$comment->user->avatar) : 'https://image.ibb.co/jw55Ex/def_face.jpg' }}" class="img img-rounded img-fluid"/>
                              <p class="text-secondary text-center reply-time">{{ $comment->created_at->diffForHumans() }}</p>
                          </div>
                          <div class="col-10">
                            
                            <div class="clearfix"></div>
                            <p><a href="{{ route('profile', $comment->user->id) }}"><strong>{{ $comment->user->name }}</strong></a></p>
                              <p>{{ $comment->body }}</p>
                              
                          
                          </div>
                         
                      </div>
                      @include('partials.replies' ,['replies'=> $comment->replies])
                      <form action="{{route('reply')}}" method="POST" class="position-relative">
                        @csrf
                        <input type="text" class="form-control mt-2 @error('body') is-invalid @enderror " name="body" placeholder="الرد على التعليق..." id="" >
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                        @error('body')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <button type="submit" class="btn btn-info mt-2" ><i class="fa fa-send"></i></button>
                      </form>
                      
                  </div>
              </div>
            
            @empty
                <div class="card p-2 mt-3">
                  لا يوجد تعليقات.
                </div>
            @endforelse
             
              
          </div>
      </div>
  </div>
</div> <!-- End comments -->
@endsection

@section('script')
    <script src="text/javascript">
          $(document).ready(function () {
           

              $(".reply").click(function() {
                  $(this).parents("div.row").next("div.card").toggleClass();
              });
          });
          
    </script>
@endsection