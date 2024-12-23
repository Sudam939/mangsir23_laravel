<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{asset('frontend/style.css')}}">

    <style>
        .descritpion figure,
        .descritpion img {
            width: 100% !important;
            display: none !important;
        }

        @media (min-width: 768px) {

            .descritpion figure,
            .descritpion img {
                width: 100% !important;
                display: block !important;
            }
        }
    </style>
</head>

<body>
    <section>
        <div class="container">

            <div class=" space-y-4">

                <p>
                    प्रकाशित मितिः {{ nepalidate($post->created_at) }} | {{ $post->views }} पटक पढिएको
                </p>

                <h1 class="text-3xl font-semibold">
                    {{ $post->title }}
                </h1>
                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="w-full">
                <div class="descritpion">
                    {{-- {!! $post->description !!} --}}
                </div>
            </div>
        </div>
    </section>

</body>

</html>
