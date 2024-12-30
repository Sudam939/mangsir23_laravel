<x-frontend-layout :url="route('category', $category->slug)">

    <section>
        <div class="container grid md:grid-cols-12 gap-5">

            <div class="md:col-span-8 space-y-4">
                @foreach ($posts as $post)
                    <div class="grid grid-cols-12 gap-5 items-center hover:shadow-lg border rounded-lg">
                        <div class="col-span-5">
                            <img src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                        </div>
                        <div class="col-span-7">
                            <h1 class="text-xl md:text-2xllg:text-3xl font-semibold">{{ $post->title }}</h1>
                            <div class="h-20 overflow-hidden">
                                {!! $post->description !!}
                            </div>
                            <small> प्रकाशित मितिः ५ पुष २०८१, शुक्रवार | 540 पटक पढिएको</small>
                        </div>
                    </div>
                @endforeach

                {{$posts->links()}}
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

</x-frontend-layout>
