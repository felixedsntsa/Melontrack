<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/asset/melonfavicon.png" type="image/x-icon">
    <link rel="icon" href="/asset/melonfavicon.png" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        Poppins: ["Poppins", "sans-serif"]
                    },
                    backdropBlur: {
                        xs: '2px',
                    }
                }
            }
        }
    </script>
    <title>Melontrack | @yield('title')</title>
</head>
<body class="font-Poppins relative min-h-screen bg-cover bg-center bg-no-repeat bg-fixed" style="background-image: url('asset/plantmelon.jpg');">

    <!-- Dark overlay -->
    <div class="absolute inset-0 bg-black/50"></div>

    <!-- Main content with glass effect container -->
    <main class="relative z-10 flex items-center justify-center min-h-screen p-4">
        @yield('content')
    </main>

</body>
</html>
