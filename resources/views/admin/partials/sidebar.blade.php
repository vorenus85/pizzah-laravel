<h4  class="text-white mb-4">
    <i class="fa-solid fa-pizza-slice me-2"></i>
    <a href="{{ route('admin.dashboard') }}">Pizzah Admin</a>
</h4>

<ul class="nav flex-column">
    <li class="nav-item mb-2">
        <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">
            <i class="fa-solid fa-gauge-high me-2"></i> Irányítópult
        </a>
    </li>
    <li class="nav-item mb-2">
        <a href="{{ route('admin.products') }}" class="nav-link text-white">
            <i class="fa-solid fa-box me-2"></i> Termékek
        </a>
    </li>
    <li class="nav-item mb-2">
        <a href="{{ route('admin.categories') }}" class="nav-link text-white">
            <i class="fa-solid fa-tags me-2"></i> Kategóriák
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.orders') }}" class="nav-link text-white">
            <i class="fa-solid fa-receipt me-2"></i> Rendelések
        </a>
    </li>
</ul>
