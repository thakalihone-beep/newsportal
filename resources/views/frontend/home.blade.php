<x-frontend-layout>

    {{-- Hero / Featured Section --}}
    <section class="bg-[var(--bg-light)] py-8 md:py-12">

        <div class="container mx-auto space-y-4 px-4">

            <h1 class="text-center text-2xl font-bold text-[var(--text-primary)] md:text-3xl">
                समाचार पोर्टलमा स्वागत छ!!
            </h1>

            <p class="mt-2 text-center text-sm text-[var(--text-secondary)]">
                आजको नेपालका चर्चित विषयहरू।
            </p>


            @foreach ($latest_articles->take(3) as $article)

                <div class="card p-4">

                    <a href="{{ route('article', $article->slug) }}">

                        <h2 class="text-2xl font-bold text-[var(--text-primary)] md:text-3xl">
                            {{ $article->name }}
                        </h2>

                        <img
                            src="{{ asset('storage/'.$article->image) }}"
                            alt="{{ $article->name }}"
                            class="mx-auto mt-4 h-95 w-full rounded-lg object-cover"
                        >

                    </a>

                </div>

            @endforeach

        </div>


        {{-- ================= CATEGORY GRID SECTION ================= --}}
        <section class="bg-[#f4f3f8] py-10 md:py-14">

            <div class="container mx-auto px-4">

                {{-- Section Heading --}}
                <div class="mb-10 text-center">

                    <h2
                        class="mx-auto max-w-4xl text-2xl font-extrabold leading-tight tracking-tight text-purple-900 md:text-4xl">

                        नेपाल तथा विश्वभरका पछिल्ला समाचार, घटना र महत्वपूर्ण अपडेटहरू

                        <span class="text-gray-900">
                            एकै ठाउँमा पढ्नुहोस्।
                        </span>

                    </h2>

                    <div class="mx-auto mt-5 flex items-center justify-center gap-1">

                        <span class="h-1 w-12 rounded-full bg-purple-900"></span>
                        <span class="h-1 w-3 rounded-full bg-purple-900"></span>
                        <span class="h-1 w-1 rounded-full bg-purple-900"></span>

                    </div>

                </div>


                {{-- Categories --}}
                @foreach ($categories->take(3) as $category)

                    @if ($category->articles()->exists())

                        <div class="mb-12">

                            {{-- Category Header --}}
                            <div class="mb-6 flex items-center justify-between border-b border-gray-200 pb-3">

                                <div class="flex items-center">

                                    <span class="mr-3 h-7 w-1 rounded-full bg-purple-900"></span>

                                    <h3 class="text-2xl font-bold text-gray-900 md:text-3xl">
                                        {{ $category->title }}
                                    </h3>

                                </div>

                                <a
                                    href="#"
                                    class="hidden text-sm font-semibold text-gray-500 transition hover:text-purple-900 sm:block">

                                    सबै हेर्नुहोस् →

                                </a>

                            </div>


                            {{-- Articles Grid --}}
                            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

                                @foreach ($category->articles()->latest()->limit(6)->get() as $article)

                                    <article
                                        class="group overflow-hidden rounded-lg bg-white p-2 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:shadow-md">

                                        <a
                                            href="{{ route('article', $article->slug) }}"
                                            class="flex">

                                            {{-- Image --}}
                                            <div class="shrink-0 overflow-hidden rounded-md">

                                                <img
                                                    src="{{ asset('storage/'.$article->image) }}"
                                                    alt="{{ $article->name }}"
                                                    class="h-24 w-28 object-cover transition duration-300 group-hover:scale-105 sm:h-28 sm:w-32"
                                                >

                                            </div>


                                            {{-- Content --}}
                                            <div class="ml-3 flex min-w-0 flex-col justify-center">

                                                <h4
                                                    class="line-clamp-2 text-base font-bold leading-snug text-gray-900 transition duration-200 group-hover:text-purple-900">

                                                    {{ $article->name }}

                                                </h4>

                                                {{-- Clean Description --}}
                                                <p class="mt-1 line-clamp-2 text-xs leading-relaxed text-gray-500">

                                                    {{ Str::limit(strip_tags(html_entity_decode($article->description)), 150) }}

                                                </p>

                                            </div>

                                        </a>

                                    </article>

                                @endforeach

                            </div>

                        </div>

                    @endif

                @endforeach

            </div>

        </section>


        {{-- ================= LATEST NEWS SECTION ================= --}}
        <section class="py-10 md:py-14">

            <div class="container mx-auto px-4">

                {{-- Section Header --}}
                <div class="mb-8 flex items-end justify-between border-b border-[var(--border)] pb-4">

                    <div>

                        <span
                            class="mb-2 inline-block text-sm font-bold uppercase tracking-wider text-[var(--secondary)]">

                            ताजा समाचार

                        </span>

                        <h2 class="text-2xl font-bold text-[var(--text-primary)] md:text-3xl">

                            पछिल्ला समाचार

                        </h2>

                    </div>


                    <a
                        href="/categories"
                        class="hidden text-sm font-semibold text-[var(--secondary)] transition hover:text-[var(--link-hover)] sm:block">

                        सबै समाचार →

                    </a>

                </div>


                {{-- News Grid --}}
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">

                    @foreach ($latest_articles as $article)

                        {{-- News Card --}}
                        <article
                            class="group overflow-hidden rounded-xl border border-[var(--border)] bg-[var(--bg-white)] shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">


                            {{-- Image --}}
                            <a
                                href="{{ route('article', $article->slug) }}"
                                class="relative block overflow-hidden">

                                <img
                                    src="{{ asset('storage/'.$article->image) }}"
                                    alt="{{ $article->name }}"
                                    class="h-56 w-full object-cover transition duration-500 group-hover:scale-105"
                                >


                                {{-- Category --}}
                                <span
                                    class="absolute left-4 top-4 rounded-full bg-[var(--accent)] px-3 py-1 text-xs font-bold text-white shadow">

                                    {{ $article->categories->first()?->title ?? 'अन्य' }}

                                </span>

                            </a>


                            {{-- Content --}}
                            <div class="p-5">

                                {{-- Meta --}}
                                <div
                                    class="mb-3 flex items-center gap-3 text-xs text-[var(--text-muted)]">

                                    <span class="flex items-center gap-1">

                                        <i class="fa-regular fa-clock"></i>

                                        {{ $article->created_at?->diffForHumans() }}

                                    </span>

                                    <span class="h-1 w-1 rounded-full bg-[var(--text-muted)]"></span>

                                    <span>
                                        {{ $article->location }}
                                    </span>

                                </div>


                                {{-- Title --}}
                                <h3
                                    class="text-xl font-bold leading-snug text-[var(--text-primary)] transition group-hover:text-[var(--secondary)]">

                                    <a href="{{ route('article', $article->slug) }}">

                                        {{ $article->name }}

                                    </a>

                                </h3>


                                {{-- Description --}}
                                <p
                                    class="mt-3 line-clamp-2 text-sm leading-6 text-[var(--text-secondary)]">

                                    {{ Str::limit(strip_tags(html_entity_decode($article->description)), 150) }}

                                </p>


                                {{-- Read More --}}
                                <a
                                    href="{{ route('article', $article->slug) }}"
                                    class="mt-4 inline-flex items-center gap-2 text-sm font-bold text-[var(--secondary)] transition hover:gap-3">

                                    पूरा पढ्नुहोस्

                                    <i class="fa-solid fa-arrow-right text-xs"></i>

                                </a>

                            </div>

                        </article>

                    @endforeach

                </div>


                {{-- Mobile View All --}}
                <div class="mt-8 text-center sm:hidden">

                    <a
                        href="/categories"
                        class="inline-flex items-center gap-2 rounded-lg bg-[var(--primary)] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[var(--secondary)]">

                        सबै समाचार

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </div>

            </div>

        </section>

    </section>

</x-frontend-layout>
