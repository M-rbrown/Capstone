<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Panel</title>
    <style>
        body {
            font-family: trebuchet MS;
        }
    </style>
</head>
<style></style>
<body class="flex items-center  justify-center min-h-screen bg-gradient-to-br from-[#8B322C] via-[#EAC4B6] to-[#F5E7E0]">
    <!-- Main Container -->
    <div class="flex w-[900px] h-[500px] shadow-lg rounded-2xl overflow-hidden bg-white/30 backdrop-blur-md">
        
    <div class="w-1/2 relative flex items-center justify-center">
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-[#8B322C]/80 to-[#F5E7E0]/80 flex items-center justify-center"
        style="background-image: linear-gradient(rgba(139, 50, 44, 0.7), rgba(245, 231, 224, 0.7)), url('libs/images/atcimage.png');
        background-size: cover;
           background-position: center top;">
            
            <h1 class="text-white text-3xl font-bold text-center px-4 drop-shadow-lg">
                <br>At ATC,<br>
                Quality is No. 1 Priority!
            </h1>
        </div>
    </div>

        <!-- Right Side (Form Section) -->
        <div class="w-1/2 flex flex-col bg-white/80 ">
            
            <!-- Form Section -->
            <div class="p-8 flex-1 flex flex-col justify-center">
                <div class="flex justify-center mb-4">
                    <img src="libs/images/atc-logo.png" alt="ATC Logo" class="h-16">
                </div>
                <h1 class="text-2xl font-bold text-gray-800 text-center mb-6">WELCOME</h1>
                    <form method="post" action="auth_v2.php">
                    <div class="mb-4 relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-black">
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <input type="text" name="username" 
                            class="w-full p-3 pl-12 border border-gray-300 rounded-full focus:ring-2 focus:ring-red-500 focus:outline-none" 
                            placeholder="Username">
                    </div>

                    <div class="mb-4 relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-black">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input type="password" name="password" 
                            class="w-full p-3 pl-12 border border-gray-300 rounded-full focus:ring-2 focus:ring-red-500 focus:outline-none" 
                            placeholder="Password">
                    </div>
                        <button type="submit" class="w-full py-3 text-white bg-red-600 rounded-full hover:bg-red-700 transition">LOGIN</button>
                  </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" crossorigin="anonymous"></script>
</html>
