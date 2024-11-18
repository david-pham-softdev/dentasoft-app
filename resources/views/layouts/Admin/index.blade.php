<html>
   <head>
       @include('layouts.Admin._includes._head')
   </head>
   <body>
      @include('layouts.Admin._includes._menu_superior')
      <main>
        @if(Session::has('flash_message'))
          <div class="{{ Session::get('flash_message')['class'] }} flash-message" id="flash_message">
              <div style="color: #fff; display: inline-block; margin-right: 10px; font-weight: bold;">
                    {!! Session::get('flash_message')['msg'] !!}
              </div> 
          </div>
        @endif
        @include('layouts.Admin._includes._menu_lateral')
        @yield('content')
      </main>
   </body>
</html>
@include('layouts.Admin._includes._script_footer')
