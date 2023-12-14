<nav class="navbar sticky-top navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="btn btn-outline-light" title="menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <i class="bi bi-list"></i>
        </button>
        
        <a href="/">
            <img src="{{ asset('img/logo.png') }}" alt="img/logo.png" width="60"/>
        </a>
        
        <div class="navbar-nav ml-auto">
            <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <span class="d-none d-sm-inline">Logout</span> <i class="bi bi-box-arrow-right"></i>
            </button>
        </div>
    </div>
</nav>