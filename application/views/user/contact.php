<?php $this->load->view('user/includes/headerStyle'); ?>
<?php $this->load->view('user/includes/header'); ?>
<style>
  .page__title-overlay::after {
    position: absolute;
    content: "";
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 3, 32, 0.6);
  }

  .page__title-overlay {
    position: relative;
  }

  .page__title-height {
    min-height: 450px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }

  .align-items-center {
    align-items: center !important;
  }

  .d-flex {
    display: flex !important;
  }

  .page__title-wrapper {
    position: relative;
    z-index: 1;
  }

  .mt-110 {
    margin-top: 110px;
  }

  .page__title {
    font-size: 70px;
    color: #ffffff;
    line-height: 62px;
    margin-bottom: 0;
  }

  .breadcrumb {
    display: flex;
    flex-wrap: wrap;
    padding: 0 0;
    margin-bottom: 1rem;
    list-style: none;
  }

  .page__title-wrapper .breadcrumb {
    margin-bottom: 0;
  }

  .page__title-wrapper .breadcrumb .breadcrumb-item a {
    font-size: 15px;
    font-weight: 400;
    color: #ffffff;
  }

  @media screen and (max-width: 414px) {
    .page__title {
      font-size: 53px;
    }
  }
</style>
<main id="main">



  <section class="page__title-area page__title-height page__title-overlay d-flex align-items-center"
    data-background="https://img1.teletype.in/files/45/78/4578beaa-4779-425d-871c-85db435de3b9.jpeg"
    style="background-image: url(https://img1.teletype.in/files/45/78/4578beaa-4779-425d-871c-85db435de3b9.jpeg)">
    <div class="container">
      <div class="row">
        <div class="col-xxl-12">
          <div class="page__title-wrapper mt-110">
            <h3 class="page__title">Bizimlə əlaqə saxlayın</h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('index') ?>">Ana səhifə</a></li>
                <li class="breadcrumb-item active" aria-current="page">Əlaqə</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- ======= Breadcrumbs ======= -->
  <!-- <div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
      <h2 style="font-size: 50px; font-weight: 900;">Bizimlə əlaqə saxlayın</h2>
    </div>
  </div> -->
  <!-- End Breadcrumbs -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div data-aos="fade-up">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d957.2470203764116!2d49.82888864314344!3d40.385143461986594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307d9bdc74118b%3A0xc8377414faa8f86b!2sSTIMUL%20Education%20%26%20Consulting!5e0!3m2!1sru!2saz!4v1678382311983!5m2!1sru!2saz"
        width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="container" data-aos="fade-up">

      <div class="row mt-5">

        <div class="col-lg-4">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Məkan:</h4>
              <p>Bakı şəhəri
                AZ1065, Cəfər Cabbarlı 44
                Caspian Plaza, korpus 3, mərtəbə 10,</p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>E-poçt:</h4>
              <p>office@stimul.az</p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Zəng:</h4>
              <p>+994 (50) 661 01 17</p>
            </div>

          </div>

        </div>

        <div class="col-lg-8 mt-5 mt-lg-0">
          <!-- ===========================FLASHDATA=========================== -->
          <?php if ($this->session->flashdata('err')) { ?>
            <div class="bs-toast toast toast-placement-ex m-2 fade bg-danger bottom-0 end-0 show" role="alert"
              aria-live="assertive" aria-atomic="true" data-delay="2000">
              <div style="color: white" class="toast-body"><i class="bx bx-bell me-2"></i>
                <?php echo $this->session->flashdata('err'); ?>
              </div>
            </div>
          <?php } ?>
          <?php if ($this->session->flashdata('success')) { ?>
            <div class="bs-toast toast toast-placement-ex m-2 fade bg-success bottom-0 end-0 show" role="alert"
              aria-live="assertive" aria-atomic="true" data-delay="2000">
              <div style="color: white" class="toast-body"><i class="bx bx-bell me-2"></i>
                <?php echo $this->session->flashdata('success'); ?>
              </div>
            </div>
          <?php } ?>
          <!-- ===========================FLASHDATA=========================== -->
          <form action="<?php echo base_url('contact_send_act'); ?>" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Ad və soyad" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="E-poçtunuz" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Mövzu" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Müraciət" required></textarea>
            </div>
            <div class="my-3">
              <!-- <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div> -->
            </div>
            <button class="btn btn-success" type="submit">Göndər</button>
          </form>

        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->

<?php $this->load->view('user/includes/footer'); ?>
<?php $this->load->view('user/includes/footerStyle'); ?>