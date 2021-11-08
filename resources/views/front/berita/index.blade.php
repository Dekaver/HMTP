@push('css')
    <style>
        body,
        #team {
            background-color: var(--City-light);
        }

        .member {
            background-color: #fff;
        }

        .berita-isi {
            background: #fff !important;
            border-radius: 10px !important;
            border: 0.1px solid rgba(0, 0, 0, 0.120);
        }

        .berita-foto {
            background-repeat: no-repeat;
            background-attachment: initial;
            background-position: center;
            background-size: cover;
            height: 100px;
            border-radius: 10% !important;
        }

        .card {
            position: relative;
            box-shadow: 0px 2px 15px rgb(0 0 0 / 10%);
            padding: 30px;
            border-radius: 10px;
            text-align: center;
        }



        .news-image {
            /* top: 2; */
            position: relative;
            cursor: pointer;
            width: 80%;
            height: 100%;
            /* float: r; */
        }

        .news-image img {
            width: 100%;
            /* display: block; */
            margin-left: auto;
            margin-right: auto;
        }

        figcaption ul {
            list-style-type: none;
        }

        figcaption ul li {
            color: white;
        }

        .title-activity {
            position: relative;
            left: -4px !important;
        }

        .news-description-text {
            text-align: justify;
        }

        .another-news .card {
            position: relative;
            right: -12.4px !important;
        }

        .title-location {
            position: relative;
            left: -2px !important;
        }



        .image-description {
            /* display: block; */
            width: 80%;
            background: rgba(0, 0, 0, 0.295);
            /* float: right; */
            position: absolute;
            bottom: 0;
            margin-left: auto;
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.2s, visibility 0.2s;
        }

        .news-image:hover>.image-description {
            visibility: visible;
            opacity: 1;
        }

        #content-news p img {
            padding-top: 1rem;
            padding-bottom: 1rem;
            padding-right: 1rem;
            width: 25rem !important;
            float: left;
        }

        @media only screen and (max-width: 488px) {
            #content-news p img {
                width: 100% !important;
            }
        }

    </style>
@endpush
<x-guest-layout>
    <section id="team" class="team mt-5">
        <div class="container">

            <div class="card">
                <div class="col-lg-12 text-center">
                    <div class="" data-aos="fade-right">
                        <h2>{{ $berita->judul }}</h2>
                        <p>Admin|{{ $berita->created_at->isoFormat('DD MMMM, Y') }}</p>
                    </div>
                </div>
            </div>
            <div class="row content-berita mt-2">
                <div class="col-lg-4 ">
                    <div class="card bg-black">
                        <div class="card-body">
                            <div class="bg-white card-header fw-bolder fs-3" style="margin-top: -1.6rem !important; color:#ff9f1a">
                                Berita lainnya
                            </div>
                            @foreach ($semuaberita as $item)
                                @if ($item != $berita)
                                    <div class="row m-2">
                                        <div class="col-3 berita-foto"
                                            style="background-image: url({{ url("storage/berita/$item->foto") }})">
                                        </div>
                                        <div class="col-9 text-start">
                                            <h5>{{ $item->judul }}</h5>
                                            <small class="text-muted"><span>Post :
                                                </span>{{ $item->created_at->isoFormat('DD MMMM, Y') }}</small>
                                            <a href="{{ route('berita.show', $item->id) }}"><button class="btn btn-warning" style="border-radius: 1.5rem; font-size:0.9rem; color:white; background-color:#ff9f1a;">Selengkapnya>></button></a>
                                        </div>
                                    </div>
                                    <hr>
                                    {{-- <div>
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold">Rapat Hokage 2</h5>
                                            <h6 class="card-subtitle mb-2 text-muted">Posted - Selasa, 96-96-9999</h6>
                                            <img style="width: 50%;"
                                                    src="{{ asset('storage/berita/' . $item->foto) }}" alt="">
                                            <a href="#" class="card-link btn btn-primary">Selengkapnya</a>
                                        </div>
                                        <hr>
                                    </div> --}}
                                @endif
                            @endforeach
                            <div class="col-lg-12 d-flex justify-content-center mt-5 bg-white rounded-lg">
                                <div class="row align-item-center ">
                                    {{ $semuaberita->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="shadow rounded berita-isi" style="overflow:hidden">
                        <div class="d-flex justify-content-center align-items-center mt-3">
                            <figure class="news-image">
                                <img class="shadow rounded" src="{{ asset('storage/berita/' . $berita->foto) }}"
                                    alt="">
                                <figcaption class="image-description p-2">
                                    <ul>
                                        <li class="fw-bold">{{$berita->judul}}</li>
                                        <li>{{$berita->created_at->isoFormat('DD MMMM, Y')}}</li>
                                    </ul>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="publisher ps-3 pe-3 mt-3 row">
                            <div class="col" style="max-width: 6vw">
                                <img style="width: 4vw; margin-right: 1vw"
                                    src="{{ asset('assets/img/publisher.png') }}" alt="">
                            </div>
                            <div class="col align-items-center" style="margin-left: -25px">
                                <h5 class="mt-2 card-title fw-bold text-primary">Erza Bawu</h5>
                                <h6 class="card-subtitle mb-2 text-muted"><i
                                        class="fas fa-location-arrow me-4"></i>Balikpapan
                                </h6>
                                <h6 class="card-subtitle mb-2 text-muted"><i
                                        class="fas fa-calendar-day me-4"></i>{{ $berita->created_at->isoFormat('DD MMMM, Y') }}</h6>
                            </div>
                            <hr>
                        </div>
                        <div id="content-news" class="content-news ps-3 pe-3" style="text-align: justify !important">

                            {!! $berita->isi !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });

            // var span = $("#content-news > p > img");
            // console.log(span);
        </script>
    @endpush
</x-guest-layout>
