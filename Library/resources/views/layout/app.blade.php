<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { 
            background-color: #121212 !important; 
            color: #e0e0e0;
        }
        .card { 
            background-color: #1e1e1e !important; 
            border: 1px solid #333;
        }
        /* This will make every button with the 'rounded-pill' class have the same color/gradient */
        .rounded-pill {
            background: linear-gradient(90deg, #0d6efd, #a10404) !important;
            border: none !important;
            color: white !important;
            transition: opacity 0.2s ease;
        }

        .rounded-pill:hover {
            opacity: 0.9;
            color: white !important;
        }

    </style>
</head>
<body>

    @include('layout.navbar')

    <div class="container mt-5 mb-5 pb-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>