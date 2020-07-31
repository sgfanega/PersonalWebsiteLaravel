<!DOCTYPE html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div class="main-page">
    @include('includes.header')

    <div class="container">
        @include('includes.messages')
        <main>
            @yield('content')
        </main>
    </div>

    @include('includes.footer')
</div>
</body>
</html>