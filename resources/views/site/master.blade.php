<html class="no-js" lang="zxx">
    @include('site.inc.head')
   <body>
    @include('site.inc.header')
    <main>
        @yield('content')
    </main>
    
    @include('site.inc.footer')
    @include('site.inc.script')
    </body>
</html>