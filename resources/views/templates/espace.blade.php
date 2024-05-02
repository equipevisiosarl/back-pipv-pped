<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
    @include('composants.head')
    <title>@yield('title', 'PIPV-PPED')</title>
</head>

<body>
    @include('composants.header')
    @include('composants.sidebar')
    <main id="main" class="main">
       

        @yield('content')

    </main>
    @include('composants.footer')
    @include('composants.script')
</body>

</html>