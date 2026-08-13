<x-frontend-layout>

    <section class="bg-[var(--bg-light)] py-8 md:py-12">

        <div class="container mx-auto px-4">

            <!-- Section Header -->
            <div class="mb-8 flex items-end justify-between border-b border-[var(--border)] pb-4">

                <div>
                    <span class="mb-2 inline-block text-sm font-bold uppercase tracking-wider text-[var(--secondary)]">
                        ताजा समाचार
                    </span>

                    <h2 class="text-2xl font-bold text-[var(--text-primary)] md:text-3xl">
                        पछिल्ला समाचार
                    </h2>
                </div>

                <a
                    href="/categories"
                    class="hidden text-sm font-semibold text-[var(--secondary)] transition hover:text-[var(--link-hover)] sm:block"
                >
                    सबै समाचार →
                </a>

            </div>


            <!-- News Grid -->
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">

                @foreach ($latest_articles as $article)

                    <!-- News Card -->
                    <article
                        class="group overflow-hidden rounded-xl border border-[var(--border)] bg-[var(--bg-white)] shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg"
                    >

                        <!-- Image -->
                        <a href="#" class="relative block overflow-hidden">

                            <img
                                src="{{ asset(Storage::url($article->image)) }}"
                                alt="{{ $article->title }}"
                                class="h-56 w-full object-cover transition duration-500 group-hover:scale-105"
                            >

                            <!-- Category -->
                            <span
                                class="absolute left-4 top-4 rounded-full bg-[var(--accent)] px-3 py-1 text-xs font-bold text-white shadow"
                            >
                                {{ $article->categories->first()?->title ?? 'अन्य' }}
                            </span>

                        </a>


                        <!-- Content -->
                        <div class="p-5">

                            <!-- Meta -->
                            <div class="mb-3 flex items-center gap-3 text-xs text-[var(--text-muted)]">

                                <span class="flex items-center gap-1">
                                    <i class="fa-regular fa-clock"></i>

                                    {{ $article->created_at->diffForHumans() }}
                                </span>

                                <span class="h-1 w-1 rounded-full bg-[var(--text-muted)]"></span>

                                <span>
                                    {{ $article->location }}
                                </span>

                            </div>


                            <!-- Title -->
                            <h3
                                class="text-xl font-bold leading-snug text-[var(--text-primary)] transition group-hover:text-[var(--secondary)]"
                            >
                                <a href="#">
                                    {{ $article->title }}
                                </a>
                            </h3>


                            <!-- Description -->
                            <p class="mt-3 line-clamp-2 text-sm leading-6 text-[var(--text-secondary)]">
                                {{ $article->description }}
                            </p>


                            <!-- Read More -->
                            <a
                                href="#"
                                class="mt-4 inline-flex items-center gap-2 text-sm font-bold text-[var(--secondary)] transition hover:gap-3"
                            >
                                पूरा पढ्नुहोस्

                                <i class="fa-solid fa-arrow-right text-xs"></i>
                            </a>

                        </div>

                    </article>

                @endforeach

            </div>


            <!-- Mobile View All -->
            <div class="mt-8 text-center sm:hidden">

                <a
                    href="/categories"
                    class="inline-flex items-center gap-2 rounded-lg bg-[var(--primary)] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[var(--secondary)]"
                >
                    सबै समाचार

                    <i class="fa-solid fa-arrow-right"></i>
                </a>

            </div>

        </div>

    </section>

</x-frontend-layout>
