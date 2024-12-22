<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/css/app.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="/frontend/style.css">

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
