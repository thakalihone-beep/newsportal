<x-frontend-layout>

    <section class="bg-[var(--bg-light)] py-8 md:py-12">

        <div class="container mx-auto px-4">

            {{-- ================= CATEGORY HEADER ================= --}}
            <div class="mb-8">

                <div
                    class="flex flex-col gap-4 border-b-2 border-[var(--secondary)] pb-3 sm:flex-row sm:items-end sm:justify-between">

                    {{-- Category Title --}}
                    <div class="flex items-center gap-3">

                        <span class="h-10 w-1 rounded-full bg-[var(--secondary)]"></span>

                        <div>

                            <span class="text-xs font-semibold uppercase tracking-[0.2em] text-gray-400">
                                Category
                            </span>

                            <h1 class="mt-1 text-2xl font-extrabold leading-none text-gray-900 md:text-3xl">
                                {{ $category->title }}
                            </h1>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ================= MAIN GRID ================= --}}
            <div class="grid gap-8 lg:grid-cols-3">


                {{-- ================= ARTICLES ================= --}}
                <div class="space-y-4 lg:col-span-2">

                    @forelse ($category->articles()->latest()->get() as $article)

                        <article
                            class="group overflow-hidden rounded-xl border border-gray-200 bg-white p-3 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:shadow-md">

                            <a
                                href="{{ route('article', $article->slug) }}"
                                class="flex gap-4">

                                {{-- Image --}}
                                <div class="shrink-0 overflow-hidden rounded-lg">

                                    <img
                                        src="{{ asset(Storage::url($article->image)) }}"
                                        alt="{{ $article->name }}"
                                        class="h-28 w-36 object-cover transition duration-500 group-hover:scale-105 sm:h-32 sm:w-44">

                                </div>


                                {{-- Content --}}
                                <div class="flex min-w-0 flex-1 flex-col justify-center">

                                    {{-- Meta --}}
                                    <div
                                        class="mb-1.5 flex flex-wrap items-center gap-2 text-xs text-gray-400">

                                        <span class="font-medium text-[var(--secondary)]">
                                            {{ $category->title }}
                                        </span>

                                        <span>•</span>

                                        <time datetime="{{ $article->created_at->toISOString() }}">
                                            {{ $article->created_at->format('M d, Y') }}
                                        </time>

                                    </div>


                                    {{-- Title --}}
                                    <h2
                                        class="line-clamp-2 text-base font-bold leading-snug text-gray-900 transition duration-200 group-hover:text-[var(--secondary)] sm:text-lg">

                                        {{ $article->name }}

                                    </h2>


                                    {{-- Description --}}
                                    <p
                                        class="mt-1.5 line-clamp-2 text-xs leading-relaxed text-gray-500 sm:text-sm">

                                        {{ Str::limit(strip_tags(html_entity_decode($article->description)), 150) }}

                                    </p>

                                </div>

                            </a>

                        </article>

                    @empty

                        <div
                            class="rounded-xl border border-dashed border-gray-300 bg-white px-6 py-12 text-center">

                            <h2 class="text-lg font-semibold text-gray-700">
                                कुनै समाचार भेटिएन
                            </h2>

                            <p class="mt-1 text-sm text-gray-500">
                                यस श्रेणीमा हाल कुनै समाचार उपलब्ध छैन।
                            </p>

                        </div>

                    @endforelse

                </div>


                {{-- ================= ADVERTISEMENT ================= --}}
                <aside class="lg:sticky lg:top-6 lg:self-start">

                    @foreach ($advertise->take(1) as $ad)

                        <div
                            class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

                            <div class="border-b border-gray-100 px-4 py-2">

                                <p
                                    class="text-center text-[10px] font-semibold uppercase tracking-[0.2em] text-gray-400">

                                    Advertisement

                                </p>

                            </div>

                            <a
                                href="{{ $ad->redirect_link }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="group block overflow-hidden">

                                <img
                                    src="{{ asset(Storage::url($ad->banner)) }}"
                                    alt="{{ $ad->company_name }}"
                                    class="h-auto w-full object-cover transition duration-500 group-hover:scale-[1.02]">

                            </a>

                        </div>

                    @endforeach

                </aside>

            </div>

        </div>

    </section>

</x-frontend-layout>
