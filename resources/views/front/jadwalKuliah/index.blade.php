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
                        <p>{{$jadwalkuliah->deskripsi}}</p>
                    </div>
                </div>
            </div>
            

            <figure class="col-lg-12 text-center border-1">
                <img src="{{asset('storage/jadwal/'.$jadwalkuliah->foto)}}" width="100%" alt="Jadwal kuliah">
            </figure>

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