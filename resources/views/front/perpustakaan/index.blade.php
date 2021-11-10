
<x-guest-layout>
    @push('css')
        <style>
            .img{
                /* width: 100px; */
                height: 200px;
                background-repeat: no-repeat;
                background-attachment: initial;
                background-position: center;
                background-size:cover;
            }
            .img2{
                width: 200px;
                height: 300px;
                background-repeat: no-repeat;
                background-attachment: initial;
                background-position: center;
                background-size:cover;
                border: 1.5px #000 solid;
                border-radius: 5%;
            }
            .card-hover:hover{
                cursor: pointer;
                margin-top: -2%;
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
            .badge{
                color: #000;
            }
            .badge-primary{
                background-color: var(--kuning-telur);
            }
            .list-group-item{
                cursor: pointer;
            }
            .list-group-item:hover{
                opacity: 0.5;
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
                            <h6>Buku Terbaru</h6>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap align-items-center">
                                @foreach ($perpustakaan as $buku)
                                    <div class="col-12 col-md-3 p-1" >
                                        <div class="d-flex flex-row align-items-end card card-hover img" onclick="modalShow('{{$buku->id}}')" style="background-image: url({{asset('storage/perpustakaan/cover/'.$buku->cover)}});">
                                            <p class="text-center w-100"><small class="text-white" style="text-shadow: 1px 1px #000">{{$buku->judul}}</small></p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h6>Kategori</h6>
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
                                    @foreach ($kategori as $item)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{$item->kategori}}
                                      <span class="badge badge-primary">{{$item->total}}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <div class="modal fade bd-example-modal-lg" id="scrollable-modal" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scrollableModalTitle"></h5>
                </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-4">
                                <div class="img2" id="cover" style="background-image: url('{{asset('')}})'"></div>
                            </div>
                            <div class="col-8 bg-light">
                                <h4 id="judulbuku"></h4>
                                <hr>
                                <table class="mb-2">
                                    <tr>
                                        <td><h6>Penulis</h6></td>
                                        <td>:</td>
                                        <td id="penulisbuku"></td>
                                    </tr>
                                    <tr>
                                        <td><h6>Penerbit</h6></td>
                                        <td>:</td>
                                        <td id="penerbitbuku"></td>
                                    </tr>
                                    <tr>
                                        <td><h6>Nomor Panggil </h6></td>
                                        <td>:</td>
                                        <td id="nopanggilbuku"></td>
                                    </tr>
                                </table>
                                <h6>Rigkasan</h6>
                                <p id="ringkasanbuku"></p>
                                </tr>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick='$("#scrollable-modal").modal("hide");' data-dismiss="modal">Tutup</button>
                        <button type="detail" id="bacabuku" class="btn btn-primary">Baca Buku</button>
                    </div>
                </div>
        </div>
    </div>
    @push('script')
        <script>
            function modalShow(id){
                $.ajax({
                    method: "get",
                    url :  `/getdata/${id}/buku/`,
                }).done(function(response)
                {
                    console.log(response);
                    $("#cover").attr('style', `background-image: url('{{asset('')}}storage/perpustakaan/cover/${response.cover}')`);
                    $("#judulbuku").empty();
                    $("#judulbuku").append(response.judul);
                    $("#penulisbuku").empty();
                    $("#penulisbuku").append(response.penulis);
                    $("#penerbitbuku").empty();
                    $("#penerbitbuku").append(response.penerbit);
                    $("#nopanggilbuku").empty();
                    $("#nopanggilbuku").append(response.no_panggil);
                    $("#ringkasanbuku").empty();
                    $("#ringkasanbuku").append(response.ringkasan);

                    $("#bacabuku").attr("onclick", `window.open('{{url('buku')}}/${response.no_panggil}/baca')`);
                });
                $("#scrollable-modal").modal("show");
            }
        </script>
    @endpush
</x-guest-layout>