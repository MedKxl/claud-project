
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Documents</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-3xl font-bold mb-4 text-center text-blue-700">📂 Uploaded Documents</h1>

        <form action="/search" method="POST" class="mb-6">
            @csrf
            <div class="flex">
                <input type="text" name="query" placeholder="Search documents..."
                       class="w-full p-3 border border-gray-300 rounded-l-lg focus:outline-none" required>
                <button type="submit"
                        class="bg-blue-600 text-white px-6 rounded-r-lg hover:bg-blue-700 transition">Search</button>
            </div>
        </form>

        <div class="bg-white shadow-md rounded-lg overflow-x-auto">
            <table class="w-full table-auto text-sm">
                <thead class="bg-blue-50 text-blue-800">
                    <tr>
                        <th class="px-4 py-2 text-left">Title</th>
                        <th class="px-4 py-2">Category</th>
                        <th class="px-4 py-2">Size (KB)</th>
                        <th class="px-4 py-2">Uploaded</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse ($documents as $doc)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $doc->title }}</td>
                        <td class="px-4 py-2 text-center">{{ $doc->category }}</td>
                        <td class="px-4 py-2 text-center">{{ $doc->size_kb }}</td>
                        <td class="px-4 py-2 text-center">{{ $doc->uploaded_at }}</td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ $doc->public_url }}" target="_blank"
                               class="text-blue-600 hover:underline">View</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-gray-500 py-4">No documents uploaded yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
