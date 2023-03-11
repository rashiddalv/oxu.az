<?php $this->load->view('user/includes/headerStyle'); ?>
<?php $this->load->view('user/includes/header'); ?>
<style>
  .img-fluid {
    max-width: 700px;
  }

  .course-details h3 {
    margin-top: 0px;
  }

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
    data-background="https://code.edu.az/wp-content/uploads/2021/10/talant-merkezi.jpeg"
    style="background-position: bottom ;background-image: url(https://code.edu.az/wp-content/uploads/2021/10/talant-merkezi.jpeg)">
    <div class="container">
      <div class="row">
        <div class="col-xxl-12">
          <div class="page__title-wrapper mt-110">
            <h3 class="page__title">Müəllimin təfərrüatları</h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('index') ?>">Ana səhifə</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Müəllimin təfərrüatları</li>
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
      <h2 style="font-size: 50px; font-weight: 900;">Kursun təfərrüatları</h2>
    </div>
  </div> -->
  <!-- End Breadcrumbs -->

  <!-- ======= Cource Details Section ======= -->
  <section id="course-details" class="course-details">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-1">
        </div>
        <div class="col-lg-5">
          <?php if ($trainer_details['t_img']) { ?>
            <img class="rounded" style="object-fit: cover;" height="416px" width="416px"
              src="<?php echo base_url('uploads/trainers/' . $trainer_details['t_img']) ?>" class="img-fluid" alt="...">
          <?php } else { ?>
            <img class="rounded" height="416px" width="416px" style="object-fit: cover;"
              src="https://icon-library.com/images/no-user-image-icon/no-user-image-icon-27.jpg" class="img-fluid"
              alt="...">
          <?php } ?>

        </div>

        <div class="col-lg-5">

          <h3>
            <?php echo $trainer_details['t_name'] ?>
          </h3>
          <p>
            <?php echo $trainer_details['t_about'] ?>
          </p>


        </div>
        <div class="col-lg-1">
        </div>
      </div>

    </div>
  </section><!-- End Cource Details Section -->

  <!-- ======= Cource Details Tabs Section =======
  <section id="cource-details-tabs" class="cource-details-tabs">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-3">
          <ul class="nav nav-tabs flex-column">
            <li class="nav-item">
              <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Modi sit est</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Unde praesentium sed</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Pariatur explicabo vel</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Nostrum qui quasi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Iusto ut expedita aut</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-9 mt-4 mt-lg-0">
          <div class="tab-content">
            <div class="tab-pane active show" id="tab-1">
              <div class="row">
                <div class="col-lg-8 details order-2 order-lg-1">
                  <h3>Architecto ut aperiam autem id</h3>
                  <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a
                    videna mareta paulona marka</p>
                  <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa
                    odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil.
                    Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2">
                  <img src="<?php echo base_url('assets/user/'); ?>assets/img/course-details-tab-1.png" alt="" class="img-fluid">
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab-2">
              <div class="row">
                <div class="col-lg-8 details order-2 order-lg-1">
                  <h3>Et blanditiis nemo veritatis excepturi</h3>
                  <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a
                    videna mareta paulona marka</p>
                  <p>Ea ipsum voluptatem consequatur quis est. Illum error ullam omnis quia et reiciendis sunt sunt est.
                    Non aliquid repellendus itaque accusamus eius et velit ipsa voluptates. Optio nesciunt eaque beatae
                    accusamus lerode pakto madirna desera vafle de nideran pal</p>
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2">
                  <img src="<?php echo base_url('assets/user/'); ?>assets/img/course-details-tab-2.png" alt="" class="img-fluid">
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab-3">
              <div class="row">
                <div class="col-lg-8 details order-2 order-lg-1">
                  <h3>Impedit facilis occaecati odio neque aperiam sit</h3>
                  <p class="fst-italic">Eos voluptatibus quo. Odio similique illum id quidem non enim fuga. Qui natus
                    non sunt dicta dolor et. In asperiores velit quaerat perferendis aut</p>
                  <p>Iure officiis odit rerum. Harum sequi eum illum corrupti culpa veritatis quisquam. Neque
                    necessitatibus illo rerum eum ut. Commodi ipsam minima molestiae sed laboriosam a iste odio. Earum
                    odit nesciunt fugiat sit ullam. Soluta et harum voluptatem optio quae</p>
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2">
                  <img src="<?php echo base_url('assets/user/'); ?>assets/img/course-details-tab-3.png" alt="" class="img-fluid">
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab-4">
              <div class="row">
                <div class="col-lg-8 details order-2 order-lg-1">
                  <h3>Fuga dolores inventore laboriosam ut est accusamus laboriosam dolore</h3>
                  <p class="fst-italic">Totam aperiam accusamus. Repellat consequuntur iure voluptas iure porro quis
                    delectus</p>
                  <p>Eaque consequuntur consequuntur libero expedita in voluptas. Nostrum ipsam necessitatibus aliquam
                    fugiat debitis quis velit. Eum ex maxime error in consequatur corporis atque. Eligendi asperiores
                    sed qui veritatis aperiam quia a laborum inventore</p>
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2">
                  <img src="<?php echo base_url('assets/user/'); ?>assets/img/course-details-tab-4.png" alt="" class="img-fluid">
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab-5">
              <div class="row">
                <div class="col-lg-8 details order-2 order-lg-1">
                  <h3>Est eveniet ipsam sindera pad rone matrelat sando reda</h3>
                  <p class="fst-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.</p>
                  <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae ut non quam ut quod
                    eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati sed est sint aut vitae molestiae
                    voluptate vel</p>
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2">
                  <img src="<?php echo base_url('assets/user/'); ?>assets/img/course-details-tab-5.png" alt="" class="img-fluid">
                </div>
              </div>
            </div>
          </div>
        </div> -->
  </div>

  </div>
  </section><!-- End Cource Details Tabs Section -->

</main><!-- End #main -->
<?php $this->load->view('user/includes/footer'); ?>
<?php $this->load->view('user/includes/footerStyle'); ?>