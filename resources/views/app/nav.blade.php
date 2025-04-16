<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Navbar">
    <div class="container-xl">
        <a class="navbar-brand" href="{{ route('home') }}">Luna</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbars">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('transports.index') }}">Transports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('packages.index') }}">Packages</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
