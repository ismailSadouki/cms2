@extends('layouts.app')

@section('content')
 
<div class="card posts mb-3 p-3 text-right border-0">
  <div class="card-body">

    <h5 class="card-title">{{$page->title}}</h5>
    <p class="card-text">{!! $page->content !!}</p>

  </div>
</div>
@endsection