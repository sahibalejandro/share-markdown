<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Markdown</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    @include('partials.navbar')

    <div class="@section('container-class') container-fluid @show">
        @yield('content')
    </div>

    <script src="{{ asset('js/common.js') }}"></script>

    @yield('scripts')

</body>
</html>