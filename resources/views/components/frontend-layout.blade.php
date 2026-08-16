<!DOCTYPE html>
<html lang="en">

@props(['title', 'meta_description', 'meta_keyword', 'image'])


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? 'NewsHub | Home'}}</title>
    <meta name="description" content="{{ $meta_description ?? '' }}">
    <meta name="keyword" content="{{ $meta_keyword ?? '' }}">

    <meta property="og::title" content="{{ $title ?? '' }}">
    <meta property="og::description" content="{{ $meta_description ?? '' }}">
    <meta property="og::image" content="{{ $image ?? '' }}">
    <meta property="og::url" content="{{ url()->current() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/main.css') }}">

    <script src="https://cdn.jsdelivr.net/gh/sudam-shrestha/nepali-calender@main/src/nepali-calendar.js"></script>


</head>

<body>

    <x-frontend-header></x-frontend-header>

    <main class="min-h-[90vh]">
        {{ $slot }}
    </main>

    <x-frontend-footer></x-frontend-footer>
    {{-- Nepali Date Script --}}
    <script>
        const date = document.getElementById('date');

        if (date && window.NepaliCalendar) {
            const nep = NepaliCalendar.adToBs(new Date());
            const nep_date = NepaliCalendar.formatBs(nep, 'ne');
            date.innerHTML = nep_date;
        }
    </script>
    {{-- Mobile Menu Script --}}
    <script>
        const menuButton = document.getElementById('menu-button');
        const closeMenu = document.getElementById('close-menu');
        const navDrawer = document.getElementById('nav-drawer');

        if (menuButton && closeMenu && navDrawer) {
            menuButton.addEventListener('click', () => {
                navDrawer.classList.remove('-translate-x-full');
            });

            closeMenu.addEventListener('click', () => {
                navDrawer.classList.add('-translate-x-full');
            });
        }
    </script>

    @stack("scripts")


</body>

</html>
