<!-- resources/views/partials/header.blade.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <!-- Logó -->
        <a class="navbar-brand fw-bold" href="/">
            <img src="{{ asset('images/logo.jpg') }}" alt="Pizzah" width="180" height="135" class="d-inline-block align-text-top">
        </a>

        <!-- Hamburger ikon mobilra -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menü + Kosár -->
        <div class="collapse navbar-collapse justify-content-between" id="mainNavbar">
            <!-- Menüelemek -->
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Pizza</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Italok</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kapcsolat</a>
                </li>
            </ul>

            <!-- Kosár modul -->
            @include('web.partials.module.cart')

        </div>
    </div>
</nav>
