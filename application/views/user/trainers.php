<?php $this->load->view('user/includes/headerStyle'); ?>
<?php $this->load->view('user/includes/header'); ?>

<main id="main" data-aos="fade-in">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="container">
      <h2 style="font-size: 50px; font-weight: 900;">Müəllimlərimiz</h2>
    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Trainers Section ======= -->
  <section id="trainers" class="trainers">
    <div class="container" data-aos="fade-up">

      <div class="row" data-aos="zoom-in" data-aos-delay="100">

        <?php foreach ($get_all_trainers as $item) { ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <!-- <img src="<?php echo base_url('uploads/trainers/' . $item['t_img']) ?>" class="img-fluid" alt=""> -->

              <?php if ($item['t_img']) { ?>
                <img style="object-fit: cover;" height="290px" width="416px"
                  src="<?php echo base_url('uploads/trainers/' . $item['t_img']) ?>" class="img-fluid" alt="...">
              <?php } else { ?>
                <img height="290px" width="416px" style="object-fit: cover;"
                  src="https://icon-library.com/images/no-user-image-icon/no-user-image-icon-27.jpg" class="img-fluid" alt="...">
              <?php } ?>

              <div class="member-content">
                <h4><?php echo $item['t_name']; ?></h4>
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