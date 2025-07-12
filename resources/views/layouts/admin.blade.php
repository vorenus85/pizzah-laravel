<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Admin felület</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
          rel="stylesheet">
    @vite('resources/scss/admin/admin.scss')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
<div class="d-flex" id="admin-app">
    <div class="bg-dark text-white p-3 vh-100" style="width: 250px;">
        @section('sidebar')
            @include('admin.sections.sidebar')
        @show
    </div>
    <div class="p-4 flex-grow-1">
        <div class="container">
            @yield('title')
            @section('message')
                @if (session('message'))
                    <div class="alert alert-{{session('message_type')}} alert-dismissible fade show mt-5" role="alert">
                        <span>{{ session('message') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            @show
            @yield('content')
        </div>
    </div>
</div>
@vite('resources/js/app.js')


@yield('script')
</body>
</html>
