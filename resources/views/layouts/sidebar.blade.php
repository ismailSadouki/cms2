<div class="card search-card border-0 text-right mb-4">
    <div class="card-body text-center position-relative">
        <form action="{{route('search')}}" method="POST">
            @csrf
            <input type="text" placeholder="ابحث عن ..." name="keyword" id="" class="form-control border-0 mr-5 @error('body') is-invalid @enderror">
            <i class="fa fa-search position-absolute"></i>
          
        </form>     
    </div>
  </div>

<div class="card post-new border-0 text-right my-4">
    <div class="card-header p-4 card_com_pos_nav">
      احدث المقالات
    </div>
    <div class="card-body card_com_pos_body">
        @forelse ($posts as $post)
        <div class="card my-3 card_color p-1">
            <div class="row">
                <div class="col-5">
                    <a href="{{route('post.show',$post->slug)}}">
                        <div class="card-icons" style="width: 120px;">
                            <img src="{{asset('images/'.$post->image_path)}}" alt="" style="height:120px;width:120px">
                        </div>
                    </a>
                </div>
                <div class="col-7">
                    <div class="card-block">
                        <a href="{{route('post.show',$post->slug)}}">
                            <b>
                                <p style="font-size: 14px">
                                    {{\Illuminate\Support\Str::limit($post->title, 38)}}
                                </p>
                            </b>
                            <div class="text-muted">

                                {{$post->created_at->diffForHumans()}}
                                
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
            لا يوجد
        @endforelse
        
    </div>
  </div>


  
  <div class="card  comment-new border-0 text-right mt-4">
    <div class="card-header p-4 card_com_pos_nav">
        <h4>
        احدث التعليقات
        </h4>
    </div>
    <div class="card-body card_com_pos_body">
        @forelse ($recent_comments as $comment)
            <div>
                <a href="{{route('post.show', $comment->post->slug)}}"><p>{{$comment->body}}</p></a>
            </div>
        @empty
            <div>
                لا يوجد تعليقات لغرضها
            </div>
        @endforelse
   
    </div>
  </div>