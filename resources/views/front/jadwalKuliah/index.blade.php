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
#myTable_filter,#myTable_wrapper{
    margin-bottom: 24px;
}
</style>
@endpush
<x-guest-layout>
    <section id="team" class="team mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="mb-5" data-aos="fade-right">
                        <h2>JADWAL KULIAH</h2>
                        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem.</p>
                    </div>
                </div>
            </div>
            

            {{-- <figure class="col-lg-12 text-center">
                <img src="{{asset('storage/struktur-organisasi/'.$fotoJadwal->foto)}}" alt="X Box One S">
            </figure>


                    <table id="myTable" class="col-lg-12 mt-4" >
                        <thead class="mt-5">
                          <tr>
                            <th>No</th>
                            <th>Deskripsi</th>
                            <th>Semester</th>
                            <th>Tahun</th>
                            <th>File Jadwal</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwalKuliah as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->deskripsi}}</td>
                                    <td>{{$item->periode->semester}}</td>
                                    <td>{{$item->periode->tahun}}</td>
                                    <td>
                                       <a href="{{asset('storage/struktur-organisasi/'.$item->foto)}}" download=""> Download </a>
                                    </td>
                                </tr>                              
                            @endforeach                  
                        </tbody>
                    </table>   --}}



        </div>
    </section>

    @push('script')
        <script>
            $(document).ready( function () {
            $('#myTable').DataTable();
        } );
        </script>
    @endpush
</x-guest-layout>