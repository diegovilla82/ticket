<!DOCTYPE html>
<html>
    <head>
        @include('layouts.head')
        @yield('head')
    </head>
<body>
<div id="app">
    @include('layouts.navbar')
    @isset($slot)
        {{ $slot }}
    @else
       @yield('content')
    @endisset
    @include('layouts.footer')
</div>
<livewire:scripts />
@include('layouts.js')
@yield('js')
</body>

</html>