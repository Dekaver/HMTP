@push('css')
    <style>
        table {
  font-family: Verdana;
  font-size: 14px;
  border-collapse: collapse;
  width: 600px;
}

td, th {
  padding: 10px;
  text-align: left;
  margin: 0;
}

tbody tr:nth-child(2n){
  background-color: #eee;
}

th {
  position: sticky;
  top: 0;
  background-color: #333;
  color: white;
}
body, #team{
    background-color: var(--City-light);
}

.member{
    background-color: #fff;
}
</style>
@endpush
<x-guest-layout>
    <section id="team" class="team mt-5">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="mb-5" data-aos="fade-right">
                        <h2>{{$berita->judul}}</h2>
                        <p>Admin|{{$berita->created_at->isoFormat("DD MMMM, Y")}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 ">
                    <div class="card ">
                        <div class="card-body">

                            @foreach ($semuaberita as $item)
                                <div class="col">
                                    <div class="member" data-aos="zoom-in" data-aos-delay="400">
                                        <div class="pic"><img src="Bethany/assets/img/team/team-4.jpg" class="img-fluid" alt=""></div>
                                        <div class="member-info">
                                            <h4>{{$item->judul}}</h4>
                                            <span>{{$item->posisi}}</span>
                                            <p>{{$item->deskripsi}}</p>
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
                            <div class="col-lg-12 d-flex justify-content-center mt-5 bg-white rounded-lg">
                                <div class="row align-item-center ">
                                    {{$semuaberita->links()}}
                                </div>
                            </div>                
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row member">
                            {!! $berita->isi !!}
                    </div>
                </div>
            </div>

        
            

        </div>
    </section>

    @push('scripts')
        <script>
            $(document).ready( function () {
            $('#myTable').DataTable();
        } );
        </script>
    @endpush
</x-guest-layout>