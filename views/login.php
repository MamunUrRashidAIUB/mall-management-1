<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign In - Shopping</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black min-h-screen flex items-center justify-center">
  <div class="bg-purple-100 rounded-xl border-2 border-blue-400 px-8 py-8 w-[540px] flex items-center"
       style="box-shadow:0 2px 16px 5px rgba(0,0,0,0.08)">
    <!-- Left: Login Form -->
    <div class="w-1/2">
      <h2 class="text-xl font-bold text-purple-900 mb-5" style="font-family:'Comic Sans MS', 'Comic Sans', cursive;">
        Welcome Back!
      </h2>
      <form>
        <input type="text" placeholder="Alice@example.com"
          class="mb-3 w-full p-2 rounded bg-white focus:outline-none placeholder:text-gray-500 border border-gray-200" />
        <input type="password" placeholder="Password"
          class="mb-4 w-full p-2 rounded bg-white focus:outline-none placeholder:text-gray-500 border border-gray-200" />
        <button type="submit"
          class="w-full bg-blue-400 hover:bg-blue-500 text-white font-semibold py-2 rounded transition mb-5">
          Sign in
        </button>
        <div class="flex justify-start items-center space-x-8 px-2 mt-1">
          <!-- Google -->
          <a href="#" aria-label="Login with Google">
            <svg class="w-6 h-6" viewBox="0 0 48 48">
              <path fill="#EA4335" d="M24 9.5c3.94 0 6.6 1.7 8.12 3.13l5.94-5.94C34.64 3.28 29.73 1 24 1 14.95 1 7.16 6.58 3.69 14.51l6.92 5.38C12.23 14.55 17.64 9.5 24 9.5z"/>
              <path fill="#34A853" d="M46.14 24.5c0-1.6-.14-3.13-.39-4.5H24v8.52h12.5c-.54 2.84-2.14 5.25-4.54 6.86l7.1 5.5c4.15-3.84 6.58-9.49 6.58-16.38z"/>
              <path fill="#FBBC05" d="M10.61 28.61c-.64-1.9-1-3.92-1-6.11s.36-4.21 1-6.11l-6.92-5.38C1.47 14.19 0 18.88 0 24s1.47 9.81 3.69 13.99l6.92-5.38z"/>
              <path fill="#4285F4" d="M24 48c6.48 0 11.91-2.14 15.88-5.82l-7.1-5.5c-2.03 1.37-4.64 2.18-8.78 2.18-6.36 0-11.77-5.05-13.39-11.38l-6.92 5.38C7.16 41.42 14.95 48 24 48z"/>
            </svg>
          </a>

          <!-- Apple -->
          <a href="#" aria-label="Login with Apple">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
              <path d="M16.365 1.43c-.98.046-2.145.696-2.84 1.52-.62.735-1.156 1.902-.95 3.012 1.1.084 2.227-.56 2.91-1.38.676-.82 1.16-1.972.88-3.152zm5.355 16.323c-.447.994-1.02 1.993-1.776 2.963-.678.865-1.58 1.96-2.75 1.975-1.04.018-1.378-.63-2.86-.63-1.483 0-1.864.612-2.884.65-1.152.043-2.027-.944-2.705-1.81-1.476-1.856-2.607-5.244-1.094-7.548.755-1.15 2.1-1.887 3.557-1.905 1.104-.018 2.146.744 2.86.744.693 0 2.028-.92 3.423-.785.582.024 2.215.235 3.26 1.77-.084.053-1.952 1.147-1.93 3.407.022 2.707 2.39 3.605 2.399 3.607z"/>
            </svg>
          </a>

          <!-- Facebook -->
          <a href="#" aria-label="Login with Facebook">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
              <path d="M22.676 0H1.324C.593 0 0 .593 0 1.324v21.352C0 23.406.593 24 1.324 24h11.49v-9.294H9.691V11.09h3.123V8.413c0-3.1 1.893-4.785 4.66-4.785 1.325 0 2.463.098 2.797.142v3.24h-1.918c-1.504 0-1.797.715-1.797 1.763v2.317h3.59l-.467 3.616h-3.123V24h6.115C23.407 24 24 23.407 24 22.676V1.324C24 .593 23.407 0 22.676 0z"/>
            </svg>
          </a>
        </div>
      </form>
    </div>
    <!-- Right: Image -->
    <div class="w-1/2 flex items-center justify-center">
      <div class="bg-white rounded-lg flex items-center justify-center w-[180px] h-[160px] overflow-hidden">
        <img src="../assets/images/login.png" alt="Shopping Illustration" class="object-contain w-[140px] h-[140px]" />
      </div>
    </div>
  </div>
</body>
</html>
