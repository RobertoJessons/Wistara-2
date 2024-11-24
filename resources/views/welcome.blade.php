<style>
    .gradient-text {
        background: linear-gradient(to bottom, #d6bfa7, black); /* black to brown-300 */
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Welcome')</title>
    <link rel="icon" type="image/png" href="{{ asset('Foto/logonobg.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-blue-300 to-white min-h-screen">
    <!-- Navigation -->
    <header class="bg-transparent p-6">
        <div class="container mx-auto flex justify-between items-center">
        <img src="{{ asset('Foto/logonobg.png') }}" alt="Foto/logonobg.png">
        <nav class="flex space-x-3 mt-0">
    <a href="#" class="text-black hover:underline bg-blue-200 hover:bg-blue-400 px-4 py-2 rounded-full transition">
        HOME
    </a>
    <a href="#" class="text-black hover:underline bg-blue-200 hover:bg-blue-400 px-4 py-2 rounded-full transition">
        ABOUT
    </a>
    <a href="#" class="text-black hover:underline bg-blue-200 hover:bg-blue-400 px-4 py-2 rounded-full transition">
        FAQ
    </a>
    <a href="#" class="text-black hover:underline bg-blue-200 hover:bg-blue-400 px-4 py-2 rounded-full transition">
        SERVICE
    </a>
    <a href="#" class="text-black hover:underline bg-blue-200 hover:bg-blue-400 px-4 py-2 rounded-full transition">
        CONTACT
    </a>
</nav>

        </div>
    </header>

    <!-- Hero Section -->
    <section class="text-center from-blue-300 to-white flex flex-col justify-center items-center py-20">
    <h2 class="text-5xl font-bold mb-1 gradient-text">WELCOME TO</h2>
    <h2 class="text-4xl font-bold mb-4 gradient-text">WISTARA ART & SPACE</h2>
    <p class="text-lg max-w-3xl mx-auto mb-8">
        Tempat di mana kamu dapat menemukan inspirasi dan kenyamanan dalam setiap ruang
    </p>
    <a href="/login" class="bg-white text-blue-500 px-6 py-3 rounded-full font-bold hover:bg-gray-200 transition">GET STARTED</a>
</section>

    <!-- Background Illustration -->
    <div class="relative w-full overflow-hidden">
        <svg class="absolute bottom-0 w-full h-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#003366" fill-opacity="1" d="M0,288L80,261.3C160,235,320,181,480,170.7C640,160,800,192,960,213.3C1120,235,1280,245,1360,250.7L1440,256L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
        </svg>
    </div>
</body>
</html>
