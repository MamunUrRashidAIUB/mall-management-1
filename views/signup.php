<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register - Enjoy Shopping</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black min-h-screen flex items-center justify-center">
  <div class="bg-blue-100 rounded-xl p-8 max-w-3xl w-full mx-auto flex justify-between items-center">
    <!-- Left: Registration Form -->
    <div class="w-1/2 pr-6">
      <?php
      session_start();
      $errors = $_SESSION['signup_errors'] ?? [];
      unset($_SESSION['signup_errors']);
      ?>
      <?php if (!empty($errors)): ?>
        <div class="mb-4 p-2 bg-red-200 text-red-800 rounded">
          <?php foreach ($errors as $error): ?>
            <div><?= htmlspecialchars($error) ?></div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <form method="POST" action="../controller/signupcontroller.php">
  <input type="text" name="name" placeholder="Enter your full name" class="mb-3 w-full p-2 rounded bg-white focus:outline-none" required />
  <input type="email" name="email" placeholder="Enter your email" class="mb-3 w-full p-2 rounded bg-white focus:outline-none" required />
  <input type="text" name="phone" placeholder="Enter your phone number" class="mb-3 w-full p-2 rounded bg-white focus:outline-none" required />
  <input type="password" name="password" placeholder="Enter password" class="mb-3 w-full p-2 rounded bg-white focus:outline-none" required />
  <input type="password" name="confirm" placeholder="Confirm Password" class="mb-4 w-full p-2 rounded bg-white focus:outline-none" required />
        <button class="bg-gray-400 hover:bg-gray-500 text-white font-bold w-full py-2 rounded text-xl mb-2 transition">
          Register
        </button>
        <p class="text-sm text-gray-500">
          Already have an account?
          <a href="#" class="font-bold text-black hover:underline">Sign up</a>
        </p>
      </form>
    </div>
    <!-- Right: Welcome Text and Image -->
    <div class="w-1/2 flex flex-col items-center justify-center">
      <h2 class="text-2xl font-bold text-purple-900 mb-2" style="font-family: 'Comic Sans MS', 'Comic Sans', cursive;">
        Welcome to be<br>a customer!
      </h2>
      <p class="text-gray-700 mb-6">
        Let's help you to do shopping
      </p>
      <img src="../assets/images/signup.png" alt="Group Shopping Illustration" class="w-[220px] h-[130px] rounded-lg bg-blue-200 p-2 object-contain" />
    </div>
  </div>
</body>
</html>
