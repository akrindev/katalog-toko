<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>@yield('title') - Katalog Toko</title>
    <meta name="description" content="@yield('description')">

    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
</head>

<body>

    <main class="relative min-h-screen">
        <!--  nav -->
        <nav class="bg-purple-800 text-blueGray-100">
            <div class="max-w-5xl mx-auto p-4 md:py-6 md:px-0 md:text-3xl font-semibold">
                <span>@yield('title')</span>
            </div>
        </nav>


        <!-- content -->
        <section class="content max-w-5xl mx-auto p-4 md:p-0 my-5">
            @yield('content')
        </section>
    </main>

    @include('footer')

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

</body>
</html>
