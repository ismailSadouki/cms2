<footer>
    <div class="top-footer text-center">
        
    <div class="contact text-center">
        <div class="overlay">
          
            <ul class="list-inline">
                <li class="list-inline-item  wow animate__animated animate__fadeInBottomRight">
                    <a href="{{ $setting->facebook ?? '' }}" class="facebook"><i class="fa fa-facebook"></i></a>
                </li>
                <li class="list-inline-item  wow animate__animated animate__fadeInUpBig">
                    <a href="{{ $setting->twitter ?? '' }}" class="twitter"><i class="fa fa-twitter"></i></a>
                </li>
                <li class="list-inline-item  wow animate__animated animate__fadeInUpBig">
                    <a href="{{ $setting->linkedin ?? '' }}" class="linkedin"><i class="fa fa-linkedin"></i></a>
                </li>
                <li class="list-inline-item wow animate__animated animate__fadeInBottomLeft">
                    <a href="{{ $setting->instagram ?? '' }}" class="instagram"><i class="fa fa-instagram"></i></a>
                </li>
            </ul>
            <hr>
            <p>
                <a href="mailto:{{$setting->email ?? ''}}?Subject=Hello">
                    <i class="fa fa-envelope-o"></i>
                    {{$setting->email ?? ''}}
                </a>
            </p>
        </div>
    </div>
</div>
</footer>