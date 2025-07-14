<div class="d-flex align-items-center">
    <a href="{{ route('cart') }}" class="btn btn-outline-secondary position-relative">
        <i class="fa-solid fa-cart-shopping"></i>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            {{ session('cart_count', 0) }}
          </span>
    </a>
</div>
