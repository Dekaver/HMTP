
<x-guest-layout>
    @push('css')
        <style>
            .img{
                height: 80px;
                background-repeat: no-repeat;
                background-attachment: initial;
                background-position: center;
                background-size:cover;
            }
            .card-hover:hover{
                cursor: pointer;
                opacity: 0.7;
            }
            #search .search-input{
                width: 85%;
            }
            #search .search-button{
                height: 40px;
                border-top-left-radius: 0;
                border-bottom-left-radius: 0;
                padding: 10px;
                cursor: pointer;
                background-color: var(--kuning-telur);
            }

            #search .search-button:hover{
                background-color: var(--radiant-yellow);
            }
            .card .card-header{
                background-image: linear-gradient(var(--radiant-yellow), var(--kuning-telur));
            }
        </style>
    @endpush
    <section id="team" class="team mt-5">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="mb-5" data-aos="fade-right">
                        <h2>PERPUSTAKAAN</h2>
                        <p>Menyediakan berbagai Ebook</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="p-1 col-8">
                    <div class="card">
                        <div class="card-header">
                            <h6>{{$buku->judul}}</h6>
                        </div>
                        <div class="card-body">
                            <embed src="{{asset("storage/perpustakaan/file/$buku->file")}}#toolbar=0" type="application/pdf" width="100%" height="800px">
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h6>Buku Lainnya</h6>
                        </div>
                        <div class="card-body">
                            <div id="search">
                                <form action="" method="post">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="query" placeholder="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                          <i class="bx bx-search input-group-text search-button" id="basic-addon2" onclick="this.parentElement.parentElement.parentElement.submit()"></i>
                                        </div>
                                      </div>
                                </form>
                            </div>
                            <div class="">
                                <ul class="list-group">
                                    <div class="card-deck">
                                    @foreach ($perpustakaan as $item)
                                        <div class="card card-hover" onclick='window.open("{{url("buku/{$item->no_panggil}/baca")}}")'>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-3 p-2">
                                                        <div class="img" style="background-image:url({{asset("storage/perpustakaan/cover/$item->cover")}});"></div>
                                                    </div>
                                                    <div class="col-9">
                                                        <h4 class="card-title">{{$item->judul}}</h4>
                                                        <p class="card-text">{{$item->no_panggil}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    {{$perpustakaan->links()}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>