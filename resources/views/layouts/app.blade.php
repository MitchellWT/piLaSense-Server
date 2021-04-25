<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">

        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script src="{{asset('js/app.js')}}"></script>

        <title>piLaSense</title>
    </head>
    <body class="font-sans antialiased">
        <div class="bg-gray-100 h-full overflow-x-hidden">
            <!-- Page Heading -->
            <header class="flex justify-center items-center w-screen h-20 border-b-2 bg-white shadow-sm">
                <div class="w-full max-w-screen-xl flex justify-end items-center">
                    <div class="mx-4 text-xl">
                        <a href="{{route('index')}}" class="px-2">Home</a>
                        <a href="{{route('sensor_systems.index')}}" class="px-2">Sensor Systems</a>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-4" style="height: calc(100vh - 5rem);">
                {{$slot}}
            </main>
        </div>
    </body>
</html>
