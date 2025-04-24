<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">
    <!-- Navbar -->
    <nav class="bg-white shadow p-4 flex justify-between items-center">
        <h1 class="text-2xl font-semibold">User Dashboard</h1>
        <div class="space-x-4">
            <a href="/profile" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Profile</a>
            <a href="{{ route('user.logout') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</a>

        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow p-6">
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-bold mb-4">Welcome to your dashboard!</h2>
            <p class="text-gray-700">Here you can view your activities, manage your profile, and more.</p>
        </div>
    </main>
</body>

</html>
