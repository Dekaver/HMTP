
<x-guest-layout>
    <section id="team" class="team mt-5">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="mb-5" data-aos="fade-right">
                        <h2>PERPUSTAKAAN</h2>
                        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem.</p>
                    </div>
                </div>
            </div>

            {{-- <div class="col-lg-12">
                <div class="row">

                    @foreach ($alumni as $item)
                    <div class="col-lg-3 mt-4">
                        <div class="member" data-aos="zoom-in" data-aos-delay="400">
                            <div class="pic"><img src="Bethany/assets/img/team/team-4.jpg" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>{{$item->nama}}</h4>
                                <span>{{$item->pekerjaan}}</span>
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
                    @endforeach                    

                </div>
            </div> --}}

            {{-- <div class="col-lg-12">
                <div class="row"> --}}

                    <table id="myTable" class="col-lg-12 mt-4" >
                        <thead class="mt-5">
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Pekerjaan</th>
                            <th>Alamat</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($perpustakaan as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->pekerjaan}}</td>
                                    <td>{{$item->alamat}}</td>
                                </tr>                              
                            @endforeach                  
                        </tbody>
                      </table>  

        </div>
    </section>

</x-guest-layout>