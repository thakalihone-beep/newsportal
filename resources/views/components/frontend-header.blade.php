<header class="bg-white border-b border-[var(--border)] shadow-sm">

    <!-- ================= TOP HEADER ================= -->
    <div class="container mx-auto px-4">

        <div class="flex items-center justify-between py-2 md:py-3">

            <!-- Logo -->
            <a href="/" class="flex items-center group">
                <img src="{{ asset('frontend/images/logo.png') }}" alt="NewsHub Logo"
                    class="h-12 sm:h-16 md:h-20 w-auto transition-transform duration-200 group-hover:scale-[1.02]">
            </a>

            <!-- Date / Tagline -->
            <div class="hidden sm:flex flex-col items-end text-right">

                <span id="date" class="text-sm md:text-base lg:text-lg font-bold text-[var(--text-primary)]">
                    बुधबार, २७ साउन २०८३
                </span>

                <span class="mt-1 h-[2px] w-28 md:w-44 bg-[var(--secondary)]"></span>

                <span class="mt-1 text-xs md:text-sm text-[var(--text-muted)]">
                    तपाईंको दैनिक समाचार स्रोत
                </span>

            </div>

        </div>

    </div>


</header>

<!-- ================= NAVIGATION ================= -->
<nav class="sticky top-0 z-50 bg-[var(--primary)] shadow-md">

        <!-- ================= DESKTOP NAV ================= -->
        <div class="container mx-auto px-4 hidden md:flex items-center justify-between gap-4">

            <!-- Navigation Links -->
            <ul class="flex items-center gap-1 overflow-x-auto whitespace-nowrap">

                @foreach ($categories as $category)
                    <li>
                        <a href="/categories/{{ $category->id }}"
                            class="flex items-center gap-2 px-4 py-3 text-sm font-semibold text-white transition hover:bg-white/10 hover:text-blue-400">
                            {{ $category->title }}
                        </a>
                    </li>
                @endforeach

            </ul>


            <!-- Desktop Search -->
            <form action="/search" method="GET" class="relative w-48 lg:w-64 shrink-0">

                <input type="text" name="q" placeholder="Search news..."
                    class="w-full rounded-full bg-white/10 border border-white/20 py-2 pl-4 pr-10 text-sm text-white placeholder:text-slate-300 focus:border-[var(--secondary)] focus:outline-none focus:ring-2 focus:ring-[var(--secondary)]">

                <button type="submit"
                    class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-300 transition hover:text-white">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>

            </form>

        </div>


        <!-- ================= MOBILE NAV ================= -->
        <div class="md:hidden">

            <div class="container mx-auto px-4">

                <div class="flex items-center justify-between py-2">

                    <!-- Mobile brand -->
                    <span class="text-lg font-bold text-white">
                        NewsHub
                    </span>

                    <!-- Menu button -->

                    <button id="menu-button" type="button"
                        class="flex h-10 w-10 items-center justify-center rounded-lg text-white hover:bg-white/10">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>

                </div>

            </div>

        </div>

</nav>


<!-- ================= MOBILE DRAWER ================= -->

<div id="nav-drawer"
    class="fixed top-0 left-0 z-[60] h-screen w-full sm:w-80 -translate-x-full overflow-y-auto bg-white border-r border-[var(--border)] shadow-xl transition-transform"
    tabindex="-1" aria-labelledby="drawer-label">

    <!-- Drawer Header -->
    <div class="flex items-center justify-between border-b border-[var(--border)] px-5 py-4">

        <div class="flex items-center gap-2">

            <i class="fa-solid fa-newspaper text-[var(--secondary)] text-xl"></i>

            <h5 id="drawer-label" class="text-lg font-bold text-[var(--primary)]">
                NewsHub
            </h5>

        </div>


        <!-- Close -->
        <button id="close-menu" type="button"
            class="flex h-9 w-9 items-center justify-center rounded-lg text-[var(--text-muted)] transition hover:bg-[var(--bg-secondary)] hover:text-[var(--primary)]">
            <i class="fa-solid fa-xmark text-lg"></i>

            <span class="sr-only">
                Close menu
            </span>
        </button>

    </div>


    <!-- Mobile Links -->
    <ul class="flex flex-col gap-1 p-4">

        <li>
            <a href="/"
                class="flex items-center gap-3 rounded-lg px-4 py-3 font-semibold text-[var(--text-primary)] transition hover:bg-[var(--bg-secondary)] hover:text-[var(--secondary)]">
                <i class="fa-solid fa-house w-5"></i>
                Home
            </a>
        </li>


        <li>
            <a href="/categories"
                class="flex items-center gap-3 rounded-lg px-4 py-3 font-semibold text-[var(--text-primary)] transition hover:bg-[var(--bg-secondary)] hover:text-[var(--secondary)]">
                <i class="fa-solid fa-layer-group w-5"></i>
                Categories
            </a>
        </li>


        <li>
            <a href="/about"
                class="flex items-center gap-3 rounded-lg px-4 py-3 font-semibold text-[var(--text-primary)] transition hover:bg-[var(--bg-secondary)] hover:text-[var(--secondary)]">
                <i class="fa-solid fa-circle-info w-5"></i>
                About
            </a>
        </li>


        <li>
            <a href="/contact"
                class="flex items-center gap-3 rounded-lg px-4 py-3 font-semibold text-[var(--text-primary)] transition hover:bg-[var(--bg-secondary)] hover:text-[var(--secondary)]">
                <i class="fa-solid fa-envelope w-5"></i>
                Contact
            </a>
        </li>

    </ul>


    <!-- Mobile Search -->
    <div class="border-t border-[var(--border)] p-4">

        <form action="/search" method="GET" class="relative">

            <input type="text" name="q" placeholder="Search news..."
                class="w-full rounded-lg border border-[var(--border)] bg-[var(--bg-light)] py-3 pl-4 pr-10 text-sm text-[var(--text-primary)] placeholder:text-[var(--text-muted)] focus:border-[var(--secondary)] focus:outline-none focus:ring-2 focus:ring-[var(--secondary)]">

            <button type="submit"
                class="absolute right-3 top-1/2 -translate-y-1/2 text-[var(--text-muted)] hover:text-[var(--secondary)]">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>

        </form>

    </div>

</div>
