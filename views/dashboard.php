<?php
require_once "../controller/testcontroller.php";



?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard | Mall Management System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
</head>
<body class="bg-gray-100 min-h-screen">
  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="bg-white w-64 border-r shadow-xl flex flex-col">
      <div class="p-6 text-2xl font-bold text-purple-900">Mall Admin</div>
      <nav class="flex-1 p-4 space-y-2">
        <a class="flex items-center gap-4 p-2 text-purple-900 bg-purple-100 rounded font-semibold" href="#"><i class="fa-solid fa-house"></i>Home</a>
  <a class="flex items-center gap-4 p-2 hover:bg-gray-100 rounded" href="?show_emp=1"><i class="fa-solid fa-store"></i>Shop Management</a>
        <a class="flex items-center gap-4 p-2 hover:bg-gray-100 rounded" href="#"><i class="fa-solid fa-file-invoice-dollar"></i>Rent Management</a>
        <a class="flex items-center gap-4 p-2 hover:bg-gray-100 rounded" href="#"><i class="fa-solid fa-users"></i>Employee Management</a>
        <a class="flex items-center gap-4 p-2 hover:bg-gray-100 rounded" href="#"><i class="fa-solid fa-user-check"></i>Customer Visit Tracking</a>
        <a class="flex items-center gap-4 p-2 hover:bg-gray-100 rounded" href="#"><i class="fa-solid fa-screwdriver-wrench"></i>Maintenance</a>
        <a class="flex items-center gap-4 p-2 hover:bg-gray-100 rounded" href="#"><i class="fa-solid fa-calendar-days"></i>Event Management</a>
        <a class="flex items-center gap-4 p-2 hover:bg-gray-100 rounded" href="#"><i class="fa-solid fa-chart-line"></i>Sales Reporting</a>
      </nav>
      <div class="p-4 mt-auto border-t">
        <a class="flex items-center gap-4 p-2 hover:bg-gray-100 rounded" href="#"><i class="fa-solid fa-circle-question"></i>Help</a>
        <a class="flex items-center gap-4 p-2 hover:bg-gray-100 rounded text-red-600" href="#"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
      </div>
    </aside>
    <!-- Main Content -->
    <main class="flex-1 p-10 flex flex-col">
      <!-- Top bar -->
      <div class="flex justify-between items-center mb-8">
        <input class="w-96 px-4 py-2 rounded border focus:outline-none focus:ring-2 focus:ring-purple-300" type="search" placeholder="Search"/>
        <div class="flex items-center space-x-6">
          <i class="fa-solid fa-bell text-lg"></i>
          <i class="fa-solid fa-pen text-lg"></i>
          <span class="inline-block bg-yellow-100 text-yellow-800 rounded-full p-2"><i class="fa-solid fa-user"></i></span>
        </div>
      </div>
      <!-- Example Main Section (Shops Overview) -->
      <section class="bg-white rounded-2xl shadow-md p-8 flex mb-8">
        <div class="flex-1">
          <h2 class="text-xl font-bold mb-6 text-purple-800">Dashboard Overview</h2>
          <div class="grid grid-cols-2 gap-6">
            <div>
              <div class="text-gray-500">Total Shops</div>
              <div class="text-3xl font-extrabold text-purple-900">120</div>
            </div>
            <div>
              <div class="text-gray-500">Total Employees</div>
              <div class="text-3xl font-extrabold text-purple-900">350</div>
            </div>
            <div>
              <div class="text-gray-500">Total Customers</div>
              <div class="text-3xl font-extrabold text-purple-900">2,500</div>
            </div>
            <div>
              <div class="text-gray-500">Total Revenue</div>
              <div class="text-3xl font-extrabold text-purple-900">$1,200,000</div>
            </div>
          </div>
        </div>
        <img src="image.jpg" alt="Dashboard Illustration" class="w-60 h-60 rounded-xl shadow ml-10 object-contain">
      </section>
      <!-- Show EMP table if Shop Management is clicked -->
      <?php if (isset($_GET['show_emp'])): ?>
      <section class="bg-white rounded-2xl shadow-md p-8 mb-8">
        <h2 class="text-xl font-bold mb-6 text-purple-800">Employee Table</h2>
        <div class="overflow-x-auto">
          <table class="min-w-full border text-sm">
            <thead class="bg-purple-100">
              <tr>
                <th class="px-4 py-2 border">EMPNO</th>
                <th class="px-4 py-2 border">ENAME</th>
                <th class="px-4 py-2 border">JOB</th>
                <th class="px-4 py-2 border">MGR</th>
                <th class="px-4 py-2 border">HIREDATE</th>
                <th class="px-4 py-2 border">SAL</th>
                <th class="px-4 py-2 border">COMM</th>
                <th class="px-4 py-2 border">DEPTNO</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($planents as $row): ?>
                <tr>
                  <td class="px-4 py-2 border"><?php echo htmlspecialchars($row['EMPNO']); ?></td>
                  <td class="px-4 py-2 border"><?php echo htmlspecialchars($row['ENAME']); ?></td>
                  <td class="px-4 py-2 border"><?php echo htmlspecialchars($row['JOB']); ?></td>
                  <td class="px-4 py-2 border"><?php echo htmlspecialchars($row['MGR']); ?></td>
                  <td class="px-4 py-2 border"><?php echo htmlspecialchars($row['HIREDATE']); ?></td>
                  <td class="px-4 py-2 border"><?php echo htmlspecialchars($row['SAL']); ?></td>
                  <td class="px-4 py-2 border"><?php echo htmlspecialchars($row['COMM']); ?></td>
                  <td class="px-4 py-2 border"><?php echo htmlspecialchars($row['DEPTNO']); ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </section>
      <?php endif; ?>
    </main>
  </div>
</body>
</html>
