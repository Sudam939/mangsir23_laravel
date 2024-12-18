<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .container {
            width: 86%;
            margin: auto;
        }
    </style>
</head>

<body>


    <header>
        <div class="container flex items-center justify-between">
            <div>
                <img class="h-[100px]" src="https://jawaaf.com/storage/01JF6CJYGS53X1S7DZ5XKFC705.png" alt="Company Logo">
            </div>

            <div>
                {{ nepalidate(now()) }}
                <img class="h-[20px]" src="https://jawaaf.com/frontend/images/redline.png" alt="Line">
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
