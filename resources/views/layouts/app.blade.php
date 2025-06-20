@vite(['resources/css/app.css', 'resources/js/app.js'])
@livewireStyles
@livewireScripts

<!DOCTYPE html>

<html>
<head>
    <title>@yield('title', 'Cloud Analytics')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    html, body {
        height: 100%;
    }
    body {
        display: flex;
        flex-direction: column;
    }
    .container {
        flex: 1;
    }
</style>

</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">📁 CloudDocs</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ route('upload.file') }}">Upload</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('documents.list') }}">Documents</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Search</a></li> {{-- Placeholder --}}
            </ul>
        </div>
    </div>
</nav>

<div class="container py-4">
    @yield('content')
</div>

<footer class="text-center text-muted py-3 mt-5 border-top bg-white">
    &copy; {{ date('Y') }} CloudDocs - Made by std :120211797 &  120212293
                                             in Laravel
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
