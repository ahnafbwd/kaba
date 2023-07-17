@extends('homepage.layouts.main')

@section('container')

    @include('homepage.contact.bread')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div data-aos="fade-up">
          <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="container" data-aos="fade-up">

          <div class="row mt-5">

            <div class="col-lg-4">
              <div class="info">
                <div class="address">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Lokasi:</h4>
                  <p>Depok, Jawa Barat, Indonesia Kode Pos 535022</p>
                </div>

                <div class="email">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>kabaofficial.id@gmail.com</p>
                </div>

                <div class="phone">
                  <i class="bi bi-phone"></i>
                  <h4>hubungi:</h4>
                  <p>+62 858 6550 6289</p>
                </div>

              </div>

            </div>

            <div class="col-lg-8 mt-5 mt-lg-0">

                <div class="my-3">
                    <div class="loading" style="display: none;">Loading</div>
                    <div class="error-message" style="display: none;"></div>
                    <div class="sent-message" style="display: none;">Your message has been sent. Thank you!</div>
                </div>
                <form action="{{ route('contact.submit') }}" method="post" role="form" class="php-email-form">
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
                    <div class="text-center"><button type="submit">Send Message</button></div>
                </form>

            </div>

          </div>

        </div>
      </section><!-- End Contact Section -->

  <script>
    $(document).ready(function() {
        $('.php-email-form').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            var method = form.attr('method');
            var data = form.serialize();

            $.ajax({
                type: method,
                url: url,
                data: data,
                beforeSend: function() {
                    $('.loading').show();
                    $('.error-message').hide();
                    $('.sent-message').hide();
                },
                success: function(response) {
                    $('.loading').hide();
                    $('.sent-message').show().text(response.message);
                    form[0].reset();
                },
                error: function(xhr, status, error) {
                    $('.loading').hide();
                    $('.error-message').show().text('Error: ' + error);
                }
            });
        });
    });
</script>

@endsection
