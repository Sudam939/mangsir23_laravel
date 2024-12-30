@props(['meta_words', 'meta_description', 'url'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">

    {{-- name->keywords/description content --}}
    <meta name="keywords" content="{{ $meta_words ?? ($seo->meta_keywords ?? '') }}">
    <meta name="description" content="{{ $meta_description ?? ($seo->meta_description ?? '') }}">

    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

    <meta property="og:title" content="Code IT | Learn coding in Nepal" />

    <meta property="og:url" content="{{$url ?? '/'}}" />
    <meta property="og:image" content="https://codeit.com.np/storage/01J34GAAFMVARXY8Y5YQPX6QWN.jpg" />
    <meta property="og:description"
        content="Join Code It, Nepal&#039;s leading computer institute offering affordable courses in Python, Laravel, React JS, web designing, digital marketing, and more. Learn from expert instructors and gain practical skills with lifetime support." />


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

    <header class="sticky top-0 z-10 bg-white">
        <div class="container flex items-center justify-between">
            <div>
                <img class="h-[50px] md:h-[70px] lg:h-[90px]" src="{{ asset($company->logo) }}" alt="Company Logo">
            </div>

            <div>
                <p>
                    {{ nepalidate(now()) }}
                </p>
                <img class="h-[10px] md:h-[15px] lg:h-[20px]" src="https://jawaaf.com/frontend/images/redline.png"
                    alt="Line">
            </div>
        </div>

        <x-frontend-navbar />
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer></footer>


</body>

</html>
