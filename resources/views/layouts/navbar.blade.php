

<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a href="/" class="navbar-brand ">
        <img src="{{isset($setting->logo) ? asset('images/'.$setting->logo) : asset('images/logo.png')}}" alt="logo image" width="70" height="40">
      </a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mb-2 mb-lg-0 text-right">
          <li class="nav-item">
            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="/">الرئيسية</a>
          </li>
          @forelse($categories as $key=>$category)
              @if ($key <= 2)
                <li class="nav-item  {{ request()->is($category->id.'/'.$category->slug) ? 'active' : '' }}">
                      <a class="nav-link" href="/category/{{$category->id}}/{{$category->slug}}">{{$category->title}}</a>           
                </li>
              @endif

          @empty
          @endforelse
          @if (count($categories) > 3)
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                  المزيد
                </a>
                <ul class="dropdown-menu text-right" aria-labelledby="navbarDropdown">
                  @forelse($categories as $key=>$category)
                      <li>
                        @if ($key > 3)
                            <a class="dropdown-item" href="/category/{{$category->id}}/{{$category->slug}}">{{$category->title}}</a>           
                        @endif
                      </li>
                  @empty
                  @endforelse
                </ul>
              </li>
          @endif

          @if (count($pages))
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                الصفحات
              </a>
              <ul class="dropdown-menu text-right" aria-labelledby="navbarDropdown">
                @foreach ($pages as $page)                  
                  <li><a class="dropdown-item" href="{{ route('page.show', $page->slug) }}">{{ $page->title }}</a></li>
                @endforeach
              </ul>
            </li>
          @endif  

          @auth              
            <li class="nav-item mr-2 ">
                <a class="nav-link "  href="{{Url('create/post')}}">
                  مقالة جديدة
                  <i class="fa fa-plus fa-fw"></i>
                </a>
            </li>
          @endauth
          
        </ul>
        {{-- <form class="d-flex" method="POST" action="{{route('search')}}">
          @csrf
          <input class="form-control ml-2 w-80" type="search" placeholder="ابحث ..." name="keyword">
          <button class="btn btn-outline-success" type="submit">ابحث</button>
        </form> --}}
        @guest
          <a class="btn btn-outline-success mr-1" href="{{route('login')}}">دخول</a>
        @endguest
        @auth
           <ul class="navbar-nav text-right p-0">
            <li class="nav-item dropdown">
              <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('avatars/'.auth()->user()->avatar) }}" alt="logo image" class=" img-rounded " style="border-radius: 50%" width="65" height="40">

              </a>
              <ul class="dropdown-menu text-right" aria-labelledby="navbarDropdown">
                @can('login-dashboard')
                  <li class="nav-item mr-2">
                    <a class="nav-link"  href="{{route('dashboard.index')}}">
                      لوحة التحكم
                    </a>
                  </li>
                @endcan
                
                <li class="nav-item mr-2">
                  <a class="nav-link"  href="{{route('profile', Auth::id())}}">
                    الصفحة الشخصية
                  </a>
                </li>
                <li class="nav-item mr-2">
                  <a class="nav-link"  href="{{route('settings')}}">
                     الاعدادات
                  </a>
                </li>
                <li class="nav-item mr-2">
                  <a class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">خروج</a>
                </li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </ul>
            </li>
          </ul>
        @endauth
        

      </div>
    </div>
  </nav>









