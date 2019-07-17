@if($backend)
    <link href="{{ asset('less/style.css') }}" rel="stylesheet">
@endif
@yield('content')
@if($backend)
    <script src="{{ asset('js/jq.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
@endif
