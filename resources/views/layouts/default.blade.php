<!DOCTYPE html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div id="app">
    @include('includes.header')

    <div class="container">
        @include('includes.messages')
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @include('includes.footer')
</div>
</body>
</html>