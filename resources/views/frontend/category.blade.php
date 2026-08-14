<x-frontend-layout>

    <section class="bg-(--bg-light) py-8 md:py-12">

        <div class="container mx-auto px-4">

            {{-- Category Navigation --}}
            <div class="mb-8 overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

                <div class="flex flex-col gap-4 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">

                    {{-- Category Title --}}
                    <div class="flex items-center gap-3">
                        <span class="h-8 w-1 rounded-full bg-(--secondary)"></span>

                        <div>
                            <p class="text-xs font-semibold uppercase tracking-widest text-gray-400">
                                Category
                            </p>

                            <h1 class="text-2xl font-extrabold text-gray-900">
                                {{ $category->title }}
                            </h1>
                        </div>
                    </div>

                    {{-- Category Navigation --}}
                    <nav class="flex flex-wrap items-center gap-2">

                        <a href="#"
                            class="rounded-full bg-(--bg-secondary) px-4 py-2 text-sm font-semibold text-gray-900 transition hover:bg-(--secondary) hover:text-white">
                            सबै
                        </a>

                        <a href="#"
                            class="rounded-full px-4 py-2 text-sm font-medium text-gray-600 transition hover:bg-gray-100 hover:text-gray-900">
                            नयाँ
                        </a>

                        <a href="#"
                            class="rounded-full px-4 py-2 text-sm font-medium text-gray-600 transition hover:bg-gray-100 hover:text-gray-900">
                            चर्चित
                        </a>

                        <a href="#"
                            class="rounded-full px-4 py-2 text-sm font-medium text-gray-600 transition hover:bg-gray-100 hover:text-gray-900">
                            लोकप्रिय
                        </a>

                    </nav>

                </div>

                {{-- Bottom Accent --}}
                <div class="h-1 bg-(--secondary)"></div>

            </div>


            {{-- Main Content --}}
            <div class="grid gap-8 md:grid-cols-3">

                {{-- Articles --}}
                <div class="space-y-5 md:col-span-2">

                    @foreach ($category->articles()->latest()->get() as $article)

                        <a href="{{route('article',$article->slug)}}"
                            class="group flex overflow-hidden rounded-xl border border-gray-100 bg-white p-3 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:shadow-lg">

                            {{-- Image --}}
                            <a href="#" class="shrink-0 overflow-hidden rounded-lg">

                                <img
                                    src="{{ asset(Storage::url($article->image)) }}"
                                    alt="{{ $article->title }}"
                                    class="h-28 w-36 object-cover transition duration-500 group-hover:scale-105 sm:h-32 sm:w-44">

                            </a>


                            {{-- Content --}}
                            <div class="ml-4 flex min-w-0 flex-1 flex-col justify-center">

                                {{-- Date / Category --}}
                                <div class="mb-1 flex items-center gap-2 text-xs text-gray-400">

                                    <span>
                                        {{ $category->title }}
                                    </span>

                                    <span>•</span>

                                    <span>
                                        {{ $article->created_at->format('M d, Y') }}
                                    </span>

                                </div>


                                {{-- Title --}}
                                <a href="#">

                                    <h3
                                        class="line-clamp-2 text-lg font-bold leading-snug text-gray-900 transition duration-200 group-hover:text-(--secondary)">

                                        {{ $article->name }}

                                    </h3>

                                </a>


                                {{-- Description --}}
                                <p class="mt-1 line-clamp-2 text-sm leading-relaxed text-gray-500">

                                    {{ $article->description }}

                                </p>

                            </div>

                        </a>

                    @endforeach

                </div>


                {{-- Advertisement --}}
                <aside class="space-y-5">

                    @foreach ($advertise->take(1) as $ad)

                        <a
                            href="{{ $ad->redirect_link }}"
                            target="_blank"
                            class="group block overflow-hidden rounded-xl bg-white shadow-sm">

                            <img
                                src="{{ asset(Storage::url($ad->banner)) }}"
                                alt="{{ $ad->company_name }}"
                                class="w-full object-cover transition duration-300 group-hover:scale-[1.02]">

                        </a>

                    @endforeach

                </aside>

            </div>

        </div>

    </section>

</x-frontend-layout>
