
@forelse ($replies as $reply)
    <div class="card ml-5 mt-3 ">
        <div class="card-body card_color">
            <div class="row">
                <div class="col-2">
                    <img src="{{isset($reply->user->avatar) ? asset('avatars/'.$reply->user->avatar) : 'https://image.ibb.co/jw55Ex/def_face.jpg' }}" class="img img-rounded img-fluid"/>
                    <p class="text-secondary text-center reply-time">{{ $reply->created_at->diffForHumans() }}</p>
                </div>
                <div class="col-10">
                    <p><a href="{{ route('profile', $reply->user->id) }}"><strong>{{ $reply->user->name }}</strong></a></p>
                    <p> {{ $reply->body }} </p>
                
                </div>
                {{-- <form action="{{route('reply')}}" method="POST" class="position-relative">
                    @csrf
                    <input type="text" class="form-control mt-2 pr-5" name="body" placeholder="الرد على التعليق..." id="" >
                    <input type="hidden" name="post_id" value="{{ $reply->id }}">
                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                    <button type="submit" class="btn btn-info position-absolute" style="top:9px"><i class="fa fa-send"></i></button>
                  </form> --}}
            </div>
        </div>
    </div>             
@empty
    
@endforelse