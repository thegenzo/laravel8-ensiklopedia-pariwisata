<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Manajemen Ensiklopedia Kota Baubau</title>
    
    @include('admin.include.style')
    @stack('addon-style')
</head>

<body>
    <div id="app">
        @include('admin.include.sidebar')
        <div id="main">
            @include('admin.include.navbar')
            
            @yield('content')

        </div>
    </div>
    @include('sweetalert::alert')
    @include('admin.include.script')
    @stack('addon-script')
</body>

</html>
