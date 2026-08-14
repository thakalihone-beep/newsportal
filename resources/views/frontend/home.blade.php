<x-frontend-layout>

    {{-- Hero / Featured Section --}}
    <section class="bg-(--bg-light) py-8 md:py-12">

        <div class="container mx-auto px-4 space-y-4">

            <h1 class="text-2xl font-bold text-(--text-primary) md:text-3xl text-center">

                समाचार पोर्टलमा स्वागत छ!!

            </h1>

            <p class="mt-2 text-sm text-(--text-secondary) text-center">

                आजको नेपालका चर्चित विषयहरू।

            </p>

            @foreach ($latest_articles->take(3) as $article)

                <div class="card p-4 ">

                    <a href="{{route('article', $article->slug)}}">
                        <h1 class="text-2xl font-bold text-(--text-primary) md:text-3xl">

                        {{ $article->name }}

                    </h1>

                    <img src="{{ asset(Storage::url($article->image)) }}" alt="{{ $article->title }}"

                        class="mx-auto mt-4 h-95 w-full object-cover rounded-lg">
                    </a>

                </div>

            @endforeach

        </div>

    </section>

    {{-- Category Grid Section --}}
    <section class="bg-[#f4f3f8] py-10 md:py-14">
        @foreach ($categories->take(3) as $category)
            @if ($category->articles()->exists())
                <div class="container mx-auto mb-12 px-4 ">

                    {{-- Category Header --}}
                    <div class="mb-6 flex items-center justify-between">
                        <h2 class="border-l-4 border-purple-900 pl-3 text-2xl font-bold text-gray-900 md:text-3xl">
                            {{ $category->title }}
                        </h2>

                        <a href="#" class="hidden text-sm font-semibold text-gray-500 transition hover:text-purple-900 sm:block">
                            सबै हेर्नुहोस् →
                        </a>
                    </div>

                    {{-- Articles Grid --}}
                    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 space-y-4">
                        @foreach ($category->articles()->latest()->limit(6)->get() as $article)
                            <a href="{{route('article', $article->slug)}}" class="group flex overflow-hidden rounded-lg bg-white p-2 shadow-sm transition-shadow hover:shadow-md">

                                {{-- Image (Left) --}}
                                <a href="#" class="shrink-0 overflow-hidden rounded-md">
                                    <img src="{{ asset(Storage::url($article->image)) }}"
                                         alt="{{ $article->title }}"
                                         class="h-24 w-28 object-cover transition duration-300 group-hover:scale-105 sm:h-28 sm:w-32">
                                </a>

                                {{-- Content (Right) --}}
                                <div class="ml-3 flex flex-col justify-center">

                                    {{-- Title --}}
                                    <a href="#">
                                        <h3 class="line-clamp-2 text-base font-bold leading-snug text-gray-900 transition duration-200 group-hover:text-purple-900">
                                            {{ $article->name }}
                                        </h3>
                                    </a>

                                    {{-- Description --}}
                                    <p class="mt-1 line-clamp-2 text-xs leading-relaxed text-gray-500">
                                        {{ $article->description }}
                                    </p>

                                </div>

                            </a>
                        @endforeach
                    </div>

                </div>
            @endif
        @endforeach
    </section>

    {{-- Latest News Section --}}
    <section class="py-10 md:py-14">
        <div class="container mx-auto px-4">

            <!-- Section Header -->
            <div class="mb-8 flex items-end justify-between border-b border-(--border) pb-4">
                <div>
                    <span class="mb-2 inline-block text-sm font-bold uppercase tracking-wider text-(--secondary)">
                        ताजा समाचार
                    </span>

                    <h2 class="text-2xl font-bold text-(--text-primary) md:text-3xl">
                        पछिल्ला समाचार
                    </h2>
                </div>

                <a href="/categories"
                    class="hidden text-sm font-semibold text-(--secondary) transition hover:text-(--link-hover) sm:block">
                    सबै समाचार →
                </a>
            </div>

            <!-- News Grid -->
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">

                @foreach ($latest_articles as $article)
                    <!-- News Card -->
                    <article class="group overflow-hidden rounded-xl border border-(--border) bg-(--bg-white) shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">

                        <!-- Image -->
                        <a href="#" class="relative block overflow-hidden">
                            <img src="{{ asset(Storage::url($article->image)) }}" alt="{{ $article->title }}"
                                class="h-56 w-full object-cover transition duration-500 group-hover:scale-105">

                            <!-- Category (Fixed property call to ->name) -->
                            <span class="absolute left-4 top-4 rounded-full bg-(--accent) px-3 py-1 text-xs font-bold text-white shadow">
                                {{ $article->categories->first()?->name ?? 'अन्य' }}
                            </span>
                        </a>

                        <!-- Content -->
                        <div class="p-5">

                            <!-- Meta -->
                            <div class="mb-3 flex items-center gap-3 text-xs text-(--text-muted)">
                                <span class="flex items-center gap-1">
                                    <i class="fa-regular fa-clock"></i>
                                    {{ $article->created_at?->diffForHumans() }}
                                </span>

                                <span class="h-1 w-1 rounded-full bg-(--text-muted)"></span>

                                <span>
                                    {{ $article->location }}
                                </span>
                            </div>

                            <!-- Title -->
                            <h3 class="text-xl font-bold leading-snug text-(--text-primary) transition group-hover:text-(--secondary)">
                                <a href="#">
                                    {{ $article->title }}
                                </a>
                            </h3>

                            <!-- Description -->
                            <p class="mt-3 line-clamp-2 text-sm leading-6 text-(--text-secondary)">
                                {{ $article->description }}
                            </p>

                            <!-- Read More -->
                            <a href="#" class="mt-4 inline-flex items-center gap-2 text-sm font-bold text-(--secondary) transition hover:gap-3">
                                पूरा पढ्नुहोस्
                                <i class="fa-solid fa-arrow-right text-xs"></i>
                            </a>

                        </div>

                    </article>
                @endforeach

            </div>

            <!-- Mobile View All -->
            <div class="mt-8 text-center sm:hidden">
                <a href="/categories"
                    class="inline-flex items-center gap-2 rounded-lg bg-(--primary) px-5 py-3 text-sm font-semibold text-white transition hover:bg-(--secondary)">
                    सबै समाचार
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

        </div>
    </section>

</x-frontend-layout>
