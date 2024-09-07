<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#index.html"><span class="text-main">Carbon</span>itor</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><a class="navbar-brand" href="#"><span
                            class="text-main">Carbon</span>itor</a></h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item pb-1">
                        <a class="nav-link" href="#">
                            <i class="fa-solid fa-house p-2"></i>Home
                        </a>
                    </li>
                    <li class="nav-item pb-1">
                        <a class="nav-link" href="#projects">
                            <i class="fa-solid fa-diagram-project p-2"></i>Our Objectives
                        </a>
                    </li>
                    <li class="nav-item pb-1">
                        <a class="nav-link" href="{{ route('projects.projects-listing') }}">
                            <i class="fa-solid fa-tachometer p-2"></i>Our Projects
                        </a>
                    </li>
                    <li class="nav-item pb-1">
                        <a class="nav-link" href="#team"><i class="fa-solid fa-people-group p-2">
                            </i>Our Team
                        </a>
                    </li>
                    <li class="nav-item pb-1">
                        <a class="nav-link" href="#contact"><i class="fa-solid fa-envelopes-bulk p-2"></i>
                            Contact
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
