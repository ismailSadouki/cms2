@extends('layouts.app')

@section('script')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    
@endsection
@section('content')
    <form method="POST" action="{{route('post.store')}}" class="text-right mb-3" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <select name="category_id" class="form-control form-select form-select-lg @error('category_id') is-invalid @enderror">
                <option value="" selected>اختر التصنيف المناسب</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
           
            </select>
            @error('category_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group text-right">
            <input type="text" class="form-control  @error('title') is-invalid @enderror" placeholder="حدد عنوان الموضوع" name="title" value="{{ old('title') }}" required>
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <textarea class="form-control summernote @error('body') is-invalid @enderror"  name="body" placeholder="محتوي الموضوع" required id="editor" cols="30" rows="10">{{ old('body') }}</textarea>

            @error('body')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group text-right mb-3">
            <label for="details" class="text-right">اختر صورة تتعلق بالموضوع</label>
            {{-- <img name="image" class="from-controll w-25 h-25" src=""> --}}
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" >

            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-success text-right">ارسل</button>
    </form>
@endsection

@section('script')
<!-- include summernote css/js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>    

<script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });
</script>

@endsection

