<x-guest-layout>

  <section id="team" class="team mt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="mb-5" data-aos="fade-right">
            <h2>LABORATORIUM</h2>
            <p>
              Laboratorium ditambang merupakan wadah untuk para mahasiswa tambang dalam menunjang pendidikan maupun riset yang dimana di dalam nya di fasilitasi dengan alat-alat yang bisa membantu dan menunjang mahasiswa tambang dalam merekayasa teori-teori yang di dapat didalam kelas.
            </p>
          </div>
        </div>
      </div>
      <!-- ======= Portfolio Details Section ======= -->
      @foreach($laboratorium as $lab)
      <section id="portfolio-details" class="portfolio-details">
        <div class="container">
          <div class="row gy-4">
            <div class="col-lg-8">
              <div class="portfolio-details-slider swiper-container">
                <div class="swiper-wrapper align-items-center">
                  @foreach($lab->Kegiatan as $item)
                  <div class="swiper-slide">
                    <img src='{{ asset("storage/kegiatan/$item->foto") }}' alt="{{$item->nama}}">
                  </div>
                  @endforeach

                </div>
                <div class="swiper-pagination"></div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="portfolio-info">
                <h3>{{ $lab->nama ?? "-"}}</h3>
                <table>
                  <tr>
                    <td><strong>Periode</strong></td>
                    <td class="px-2">:</td>
                    <td>{{ $lab->periode->tahun ?? "-"}}-{{ $lab->periode->semester ?? "-"}}</td>
                  </tr>
                  <tr>
                    <td><strong>Kepala Lab</strong></td>
                    <td class="px-2">:</td>
                    <td>{{ $lab->kepala_lab ?? "-"}}</td>
                  </tr>
                  <tr>
                    <td class="align-top"><strong>Asisten Lab</strong></td>
                    <td class="align-top px-2">:</td>
                    <td>
                      @foreach(explode(";", $lab->asisten_lab) as $value)
                      {{$value}}<br>
                      @endforeach
                    </td>
                  </tr>
                </table>
              </div>
              <div class="portfolio-description">
                <h2>Deskripsi</h2>
                <p>
                  {{$lab->deskripsi ?? "-"}}
                </p>
              </div>
            </div>

          </div>

        </div>
      </section>
      @endforeach

</x-guest-layout>