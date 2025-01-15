@props(['post'])

<div class="grid grid-cols-12 gap-2 items-center rounded-lg overflow-hidden hover:shadow-lg duration-500">
    <div class="col-span-5">
        <a href="{{ route('news', $post->id) }}">
            <img class="w-full h-[100px] object-cover" src="{{ asset($post->image) }}" alt="{{ $post->title }}">
        </a>
    </div>

    <div class="col-span-7">
        <h1 class="font-bold">{{ $post->title }}</h1>
        <small>{{ nepalidate($post->created_at) }}</small>
        {{$post->created_at->format('Y,M-d|H:i')}}
        {{$post->created_at->diffForHumans()}}
    </div>
</div>
