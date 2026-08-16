<x-frontend-layout title="{{ $article->meta_title}}"  meta_description="{{ $article->meta_description }}" meta_keyword="{{ $article->meta_keywords }}" imaga="{{ asset(Stroage::url($article->image))}}">

    <section class="bg-[var(--bg-light)] py-8 md:py-12">

        <div class="container mx-auto px-4">

            {{-- ================= ARTICLE ================= --}}
            <div class="grid gap-8 lg:grid-cols-3">

                {{-- ================= MAIN ARTICLE ================= --}}
                <main class="lg:col-span-2">

                    <article class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

                        {{-- Article Header --}}
                        <header class="px-5 pt-6 sm:px-8 sm:pt-8">

                            {{-- Category --}}
                            <div class="mb-4 flex flex-wrap items-center gap-2">

                                <span class="h-1 w-8 rounded-full bg-[var(--secondary)]"></span>

                                @foreach ($article->categories as $category)

                                    <span class="text-sm font-bold uppercase tracking-wider text-[var(--secondary)]">
                                        {{ $category->title }}
                                    </span>

                                @endforeach

                            </div>


                            {{-- Title --}}
                            <h1
                                class="text-3xl font-extrabold leading-tight tracking-tight text-gray-900 md:text-4xl lg:text-5xl">

                                {{ $article->name }}

                            </h1>


                            {{-- Published Date --}}
                            <div
                                class="mt-5 flex items-center gap-2 border-b border-gray-100 pb-5 text-sm text-gray-500">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="h-4 w-4">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M6.75 3v2.25M17.25 3v2.25M3.75 8.25h16.5M5.25 5.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25A2.25 2.25 0 0 1 18.75 21H5.25A2.25 2.25 0 0 1 3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25Z" />

                                </svg>

                                <span>
                                    प्रकाशित मितिः
                                </span>

                                <strong id="c_date" class="font-semibold text-gray-700">
                                    Loading...
                                </strong>

                            </div>

                        </header>


                        {{-- Featured Image --}}
                        <div class="px-5 pt-5 sm:px-8">

                            <div class="overflow-hidden rounded-xl">

                                <img
                                    src="{{ asset('storage/'.$article->image) }}"
                                    alt="{{ $article->name }}"
                                    class="h-auto max-h-[600px] w-full object-cover">

                            </div>

                        </div>


                        {{-- ================= ARTICLE CONTENT ================= --}}
                        <div class="px-5 py-6 sm:px-8 sm:py-8">

                            <div class="prose prose-lg max-w-none text-gray-700">

                                {!! $article->description !!}

                            </div>

                        </div>


                        {{-- Bottom Accent --}}
                        <div class="h-1 bg-[var(--secondary)]"></div>

                    </article>

                </main>


                {{-- ================= SIDEBAR ================= --}}
                <aside class="space-y-6">

                    {{-- ================= ADVERTISEMENT ================= --}}
                    @foreach ($advertise->take(1) as $ad)

                        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

                            <div class="border-b border-gray-100 px-4 py-3">

                                <p class="text-center text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400">
                                    Advertisement
                                </p>

                            </div>

                            <a
                                href="{{ $ad->redirect_link }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="group block overflow-hidden">

                                <img
                                    src="{{ asset('storage/'.$ad->banner) }}"
                                    alt="{{ $ad->company_name }}"
                                    class="w-full object-cover transition duration-500 group-hover:scale-[1.02]">

                            </a>

                        </div>

                    @endforeach


                    {{-- ================= RELATED ARTICLES ================= --}}
                    <div class="rounded-xl border border-gray-200 bg-white p-4 shadow-sm">

                        <div class="mb-4 flex items-center gap-3 border-b border-gray-100 pb-3">

                            <span class="h-6 w-1 rounded-full bg-[var(--secondary)]"></span>

                            <h2 class="text-lg font-bold text-gray-900">
                                सम्बन्धित समाचार
                            </h2>

                        </div>


                        <div class="space-y-4">

                            @foreach ($article->categories as $category)

                                @foreach ($category->articles()
                                    ->where('articles.id', '!=', $article->id)
                                    ->latest()
                                    ->limit(4)
                                    ->get() as $relatedArticle)

                                    <a
                                        href="{{ route('article', $relatedArticle->slug) }}"
                                        class="group flex gap-3 border-b border-gray-100 pb-4 last:border-0 last:pb-0">

                                        {{-- Image --}}
                                        <div class="shrink-0 overflow-hidden rounded-lg">

                                            <img
                                                src="{{ asset('storage/'.$relatedArticle->image) }}"
                                                alt="{{ $relatedArticle->name }}"
                                                class="h-20 w-24 object-cover transition duration-300 group-hover:scale-105">

                                        </div>


                                        {{-- Content --}}
                                        <div class="min-w-0">

                                            <h3
                                                class="line-clamp-3 text-sm font-bold leading-snug text-gray-800 transition group-hover:text-[var(--secondary)]">

                                                {{ $relatedArticle->name }}

                                            </h3>

                                            {{-- Related Article Date --}}
                                            <p
                                                class="mt-1 text-xs text-gray-400"
                                                data-nepali-date="{{ $relatedArticle->created_at->format('Y-m-d') }}">

                                                {{ $relatedArticle->created_at->format('M d, Y') }}

                                            </p>

                                        </div>

                                    </a>

                                @endforeach

                            @endforeach

                        </div>

                    </div>

                </aside>

            </div>

        </div>

    </section>


    {{-- ================= NEPALI DATE ================= --}}
   @push('scripts')

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            /*
             * Main article date
             */
            const cDate = document.getElementById('c_date');

            if (cDate && window.NepaliCalendar) {

                const adDateString = @json(
                    $article->created_at->format('Y-m-d')
                );

                const adDate = new Date(adDateString);

                const bsDate = NepaliCalendar.adToBs(adDate);

                const nepaliDate = NepaliCalendar.formatBs(bsDate, 'ne');

                cDate.textContent = nepaliDate;
            }


            /*
             * Related article dates
             */
            if (window.NepaliCalendar) {

                document
                    .querySelectorAll('[data-nepali-date]')
                    .forEach(function (element) {

                        const adDateString = element.dataset.nepaliDate;

                        const adDate = new Date(adDateString);

                        const bsDate = NepaliCalendar.adToBs(adDate);

                        const nepaliDate = NepaliCalendar.formatBs(bsDate, 'ne');

                        element.textContent = nepaliDate;

                    });

            }

        });

    </script>

   @endpush

</x-frontend-layout>
