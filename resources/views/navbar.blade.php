<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Data Barang</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav me-auto">
                <a class="nav-link {{ request()->routeIs('product.dashboard') ? 'active' : '' }}" aria-current="page" href="{{ route('product.dashboard') }}">Dashboard</a>
                <a class="nav-link {{ request()->routeIs('category') ? 'active' : '' }}" href="{{ route('category') }}">Categories</a>
            </div>
            <form class="d-flex" method="GET" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-danger" type="submit">Logout</button>
            </form>
        </div>
    </div>
</nav>