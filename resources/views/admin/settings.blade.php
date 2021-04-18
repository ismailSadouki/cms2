@extends('admin.template')

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('title')
  اعدادات الموقع
@endsection
@section('content')
<div class="container-fluid text-right" dir="rtl">
    <div class="card mb-3">
     @include('alerts.success')
      <div class="card-header">
        <i class="fa fa-tools"></i>  تعديل اعدادات الموقع 
      </div>
      <div class="card-body">
        <div class="container text-right">
          <form method="POST" action="{{route('site.settings.updateOrStore')}}" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" value="{{$setting->id ?? ''}}">
              <div class="form-row">
                  <div class="col-lg-5 form-group">
                      <label for="email">البريد الالكتروني</label>
                      <input value="{{ $setting->email ?? '' }}" type="text" class="form-control  text-right @error('email') is-invalid @enderror" name="email"  placeholder="اضف بريدك الالكتروني">
                      @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="col-lg-5 form-group">
                    <label for="facebook">الفايسبوك</label>
                    <input value=" {{ $setting->facebook ?? '' }}" type="text" class="form-control  text-right @error('facebook') is-invalid @enderror" name="facebook"  placeholder="اضف رابط حسابك على الفايسبوك">
                    @error('facebook')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                </div>
                  
              </div>

              <div class="form-row">
                <div class="col-lg-5 form-group">
                    <label for="twitter"class="text-nowrap">التويتر</label>
                    <input value="{{ $setting->twitter ?? '' }}" type="text" class="form-control  text-right @error('twitter') is-invalid @enderror" name="twitter"  placeholder="اضف رابط حسابك على التويتر">
                    @error('twitter')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                </div>
                <div class="col-lg-5 form-group">
                  <label for="linkedin">لينكدان</label>
                  <input value="{{ $setting->linkedin ?? '' }}" type="text" class="form-control  text-right @error('linkedin') is-invalid @enderror" name="linkedin"  placeholder="اضف رابط حسابك على لينكدان">
                  @error('linkedin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
              </div>
                
            </div>



            <div class="form-row">
                <div class="col-lg-5 form-group">
                    <label for="instagram">انستغرام</label>
                    <input value="{{ $setting->instagram ?? '' }}" type="text" class="form-control  text-right @error('instagram') is-invalid @enderror" name="instagram"  placeholder="اضف رابط حسابك على انستغرام">
                    @error('instagram')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                </div>
            </div>
             

              <div class="col-lg-12 form-group">
                  <label for="logo">اضف صورة شعار الموقع</label>
                  <input type="file" name="img"  class="form-control text-right @error('logo') is-invalid @enderror">
                  @error('logo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
              </div>

              <div class="col-lg-12 form-group">
                  <label for="image">اضف صورة الخلفية في الجزء العلوي</label>
                  <input type="file" name="image"  class="form-control text-right @error('image') is-invalid @enderror">
                  @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
              </div>

              <div class="form-row">
                  <div class="col-lg-5 form-group">
                      <label for="twitter"class="text-nowrap">ضبط لون خلفية الموقع</label>
                      <input value="{{$setting->background_main ?? ''}}" type="text" class="form-control  text-right" name="background_main"   placeholder="حدد اللون" id="hex">       
                  </div>
                  <div class="col-lg-5 form-group">
                    <input type="color" style="width: 100px ;height:80px"  value="{{$setting->background_main ?? ''}}" id="color">
                  </div>     
              </div>

              <div class="form-row">
                  <div class="col-lg-5 form-group">
                      <label for="hex"class="text-nowrap">ضبط لون خلفية القائمة العلوية</label>
                      <input value="{{$setting->background_nav ?? ''}}" type="text" class="form-control  text-right" name="background_nav"   placeholder="حدد اللون" id="hex2">       
                  </div>
                  <div class="col-lg-5 form-group">
                    <input type="color" style="width: 100px ;height:80px" value="{{$setting->background_nav ?? ''}}" " id="color2">
                  </div>     
              </div>

              <div class="form-row">
                <div class="col-lg-5 form-group">
                    <label for="hex"class="text-nowrap">ضبط لون خلفية تذييل الصفحة </label>
                    <input value=" {{$setting->background_footer ?? ''}}" type="text" class="form-control  text-right" name="background_footer"   placeholder="حدد اللون" id="hex3">       
                </div>
                <div class="col-lg-5 form-group">
                  <input type="color" style="width: 100px ;height:80px" value="{{$setting->background_footer ?? ''}}" id="color3">
                </div>     
            </div>

            <div class="form-row">
                <div class="col-lg-5 form-group">
                    <label for="hex"class="text-nowrap">ضبط لون خلفية البطاقات </label>
                    <input value=" {{$setting->card_color ?? ''}}" type="text" class="form-control  text-right" name="card_color"   placeholder="حدد اللون" id="hex4">       
                </div>
                <div class="col-lg-5 form-group">
                  <input type="color" style="width: 100px ;height:80px" value="{{$setting->card_color ?? ''}}" id="color4">
                </div>     
            </div>

            <div class="form-row">
                <div class="col-lg-5 form-group">
                    <label for="hex"class="text-nowrap">ضبط لون خلفية الجزء العلوي من بطاقة (احدث المقالات,احدث التعليقات) </label>
                    <input value=" {{$setting->card_com_pos_nav ?? ''}}" type="text" class="form-control  text-right" name="card_com_pos_nav"   placeholder="حدد اللون" id="hex5">       
                </div>
                <div class="col-lg-5 form-group">
                  <input type="color" style="width: 100px ;height:80px" value="{{$setting->card_com_pos_nav ?? ''}}" id="color5">
                </div>     
            </div>

            <div class="form-row">
                <div class="col-lg-5 form-group">
                    <label for="hex"class="text-nowrap">ضبط لون خلفية بطاقة (احدث المقالات,احدث التعليقات) </label>
                    <input value=" {{$setting->card_com_pos_body ?? ''}}" type="text" class="form-control  text-right" name="card_com_pos_body"   placeholder="حدد اللون" id="hex6">       
                </div>
                <div class="col-lg-5 form-group">
                  <input type="color" style="width: 100px ;height:80px" value="{{$setting->card_com_pos_body ?? ''}}" id="color6">
                </div>     
            </div>
            <div class="alert alert-info text-right">
                <b>ملاحظة :</b> للرجوع للوضع الافتراضي لألوان الموقع اترك حقل اللون فارغ.
            </div>
              <div class="col-lg-12 form-group">
                  <button type="submit" class="btn btn-primary mt-3"> اضف </button>
              </div>
          </form>
        </div>
      </div>
    </div>

    
</div>
@endsection

@section('script')


<script>

      

      let colorInput = document.querySelector('#color');
      let hexInput = document.querySelector('#hex');


      colorInput.addEventListener('input', () => {
          let color = colorInput.value;
          hexInput.value = color;
      });

      
      let colorInput2 = document.querySelector('#color2');
      let hexInput2 = document.querySelector('#hex2');


      colorInput2.addEventListener('input', () => {
          let color2 = colorInput2.value;
          hexInput2.value = color2;
      });
      let colorInput3 = document.querySelector('#color3');
      let hexInput3 = document.querySelector('#hex3');


      colorInput3.addEventListener('input', () => {
          let color3 = colorInput3.value;
          hexInput3.value = color3;
      });

      let colorInput4 = document.querySelector('#color4');
      let hexInput4 = document.querySelector('#hex4');


      colorInput4.addEventListener('input', () => {
          let color4 = colorInput4.value;
          hexInput4.value = color4;
      });

      let colorInput5 = document.querySelector('#color5');
      let hexInput5 = document.querySelector('#hex5');


      colorInput5.addEventListener('input', () => {
          let color5 = colorInput5.value;
          hexInput5.value = color5;
      });

      let colorInput6 = document.querySelector('#color6');
      let hexInput6 = document.querySelector('#hex6');


      colorInput6.addEventListener('input', () => {
          let color6 = colorInput6.value;
          hexInput6.value = color6;
      });
</script>
@endsection