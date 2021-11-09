<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('dashboard') }}"
                        aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                            class="hide-menu">Dashboard</span></a>
                </li>
                <li class="list-divider"></li>
                <li class="sidebar-item"> 
                    <a class="sidebar-link sidebar-link" href="{{route('hmtp.index')}}" aria-expanded="false">
                        <i data-feather="sidebar" class="feather-icon"></i>
                        <span class="hide-menu">HMTP</span>
                    </a>
                </li>
               
                <li class="sidebar-item"> 
                    <a class="sidebar-link sidebar-link" href="{{route('alumni.index')}}" aria-expanded="false">
                        <i data-feather="user" class="feather-icon"></i>
                        <span class="hide-menu">Alumni</span>
                    </a>
                </li>
                
                
                <li class="sidebar-item"> 
                    <a class="sidebar-link sidebar-link" href="{{route('kegiatan.index')}}" aria-expanded="false">
                        <i data-feather="airplay" class="feather-icon"></i>
                        <span class="hide-menu">Kegiatan</span>
                    </a>
                </li>
                
                <li class="sidebar-item"> 
                    <a class="sidebar-link sidebar-link" href="{{route('Loker.index')}}" aria-expanded="false">
                        <i data-feather="award" class="feather-icon"></i>
                        <span class="hide-menu">lowongan Pekerjaan</span>
                    </a>
                </li>
                <li class="sidebar-item"> 
                    <a class="sidebar-link sidebar-link" href="{{route('periode.index')}}" aria-expanded="false">
                        <i data-feather="rotate-cw" class="feather-icon"></i>
                        <span class="hide-menu">Periode</span>
                    </a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i data-feather="clock" class="feather-icon"></i><span
                            class="hide-menu">Info</span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"> 
                            <a class="sidebar-link sidebar-link" href="{{route('agenda.index')}}" aria-expanded="false">
                                <i data-feather="watch" class="feather-icon"></i>
                                <span class="hide-menu">Agenda</span>
                            </a>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link sidebar-link" href="{{route('berita.index')}}" aria-expanded="false">
                                <i data-feather="archive" class="feather-icon"></i>
                                <span class="hide-menu">Berita</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i data-feather="menu" class="feather-icon"></i><span
                            class="hide-menu">Jadwal</span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"> 
                            <a class="sidebar-link sidebar-link" href="{{route('jadwal.index')}}" aria-expanded="false">
                                <i data-feather="file-text" class="feather-icon"></i>
                                <span class="hide-menu">Jadwal Kuliah</span>
                            </a>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link sidebar-link" href="{{route('kalender.index')}}" aria-expanded="false">
                                <i data-feather="calendar" class="feather-icon"></i>
                                <span class="hide-menu">Kalender Akademik</span>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="nav-small-cap"><span class="hide-menu">Components</span></li> --}}
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span
                            class="hide-menu">Fasilitas</span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"> 
                            <a class="sidebar-link sidebar-link" href="{{route('Lab.index')}}" aria-expanded="false">
                                <i data-feather="briefcase" class="feather-icon"></i>
                                <span class="hide-menu">Lab</span>
                            </a>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link sidebar-link" href="{{route('Perpustakaan.index')}}" aria-expanded="false">
                                <i data-feather="book" class="feather-icon"></i>
                                <span class="hide-menu">Perpustakaan</span>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="list-divider"></li>

                <li class="sidebar-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a type="submit" class="sidebar-link sidebar-link" onclick="event.preventDefault(); this.closest('form').submit();">
                            <i data-feather="log-out"class="log-out text-danger"></i><span
                            class="hide-menu text-danger">Logout</span>
                        </a>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>