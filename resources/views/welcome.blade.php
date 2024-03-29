@section('hero')
<section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
        <h1 class="kuning-telur">HIMPUNAN MAHASISWA PERTAMBANGAN</h1>
        <h2 class="kuning-telur">UNIVERSITAS MULAWARMAN</h2>
        {{-- <a href="#testimonials" class="btn-get-started scrollto">Get Started</a> --}}
    </div>
</section>
@endsection

@push('css')
    <style>
        .custom.testimonial-img{
            background-repeat: no-repeat;
            background-attachment: initial;
            background-position: center;
            background-size:cover;
            height: 200px;
            border-radius: 30% !important;
        }
        .testimonials-slider .testimonial-item{
            margin: 0px 15px 30px 15px;
        }
    </style>
@endpush


<x-guest-layout>
        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients bg-kuning-telur">
            <div class="container">

            <div class="">

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="100">
                {{-- <img src="Bethany/assets/img/clients/client-1.png" class="img-fluid" alt=""> --}}
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="200">
                {{-- <img src="Bethany/assets/img/clients/client-2.png" class="img-fluid" alt=""> --}}
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="300">
                {{-- <img src="Bethany/assets/img/clients/client-3.png" class="img-fluid" alt=""> --}}
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="400">
                {{-- <img src="Bethany/assets/img/clients/client-4.png" class="img-fluid" alt=""> --}}
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="500">
                {{-- <img src="Bethany/assets/img/clients/client-5.png" class="img-fluid" alt=""> --}}
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="600">
                {{-- <img src="Bethany/assets/img/clients/client-6.png" class="img-fluid" alt=""> --}}
                </div>

            </div>

            </div>
        </section><!-- End Clients Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials section-bg">
            <div class="container">

            <div class="row">
                <h2>Berita dan Agenda</h2>
                <p>Temukan Kabar Berita dan Agenda terbaru disini</p>
                <div class="col-lg-3">
                    <div class="section-title why-us" data-aos="fade-right">
                        <div class="content p-1">
                            <div class="card-body">
                                <h4 class="card-title">Agenda</h4>
                                <div class="mt-4 activity">
                                    @foreach ($agenda as $item)
                                        <div class="d-flex align-items-start border-left-line pb-3">
                                            <div>
                                                <a  class="btn btn-info btn-circle mb-2 btn-item">
                                                    <span class="bx bx-timer"></span>
                                                </a>
                                            </div>
                                            <div class="ml-3 mt-2">
                                                <h5 class="text-dark font-weight-medium mb-2">{{ $item->judul }}</h5>
                                                <p class="font-14 mb-2 text-muted">{{ $item->tempat }} <br> 
                                                    {{ substr($item->jam_mulai, 0,5). "-" .substr($item->jam_selesai, 0,5) }}
                                                </p>
                                                <span class="font-weight-light font-14 text-muted">{{ $item->tanggal->isoFormat("DD MMMM, Y") }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9" data-aos="fade-up" data-aos-delay="100">
                    <h4></h4>
                    <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
                        <div class="swiper-wrapper">
    
                        @foreach ($Berita as $item)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            {{$item->judul}}
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                    <div class="w-100 custom testimonial-img" style="background-image: url({{asset('storage/berita/'.$item->foto)}});"></div>
                                    <h3><a href='{{url("berita/{$item->id}/show")}}'>Baca selengkapnya...</a></h3>
                                    <h4>Post pada {{ $item->created_at->isoFormat('D MMMM Y') }}</h4>
                                </div>
                            </div><!-- End testimonial item -->  
                        @endforeach
    
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>

            </div>
        </section><!-- End Testimonials Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container">
            <div class="row counters">
                <div class="col-lg-3 col-6 text-center">
                <span data-purecounter-start="0" data-purecounter-end="{{$trackuser->count()}}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Total Pengunjung</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                <span data-purecounter-start="0" data-purecounter-end="{{$trackuser_currentmonth->count()}}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Pengunjung Bulan ini</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                <span data-purecounter-start="0" data-purecounter-end="{{$trackuser_currentday->count()}}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Pengunjung Hari ini</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                <span data-purecounter-start="0" id="clock" data-purecounter-end="24" data-purecounter-duration="1" class="purecounter"></span>
                <p>Waktu Indonesia Tengah</p>
                </div>

            </div>

            </div>
        </section><!-- End Counts Section -->
        
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="row content">
                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                        <h2>Struktur Organisasi</h2>
                        <img src="{{ asset('storage/struktur-organisasi/'.$hmtp->struktur_organisasi) }}" alt="" width="400">
                        {{-- <h3>{{}}</h3> --}}
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left" data-aos-delay="200">
                        <p class="text-justify">{{$hmtp->deskripsi}}</p>
                        <h3>Visi</h3>
                        <p>
                            {{$hmtp->visi}}
                        </p>
                        <h3>Misi</h3>
                        {{-- <ol>
                            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequa</li>
                            <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
                            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in</li>
                        </ol> --}}
                        {!! $hmtp->misi !!}
                    </div>
                </div>
            </div>
        </section><!-- End About Section -->

        <!-- ======= Why Us Section ======= -->
        <section id="alumni" class="why-us">
            <div class="container">

            <div class="row">
                <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-right">
                <div class="content">
                    <h3>Alumni</h3>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                    Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad corporis.
                    </p>
                    <div class="text-center">
                        {{-- <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a> --}}
                    </div>
                </div>
                </div>
                <div class="col-lg-8 d-flex align-items-stretch">
                <div class="icon-boxes d-flex flex-column justify-content-center">
                    <div class="row">
                    <div class="col-xl-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box mt-4 mt-xl-0">
                            <i class="bx bx-receipt"></i>
                            <h4>Daftar Alumni</h4>
                            <p>Cari Tau siapa saja Alumni dari Mahasiswa Teknik Pertambangan Universitas Mulawarman</p>
                            <div class="d-flex justify-content-center">
                                <div class="d-flex align-items-center">
                                    <a href="{{url('alumni')}}" class="btn btn-outline-warning d-flex align-items-center">More<i class="bx bx-chevron-right bx-sm m-0 p-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                        <div class="icon-box mt-4 mt-xl-0">
                            <i class="bx bx-cube-alt"></i>
                            <h4>Lowongan Pekerjaan</h4>
                            <p>Belum Punya pekerjaan bidang pertambangan, Ayo Cek Lowongan Pekerjaan Disini!</p>
                            <div class="d-flex justify-content-center">
                                <div class="d-flex align-items-center">
                                    <a href="{{url('lowongan-kerja')}}" class="btn btn-outline-warning d-flex align-items-center">More<i class="bx bx-chevron-right bx-sm m-0 p-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                        <div class="icon-box mt-4 mt-xl-0">
                        <i class="bx bx-images"></i>
                        <h4>Labore consequatur</h4>
                        <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                        </div>
                    </div> --}}
                    </div>
                </div><!-- End .content-->
                </div>
            </div>

            </div>
        </section><!-- End Why Us Section -->

        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container">

            <div class="text-center" data-aos="zoom-in">
                <h3>Call To Action</h3>
                <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <a class="cta-btn" href="#">Call To Action</a>
            </div>

            </div>
        </section><!-- End Cta Section -->

        <!-- ======= Services Section ======= -->
        <section id="mahasiswa" class="services section-bg">
            <div class="container">

            <div class="row">
                <div class="col-lg-4">
                    <div class="section-title" data-aos="fade-right">
                        <h2>Mahasiswa</h2>
                        <p>Magnam dolores commodi suscipit nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                    </div>
                </div>
                <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-6 d-flex align-items-stretch">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon"><i class="bx bx-file-find"></i></div>
                            <h4><a href="#">Jadwal Kuliah</a></h4>
                            <p>lihat informasi jadwal kuliah program studi teknik pertambangan</p>
                            <div class="d-flex justify-content-center">
                                <div class="d-flex align-items-center">
                                    <a href="{{url('jadwal-kuliah')}}" class="btn btn-outline-warning d-flex align-items-center">More<i class="bx bx-chevron-right bx-sm m-0 p-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4><a href="#">Kalender Akademik</a></h4>
                            <p>lihat informasi jadwal kegiatan akademik di Universitas mulawarman</p>
                            <div class="d-flex justify-content-center">
                                <div class="d-flex align-items-center">
                                    <a href="{{url('kalender-akademik')}}" class="btn btn-outline-warning d-flex align-items-center">More<i class="bx bx-chevron-right bx-sm m-0 p-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-md-6 d-flex align-items-stretch mt-4">
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                        <div class="icon"><i class="bx bx-tachometer"></i></div>
                        <h4><a href="">Magni Dolores</a></h4>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                    </div>
                    </div>

                    <div class="col-md-6 d-flex align-items-stretch mt-4">
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="400">
                        <div class="icon"><i class="bx bx-world"></i></div>
                        <h4><a href="">Nemo Enim</a></h4>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                    </div>
                    </div> --}}

                </div>
                </div>
            </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container">

            <div class="section-title" data-aos="fade-left">
                <h2>Kegiatan</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    @foreach ($kategori as $item)
                        <li data-filter=".filter-{{$item->kategori}}">{{$item->kategori}}</li>
                    @endforeach
                </ul>
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                @foreach ($kegiatan as $item)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-{{$item->kategori}}">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('storage/kegiatan/'.$item->foto) }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>{{$item->nama}}</h4>
                                {{-- <p>App</p> --}}
                                <div class="portfolio-links">
                                    <a href="{{ asset('storage/kegiatan/'.$item->foto) }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                                    {{-- <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            </div>
        </section><!-- End Portfolio Section -->

        

        <!-- ======= Team Section ======= -->
        {{-- <section id="team" class="team">
            <div class="container">

            <div class="row">
                <div class="col-lg-4">
                <div class="section-title" data-aos="fade-right">
                    <h2>Team</h2>
                    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem.</p>
                </div>
                </div>
                <div class="col-lg-8">
                <div class="row">

                    <div class="col-lg-6">
                    <div class="member" data-aos="zoom-in" data-aos-delay="100">
                        <div class="pic"><img src="Bethany/assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
                        <div class="member-info">
                        <h4>Walter White</h4>
                        <span>Chief Executive Officer</span>
                        <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
                        <div class="social">
                            <a href=""><i class="ri-twitter-fill"></i></a>
                            <a href=""><i class="ri-facebook-fill"></i></a>
                            <a href=""><i class="ri-instagram-fill"></i></a>
                            <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                        </div>
                        </div>
                    </div>
                    </div>

                    <div class="col-lg-6 mt-4 mt-lg-0">
                    <div class="member" data-aos="zoom-in" data-aos-delay="200">
                        <div class="pic"><img src="Bethany/assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
                        <div class="member-info">
                        <h4>Sarah Jhonson</h4>
                        <span>Product Manager</span>
                        <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
                        <div class="social">
                            <a href=""><i class="ri-twitter-fill"></i></a>
                            <a href=""><i class="ri-facebook-fill"></i></a>
                            <a href=""><i class="ri-instagram-fill"></i></a>
                            <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                        </div>
                        </div>
                    </div>
                    </div>

                    <div class="col-lg-6 mt-4">
                    <div class="member" data-aos="zoom-in" data-aos-delay="300">
                        <div class="pic"><img src="Bethany/assets/img/team/team-3.jpg" class="img-fluid" alt=""></div>
                        <div class="member-info">
                        <h4>William Anderson</h4>
                        <span>CTO</span>
                        <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
                        <div class="social">
                            <a href=""><i class="ri-twitter-fill"></i></a>
                            <a href=""><i class="ri-facebook-fill"></i></a>
                            <a href=""><i class="ri-instagram-fill"></i></a>
                            <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                        </div>
                        </div>
                    </div>
                    </div>

                    <div class="col-lg-6 mt-4">
                    <div class="member" data-aos="zoom-in" data-aos-delay="400">
                        <div class="pic"><img src="Bethany/assets/img/team/team-4.jpg" class="img-fluid" alt=""></div>
                        <div class="member-info">
                        <h4>Amanda Jepson</h4>
                        <span>Accountant</span>
                        <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
                        <div class="social">
                            <a href=""><i class="ri-twitter-fill"></i></a>
                            <a href=""><i class="ri-facebook-fill"></i></a>
                            <a href=""><i class="ri-instagram-fill"></i></a>
                            <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                        </div>
                        </div>
                    </div>
                    </div>

                </div>

                </div>
            </div>

            </div>
        </section> --}}
        <!-- End Team Section -->

      
    @push('script')
    {{-- <script src="{{ asset('src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('src/assets/libs/popper.js/dist/popper.min.js') }}"></script> --}}
    <script src="{{ asset('src/assets/libs/moment/min/moment.min.js') }}"></script>
    <script>
        function displayTime() {
            var time = moment().format('HH:mm:ss');
            $('#clock').html(time);
            setTimeout(displayTime, 1000);
        }

        $(document).ready(function() {
            displayTime();
        });
        
        $('#submit-test').click(function(event) {
            event.preventDefault();
            if( $('#human').val().toLowerCase() !== $("#kodever").html() ) {
                $("#noteHuman").html("try again!");
                $('#exampleModal').modal('hide');
            } else {
                $("#csForm").submit();
            }
        });
        
        $("#modalllll").click(function(){
            let s = (Math.random() + 1).toString(36).substring(2);
            $("#kodever").html(s);
            $('#exampleModal').modal('show');
        });

        $(".hideModal").click(function(){
            $('#exampleModal').modal('hide');
        });
        
    </script>
        
    @endpush
</x-guest-layout>
