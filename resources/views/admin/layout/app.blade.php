<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>BoxBuddy Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-gradient-to-b from-indigo-600 to-purple-700 text-white p-6">
        <h1 class="text-2xl font-bold mb-8">BoxBuddy Admin</h1>

        <nav class="space-y-4">
            <a href="{{ route('admin.dashboard') }}" class="block hover:opacity-80">Dashboard</a>
            <a href="{{ route('admin.orders') }}" class="block hover:opacity-80">Orders</a>
        </nav>
    </aside>

    <!-- CONTENT -->
    <main class="flex-1 p-10">
        @yield('content')
    </main>

</div>

</body>
</html>
