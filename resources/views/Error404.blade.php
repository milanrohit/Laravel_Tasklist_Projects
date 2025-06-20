<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>404 - Not Found</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <style>
    @keyframes wiggle {
      0%, 100% { transform: rotate(-1deg); }
      50% { transform: rotate(1deg); }
    }
    .animate-wiggle {
      animation: wiggle 1s infinite;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-slate-100 to-gray-300 min-h-screen flex items-center justify-center px-4">
  <div class="text-center space-y-6" data-aos="fade-up">
    <h1 class="text-8xl md:text-9xl font-extrabold text-blue-600 drop-shadow animate-bounce">404</h1>
    <p class="text-xl md:text-2xl text-gray-700 animate-fade-in">Oops! We couldn’t find the page you were looking for.</p>
    <p class="text-gray-600 max-w-md mx-auto animate-fade-in" data-aos="fade-up" data-aos-delay="200">
      Maybe it got moved, maybe it never existed. Let’s get you back on track.
    </p>
    <a href="/" class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg shadow-lg hover:bg-blue-700 transition duration-300 animate-wiggle">
      Return Home
    </a>
    <div class="mt-10" data-aos="zoom-in">
      <svg class="mx-auto w-24 h-24 text-blue-400 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 19V6h13m-7 13l-7-7 7-7" />
      </svg>
    </div>
  </div>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>AOS.init();</script>
</body>
</html>