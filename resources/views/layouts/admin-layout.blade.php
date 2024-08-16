<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel = "icon" href = "apdicon.png">
    <title>APD Admin</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white text-black">
    <x-admin-navbar/>
    <x-admin-sidebar/>
    <div class="h-full ml-14 mt-14 mb-10 md:ml-64 p-4 flex flex-col">
        @yield('content')
    </div>
</body>
</html>