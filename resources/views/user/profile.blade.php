@extends('layouts.app')

@section('script')
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">     
            <div class="card mb-3 text-right" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4 my-2 pl-0">
                    <img src="{{ asset('avatars/'.$contents->avatar) }}" alt="image user" height="120" width="120">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{ $contents->name }}</h5>
                      <p class="card-text">{{ $contents->bio ?? 'لا يوجد نبذة شخصية'}}</p>
                    </div>
                  </div>
                </div>
              </div>
        </div>
      
        <div class="row p-3">
            <div class="col-md-12 text-right">
                <ul class="nav nav-tabs mb-3">
                    <li class="nav-item ">
                        <a href="{{ route('profile', $contents->id) }}" class="nav-link {{$contents->relationLoaded('posts') ? 'active' : ''  }}">المقالات</a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('profile.comments',$contents->id) }}" class="nav-link {{$contents->relationLoaded('comments') ? 'active' : ''  }}">التعليقات</a>
                    </li>
                </ul>
                
                <div class="row mb-2 text-right">
                    @if ($contents->relationLoaded('posts'))
                        @include('user.posts_section')
                    @else
                       @include('user.comments_section')
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection