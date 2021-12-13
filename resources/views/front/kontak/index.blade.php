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
      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact mt-5 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-4" data-aos="fade-right">
                    <div class="section-title">
                        <h2>Contact</h2>
                        <p>Temukan kami di google maps dan berikan kritik dan saran kepada kami untuk menjadi lebih baik</p>
                    </div>
                </div>

                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                        <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m3!3m2!1m1!1s0x2df67f4cd30823c3%3A0x22ec6237d9bbdba1" frameborder="0" allowfullscreen></iframe>

                    </div>
                    <div class="info mt-4">
                        <i class="bi bi-geo-alt"></i>
                        <h4>Location:</h4>
                        <p>Jl. Sambaliung, Sempaja Sel., Kec. Samarinda Utara, Kota Samarinda, Kalimantan Timur 75242, Indonesia</p>
                    </div>

                    <form action="forms/contact" id="csForm" method="post" role="form" class="php-email-form mt-4">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit" id="modalllll">Send Message</button></div>
                    </form>
                </div>
            </div>

        </div>
    </section><!-- End Contact Section -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="alertdialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are You Human?</h5>
                    
                    <span class="btn hideModal p-0"><i class="bx bx-x h3 p-0 text-danger"></i></span>
                </div>
                <div class="modal-body">
                    <p>Masukkan Kode Berikut "<span id="kodever"></span>"</p>
                    <div class="form-group">
                        <label for="human" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control" id="human" required>
                        <small class="text-danger" id="noteHuman"></small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary hideModal">Close</button>
                    <button type="button" id="submit-test" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            $(document).ready( function () {
            $('#myTable').DataTable();
        } );
        </script>
    @endpush
</x-guest-layout>