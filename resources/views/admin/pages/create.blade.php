@extends('admin.template')

@section('title')
انشاء صفحة جديدة    
@endsection
@section('head')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
      <div class="card mb-3">
      @include('alerts.success')
        <div class="card-header">
          <i class="fa fa-table"></i>  
        </div>
        <div class="card-body text-right" dir="rtl"> 
          <div class="container">
            <form method="POST" action="{{route('page.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-5 form-group">
                    <label for="title"> الاسم اللطيف </label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug"  value="{{old('slug')}}" placeholder="مثال: About" required>
                    @error('slug')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-lg-5 form-group">
                    <label for="title"> العنوان </label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"  value="{{old('title')}}" placeholder="مثال: نبذة عنا " required>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-lg-12 form-group">
                    <label for="body"> المحتوى </label>
                    <textarea name="content" class="form-control summernote @error('content') is-invalid @enderror" required>{{old('content')}}</textarea>
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-lg-12 form-group">
                    <button type="submit" class="btn btn-primary mt-3">إنشاء </button>
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