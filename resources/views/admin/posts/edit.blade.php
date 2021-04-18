@extends('admin.template')

@section('head')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@endsection
@section('title')
    تعديل منشور
@endsection
@section('content')
<div class="container-fluid text-right" dir="rtl">
    <div class="card mb-3">
     @include('alerts.success')
      <div class="card-header">
        <i class="fa fa-table"></i>  تعديل منشور
      </div>
      <div class="card-body">
        <div class="container text-right">
          <form method="POST" action="{{route('posts.update',$post->id)}}" enctype="multipart/form-data">
              @csrf
              @method('Patch')
              <div class="form-row">
                  <div class="col-lg-5 form-group">
                      <label for="title">عنوان الموضوع</label>
                      <input type="text" class="form-control  @error('title') is-invalid @enderror  text-right" name="title"  value="{{$post->title}}">
                      @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="col-lg-6 form-group">
                      <label for="category_id">التصنيف </label>
                      <select class="form-control  @error('category_id') is-invalid @enderror " name="category_id">
                        <option value="" selected>اختر التصنيف المناسب</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{$post->category_id == $category->id ? 'selected' : ''}}>{{$category->title}}</option>
                                @endforeach 
                      </select>
                      @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
              </div>
              <div class="form-row text-right">
                  <div class="col-lg-5 form-group ">
                      <label for="slug">الإسم اللطيف </label>
                      <input type="text" class="form-control @error('slug') is-invalid @enderror text-right" name="slug" placeholder="" value="{{$post->slug}}">
                      @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
              </div>

              <div class="col-lg-12 form-group">
                  <label for="image"> اختر صورة تتعلق بالموضوع </label>
                <img name="img"  class="form-control mb-2" src="{{asset('images/'.$post->image_path)}}" style="width:250px;height:200px">
                  <input type="file" name="image"  class="form-control text-right">
              </div>

              <div class="col-lg-12 form-group">
                  <label for="body"> المحتوى </label>
                  <textarea class="form-control summernote @error('body') is-invalid @enderror col" id="editor" name="body" rows="3"  >{{$post->body}}</textarea>
                  @error('body')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
              </div>

              <div class="col-lg-12 form-group">
                  <button type="submit" class="btn btn-primary mt-3"> تحديث </button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
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