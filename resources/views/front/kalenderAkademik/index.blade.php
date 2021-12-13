@push('css')
@endpush
<x-guest-layout>
    <section id="team" class="team mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="mb-5" data-aos="fade-right">
                        <h2>KALENDER AKADEMIK</h2>
                        <p>Kalender Akademik Adalah kalender yang dibuat untuk agenda selama 2 semester atau 1 tahun </p>
                    </div>
                </div>
            </div>

            <embed src='{{ asset("storage/kalender/$kalenderAkademik->foto") }}#toolbar=0' width="100%" height="1000" type="application/pdf">



        </div>
    </section>

    @push('script')
        <script>
            $(document).ready( function () {
                $('#myTable').DataTable();
                // $("#toolbarViewerRight").empty();
                // document.getElementById("toolbarViewerRight");
            } );

        </script>

    @endpush

</x-guest-layout>