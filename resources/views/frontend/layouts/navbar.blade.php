<!-- Navbar Start -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg py-3 py-lg-0 px-lg-5">
        <a href="{{ route('home.index') }}" class="navbar-brand ml-lg-3">
            <h1 class="m-0 display-5 text-uppercase text-primary"><i class="fa fa-truck mr-2"></i>DEN LOGISTICS</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
            <div class="navbar-nav m-auto py-0">
                <a href="index.html" class="nav-item nav-link"></a>
                <a href="contact.html" class="nav-item nav-link"></a>
            </div>
            <a href="{{ route('login') }}" class="btn btn-primary py-2 px-4 d-none d-lg-block">Login</a>
        </div>
    </nav>
</div>
<!-- Navbar End -->
