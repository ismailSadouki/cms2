@extends('layouts.app')

@section('content')
<div class="card text-right mt-3 mb-3">
    <div class="card-header">{{ __('تعديل البيانات الشخصية') }}</div>

    <div class="card-body">
        <form method="POST" action="{{ route('settings') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('الاسم') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('البريد الالكتروني') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('ألنبذة الشخصية') }}</label>

                <div class="col-md-6">
                    <textarea id="bio" type="bio" class="form-control @error('bio') is-invalid @enderror" name="bio" required  placeholder="{{ $user->bio ?? ' اضف نبذة شخصية'}}">{{ $user->bio ?? null}}</textarea>

                    @error('bio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('الصورة الشخصية') }}</label>

                <div class="col-md-6">
                    <input id="file" type="file" class="form-control @error('avata_file') is-invalid @enderror" name="avatar_file"   >

                    @error('avata_file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('حفظ التعديلات') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection