<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Login - Warkom</title>
</head>
<body class="bg-white min-h-screen flex items-center justify-center font-['Poppins']">

    <!-- Card Container -->
    <div class="bg-white border border-gray-300 rounded-3xl w-full max-w-[700px] mx-4 py-12 px-8 sm:px-16 md:px-24 relative shadow-lg">
        
        <h1 class="text-black text-2xl font-semibold mb-8 text-center">Login / Sign up</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 text-xs mb-6 rounded sm:mx-10">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label class="block text-black text-sm mb-1.5 font-medium">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full bg-white border border-gray-300 text-black px-4 py-2.5 outline-none rounded-xl text-sm placeholder-gray-400 focus:border-[#681CA3] focus:ring-1 focus:ring-[#681CA3] transition-all" placeholder="Enter your Email here" required autofocus>
            </div>
            
            <div>
                <label class="block text-black text-sm mb-1.5 font-medium">Password</label>
                <input type="password" name="password" class="w-full bg-white border border-gray-300 text-black px-4 py-2.5 outline-none rounded-xl text-sm placeholder-gray-400 focus:border-[#681CA3] focus:ring-1 focus:ring-[#681CA3] transition-all" placeholder="Enter your Password here" required>
            </div>
            
            <div class="pt-4 flex justify-center">
                <button type="submit" class="bg-[#681CA3] text-white px-16 py-3 rounded-lg font-medium shadow-md hover:opacity-90 transition-opacity">
                    Log In
                </button>
            </div>
        </form>

        <div class="mt-6">
            <p class="text-black text-xs text-center">
                Don't have an account? <a href="{{ route('register') }}" class="text-[#681CA3] hover:underline font-bold">Sign up</a>
            </p>
        </div>
     

    </div>
</body>
</html>
