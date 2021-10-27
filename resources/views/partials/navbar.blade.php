<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
        <div class="header-container d-flex align-items-center justify-content-between">
            <div class="logo w-50">
                <h1 class="inline-block">
                    <a href="{{route('/')}}">
                        <span class="text-dark">
                            <img src="{{ asset('assets/img/HMTP.jpg') }}" alt="homepage" class="dark-logo" height="100" />  
                            HMTP
                        </span>
                    </a>
                </h1>
            </div>
            <nav id="navbar">
                <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#alumni">ALUMNI</a></li>
                <li><a class="nav-link scrollto" href="#mahasiswa">MAHASISWA</a></li>
                <li class="dropdown"><a href="#"><span>FASILITAS</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                    <li><a href="#">FASILITAS LABORATORIUM</a></li>
                    <li><a href="#">FASILITAS PERPUSTAKAAN</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>ARSIP</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                    <li><a href="#">ARSIP LABORATORIUM</a></li>
                    <li><a href="#">ARSIP PERPUSTAKAAN</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="#contact">TENTANG KAMI</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </div>
</header>