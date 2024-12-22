<x-frontend-layout>

    <section>
        <div class="container grid md:grid-cols-12 gap-5">

            <div class="md:col-span-8 space-y-4">

                <p>
                    प्रकाशित मितिः {{ nepalidate($news->created_at) }} | {{ $news->views }} पटक पढिएको
                </p>

                <h1 class="text-3xl font-semibold">
                    {{ $news->title }}
                </h1>
                <img src="{{ asset($news->image) }}" alt="{{ $news->title }}" class="w-full">
                <div class="descritpion">
                    {!! $news->description !!}
                </div>

                <div class="sharethis-inline-share-buttons"></div>
                <div class="sharethis-inline-reaction-buttons"></div>
            </div>


            <div class="md:col-span-4 space-y-4">
                @foreach ($advertises as $ad)
                    <div>
                        <a href="{{ $ad->redirect_url }}" target="_blank">
                            <img class="w-full" src="{{ asset($ad->banner) }}" alt="">
                        </a>
                    </div>

                    <div>
                        <a href="{{ $ad->redirect_url }}" target="_blank">
                            <img class="w-full" src="{{ asset($ad->banner) }}" alt="">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <script type="text/javascript"
        src="https://platform-api.sharethis.com/js/sharethis.js#property=676829033e41a900135ff2d7&product=inline-share-buttons&source=platform"
        async="async"></script>

        <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=67682c2727271500125f1862&product=inline-reaction-buttons&source=platform" async="async"></script>
</x-frontend-layout>
