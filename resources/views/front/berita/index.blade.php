@push('css')
    <style>


body, #team{
    background-color: var(--City-light);
}

.member{
    background-color: #fff;
}

.berita-foto{
    background-repeat: no-repeat;
    background-attachment: initial;
    background-position: center;
    background-size: cover;
    height: 100px;
    border-radius: 10% !important;
}
.card{
    position: relative;
    box-shadow: 0px 2px 15px rgb(0 0 0 / 10%);
    padding: 30px;
    border-radius: 10px;
    text-align: center;
}
</style>
@endpush
<x-guest-layout>
    <section id="team" class="team mt-5">
        <div class="container">

            <div class="card">
                <div class="col-lg-12 text-center">
                    <div class="" data-aos="fade-right">
                        <h2>{{$berita->judul}}</h2>
                        <p>Admin|{{$berita->created_at->isoFormat("DD MMMM, Y")}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 ">
                    <div class="card bg-black">
                        <div class="card-body">
                            @foreach ($semuaberita as $item)
                                @if ($item != $berita)
                                    <div class="row m-2">
                                        <div class="col-9">
                                            <h5><a href="{{route('berita.show', $item->id)}}">{{ $item->judul}}</a></h5>
                                            <small><span>Post : </span>{{$item->created_at->isoFormat("DD MMMM, Y")}}</small>
                                        </div>
                                        <div class="col-3 berita-foto"  style="background-image: url({{url("storage/berita/$item->foto")}})">
                                            
                                        </div>
                                    </div>
                                    <hr>
                                @endif
                            @endforeach    
                            <div class="col-lg-12 d-flex justify-content-center mt-5 bg-white rounded-lg">
                                <div class="row align-item-center ">
                                    {{$semuaberita->links()}}
                                </div>
                            </div>                
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="member">
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