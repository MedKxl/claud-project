<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 p-6">
    <div class="max-w-5xl mx-auto">
        <h1 class="text-2xl font-bold text-blue-700 mb-6">🔍 Search Results for: "{{ $query }}"</h1>

        @if($results->isEmpty())
            <p class="text-gray-500">No results found.</p>
        @else
            <div class="space-y-4">
                @foreach($results as $doc)
                    <div class="bg-white p-4 rounded shadow border border-gray-100">
                        <h2 class="text-lg font-semibold text-blue-800">{{ $doc->title }}</h2>
                        <p class="text-sm text-gray-600 mb-2">Matched Text:</p>
                        <p class="text-gray-700 leading-relaxed">{!! $doc->highlighted !!}</p>
                        <div class="mt-2">
                            <a href="{{ $doc->public_url }}" target="_blank" class="text-blue-600 hover:underline">View Document</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-6">
            <a href="/" class="text-sm text-gray-600 hover:text-blue-600">← Back to Documents</a>
        </div>
    </div>
</body>
</html>
