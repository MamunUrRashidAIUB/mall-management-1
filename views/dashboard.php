<?php
require_once __DIR__ . '/../controller/testcontroller.php';
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
     <a class="flex items-center gap-4 p-2 hover:bg-gray-100 rounded" href="dashboard.php"><i class="fa-solid fa-house"></i>Home</a>
<a class="flex items-center gap-4 p-2 hover:bg-gray-100 rounded" href="dashboard.php?page=shop"><i class="fa-solid fa-store"></i>Shop Management</a>
<a class="flex items-center gap-4 p-2 hover:bg-gray-100 rounded" href="dashboard.php?show_emp=1"><i class="fa-solid fa-users"></i>Employee Management</a>
<a class="flex items-center gap-4 p-2 hover:bg-gray-100 rounded" href="#"><i class="fa-solid fa-file-invoice-dollar"></i>Rent Management</a>
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
        <span class="inline-block bg-yellow-100 text-yellow-800 rounded-full p-2"><i class="fa-solid fa-user"></i></span>
      </div>
    </div>

    <!-- Dashboard Overview -->
    <?php if (!isset($_GET['page']) && !isset($_GET['show_emp'])): ?>
    <section class="bg-white rounded-2xl shadow-md p-8 flex mb-8">
      <div class="flex-1">
        <h2 class="text-xl font-bold mb-6 text-purple-800">Dashboard Overview</h2>
        <div class="grid grid-cols-2 gap-6">
          <div><div class="text-gray-500">Total Shops</div><div class="text-3xl font-extrabold text-purple-900">120</div></div>
          <div><div class="text-gray-500">Total Employees</div><div class="text-3xl font-extrabold text-purple-900">350</div></div>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <!-- Shop Table -->
    <?php if (isset($_GET['page']) && $_GET['page'] == 'shop'): $shops = fetchShops(); ?>
    <section class="bg-white rounded-2xl shadow-md p-8 mb-8">
      <h2 class="text-xl font-bold mb-6 text-purple-800">Shop Table</h2>
        <!-- Add Shop Button -->
        <button onclick="document.getElementById('addShopModal').classList.remove('hidden')" class="mb-4 px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700"><i class="fa fa-plus mr-2"></i>Add Shop</button>
      <div class="overflow-x-auto">
        <table class="min-w-full border text-sm">
          <thead class="bg-purple-100">
            <tr>
              <th class="px-4 py-2 border">SHOPID</th>
              <th class="px-4 py-2 border">NAME</th>
              <th class="px-4 py-2 border">OWNER</th>
              <th class="px-4 py-2 border">TYPE</th>
              <th class="px-4 py-2 border">FLOORNUMBER</th>
                <th class="px-4 py-2 border">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($shops as $row): ?>
            <tr>
              <td class="px-4 py-2 border"><?= htmlspecialchars($row['SHOPID']) ?></td>
              <td class="px-4 py-2 border"><?= htmlspecialchars($row['NAME']) ?></td>
              <td class="px-4 py-2 border"><?= htmlspecialchars($row['OWNER']) ?></td>
              <td class="px-4 py-2 border"><?= htmlspecialchars($row['TYPE']) ?></td>
              <td class="px-4 py-2 border"><?= htmlspecialchars($row['FLOORNUMBER']) ?></td>
                <td class="px-4 py-2 border">
                  <button onclick="openEditShopModal('<?= htmlspecialchars($row['SHOPID']) ?>', '<?= htmlspecialchars($row['NAME']) ?>', '<?= htmlspecialchars($row['OWNER']) ?>', '<?= htmlspecialchars($row['TYPE']) ?>', '<?= htmlspecialchars($row['FLOORNUMBER']) ?>')" class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 mr-2"><i class='fa fa-edit'></i></button>
                  <button onclick="if(confirm('Are you sure you want to delete this shop?')){}" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600"><i class='fa fa-trash'></i></button>
                </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
        <!-- Add Shop Modal -->
        <div id="addShopModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
          <div class="bg-white rounded-lg p-8 w-full max-w-md shadow-lg relative">
            <h3 class="text-lg font-bold mb-4">Add Shop</h3>
            <form>
              <input type="text" class="w-full mb-2 px-3 py-2 border rounded" placeholder="Shop Name" required>
              <input type="text" class="w-full mb-2 px-3 py-2 border rounded" placeholder="Owner" required>
              <input type="text" class="w-full mb-2 px-3 py-2 border rounded" placeholder="Type" required>
              <input type="text" class="w-full mb-4 px-3 py-2 border rounded" placeholder="Floor Number" required>
              <div class="flex justify-end gap-2">
                <button type="button" onclick="document.getElementById('addShopModal').classList.add('hidden')" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded">Add</button>
              </div>
            </form>
            <button onclick="document.getElementById('addShopModal').classList.add('hidden')" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- Edit Shop Modal -->
        <div id="editShopModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
          <div class="bg-white rounded-lg p-8 w-full max-w-md shadow-lg relative">
            <h3 class="text-lg font-bold mb-4">Edit Shop</h3>
            <form>
              <input id="editShopName" type="text" class="w-full mb-2 px-3 py-2 border rounded" placeholder="Shop Name" required>
              <input id="editShopOwner" type="text" class="w-full mb-2 px-3 py-2 border rounded" placeholder="Owner" required>
              <input id="editShopType" type="text" class="w-full mb-2 px-3 py-2 border rounded" placeholder="Type" required>
              <input id="editShopFloor" type="text" class="w-full mb-4 px-3 py-2 border rounded" placeholder="Floor Number" required>
              <div class="flex justify-end gap-2">
                <button type="button" onclick="document.getElementById('editShopModal').classList.add('hidden')" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
              </div>
            </form>
            <button onclick="document.getElementById('editShopModal').classList.add('hidden')" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <script>
          function openEditShopModal(shopid, name, owner, type, floor) {
            document.getElementById('editShopModal').classList.remove('hidden');
            document.getElementById('editShopName').value = name;
            document.getElementById('editShopOwner').value = owner;
            document.getElementById('editShopType').value = type;
            document.getElementById('editShopFloor').value = floor;
          }
        </script>
    </section>
    <?php endif; ?>

    <!-- Employee Table -->
    <?php if (isset($_GET['show_emp'])): $employees = fetchEmployees(); ?>
    <section class="bg-white rounded-2xl shadow-md p-8 mb-8">
      <h2 class="text-xl font-bold mb-6 text-purple-800">Employee Table</h2>
      <div class="overflow-x-auto">
        <table class="min-w-full border text-sm">
          <thead class="bg-purple-100">
            <tr>
              <th class="px-4 py-2 border">EMPID</th>
              <th class="px-4 py-2 border">NAME</th>
              <th class="px-4 py-2 border">JOBROLE</th>
              <th class="px-4 py-2 border">SHIFTTIME</th>
              <th class="px-4 py-2 border">ASSIGNEDFLOOR</th>
              <th class="px-4 py-2 border">SHOPID</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($employees as $row): ?>
            <tr>
              <td class="px-4 py-2 border"><?= htmlspecialchars($row['EMPID']) ?></td>
              <td class="px-4 py-2 border"><?= htmlspecialchars($row['NAME']) ?></td>
              <td class="px-4 py-2 border"><?= htmlspecialchars($row['JOBROLE']) ?></td>
              <td class="px-4 py-2 border"><?= htmlspecialchars($row['SHIFTTIME']) ?></td>
              <td class="px-4 py-2 border"><?= htmlspecialchars($row['ASSIGNEDFLOOR']) ?></td>
              <td class="px-4 py-2 border"><?= htmlspecialchars($row['SHOPID']) ?></td>
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
