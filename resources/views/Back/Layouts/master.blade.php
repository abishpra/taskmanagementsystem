@include($appType.'.Include.header')
@include($appType.'.Include.footer')
@include($appType.'.Include.nav')
@yield('header')
@yield('nav')
<div class="container-fluid">
@yield('content')
</div>
@yield('footer')

