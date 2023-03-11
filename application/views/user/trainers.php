<?php $this->load->view('user/includes/headerStyle'); ?>
<?php $this->load->view('user/includes/header'); ?>
<style>
  .teacher {
    transition: all 0.3s ease-out 0s;
  }

  .teacher:hover {
    transform: scale(1.03);
    transition: all 0.3s ease-out 0s;

  }

  .rounded {
    border-radius: 20px !important;
  }

  .rounded-card {
    border-top-right-radius: 20px !important;
    border-top-left-radius: 20px !important;
    transition: all 0.3s ease-out 0s;
  }

  .rounded-card:hover {
    -webkit-box-shadow: 0px 5px 10px 2px rgba(34, 60, 80, 0.2);
    -moz-box-shadow: 0px 5px 10px 2px rgba(34, 60, 80, 0.2);
    box-shadow: 0px 5px 10px 2px rgba(34, 60, 80, 0.2);
  }

  /* .breadcrumbs {
    height: 450px !important;
  }

  .overlay::after {
    position: absolute;
    content: "";
    left: 0;
    top: 0;
    width: 100%;
    height: 450px;
    background: rgba(0, 3, 32, 0.6);
    z-index: 1;
  }

  .text {
    z-index: 100;
  } */
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
      font-size: 45px;
    }
  }
</style>
<main id="main" data-aos="fade-in">





  <section class="page__title-area page__title-height page__title-overlay d-flex align-items-center"
    data-background="https://2022.code.edu.az/wp-content/uploads/2021/09/code-academy-bg.jpeg"
    style="background-image: url(https://2022.code.edu.az/wp-content/uploads/2021/09/code-academy-bg.jpeg)">
    <div class="container">
      <div class="row">
        <div class="col-xxl-12">
          <div class="page__title-wrapper mt-110">
            <h3 class="page__title">Müəllimlərimiz</h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('index') ?>">Ana səhifə</a></li>
                <li class="breadcrumb-item active" aria-current="page">Müəllimlərimiz</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>






  <!-- ======= Breadcrumbs ======= -->
  <!-- <div class="overlay">
    <div class="breadcrumbs"
      style="background-image: url(<?php echo base_url('assets/user') ?>/assets/img/Cover5.png);">
      <div class="container text">
        <h2 style="font-size: 50px; font-weight: 900;">Müəllimlərimiz</h2>
      </div>
    </div>
  </div> -->
  <!-- End Breadcrumbs -->

  <!-- ======= Trainers Section ======= -->
  <section id="trainers" class="trainers">
    <div class="container" data-aos="fade-up">

      <div class="row" data-aos="zoom-in" data-aos-delay="100">

        <?php foreach ($get_all_trainers as $item) { ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch teacher">
            <div class="member rounded-card">
              <!-- <img src="<?php echo base_url('uploads/trainers/' . $item['t_img']) ?>" class="img-fluid" alt=""> -->

              <?php if ($item['t_img']) { ?>
                <a href="<?php echo base_url('trainer_details/' . $item['t_id']) ?>">
                  <img style="object-fit: cover;" height="290px" width="416px"
                    src="<?php echo base_url('uploads/trainers/' . $item['t_img']) ?>" class="img-fluid rounded"
                    alt="..."></a>
              <?php } else { ?>
                <a href="<?php echo base_url('trainers_details/' . $item['t_id']) ?>">
                  <img height="290px" width="416px" style="object-fit: cover;"
                    src="https://icon-library.com/images/no-user-image-icon/no-user-image-icon-27.jpg"
                    class="img-fluid rounded" alt="..."></a>
              <?php } ?>

              <div class="member-content">
                <h4>
                  <?php echo $item['t_name']; ?>
                </h4>
                <span>Müəllim</span>
                <p>
                  <?php
                  $description = mb_strimwidth($item['t_about'], 0, 100, "...");
                  echo $description; ?>
                </p>
              </div>
            </div>
          </div>
        <?php } ?>


      </div>

    </div>
  </section><!-- End Trainers Section -->

</main><!-- End #main -->

<?php $this->load->view('user/includes/footer'); ?>
<?php $this->load->view('user/includes/footerStyle'); ?>