<?php $this->load->view('user/includes/headerStyle'); ?>
<?php $this->load->view('user/includes/header'); ?>

<style>
  .img-fluid {
    max-width: 100%;
    height: 290px;
  }

  .why-us .content {
    padding: 30px;
    background: #696CFF;
    border-radius: 4px;
    color: #fff;
    background: rgb(105, 108, 255);
    background: linear-gradient(135deg, rgba(105, 108, 255, 1) 0%, rgba(50, 54, 255, 1) 100%);
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

  #hero {
    width: 100%;
    height: 80vh;
    background: url("<?php echo base_url('assets/user/assets') ?>/img/hero_bg.jpg") top center;
    position: relative;
    background-repeat: no-repeat;
    background-attachment: scroll;
    background-size: cover;
  }

  /* @media (min-width: 1024px) { */
    #hero {
      background-attachment: fixed;
    }
  /* } */
</style>


<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex justify-content-center align-items-center">
  <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
    <h1> «<span style="color: #8789FF;">Technest</span>» Təqaüd <br> proqramına start verildi</h1>
    <h2>Son qeydiyyat tarixi: 10.02.23</h2> <br>
    <a href="https://technest.idda.az/" target="_blank" class="btn-get-started">Ətraflı</a>
  </div>
</section><!-- End Hero -->

<main id="main">

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
          <h3 style="font-size: 46px">Platforma haqqında.</h3>
          <p class="fst-italic">
            Oxu.az-ın missiyası hazırda hər kəsin aktual və axtarılan mütəxəssis olmasını təmin etməkdir. Yaşından və
            coğrafiyasından asılı olmayaraq. Peşəkar və şəxsi inkişaf üçün geniş kurslar təklif edirik.
            Məşhur sahələrdə 64 kurs. Sizin üçün uyğun olanı tapın.
          </p>
          <ul>
            <li><i class="bi bi-check-circle"></i> 64 kurs.</li>
            <li><i class="bi bi-check-circle"></i> 15 təlimçi.</li>
            <li><i class="bi bi-check-circle"></i> 641 696 istifadəçi.
            </li>
          </ul>

        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
          <img width="100%"
            src="https://248006.selcdn.ru/main/iblock/c83/c83c05208e60b854a8a98ea6cf7b81d0/0acef8cc77fbbca00f551f3749b58e86.jpg"
            alt="">
        </div>
      </div>
    </div>
  </section><!-- End About Section -->


  <!-- ======= Why Us Section ======= -->
  <section id="why-us" class="why-us">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-4 d-flex align-items-stretch">
          <div class="content rounded">
            <h3>Niyə Oxu.az təhsil platformasını seçməlisiniz?</h3>
            <p>
              İsrail Azərbaycan Təlim Mərkəzi istiqamətini IT sahəsi üzrə dəyişmək istəyən gənclər və universitet
              tələbələri üçün ödənişsiz təlimlər həyata keçirir. Tədris Mərkəzində Full Stack, UI/UX, QA, Mobile
              Development, Data Science, DevOps, CCNA, Big Data və s. istiqamətdə təlimlər tədris olunur. Təlimlər
              istiqamətlərdən asılı...
            </p>
            <div class="text-center">
              <a href="<?php echo base_url('about') ?>" class="more-btn">Daha ətraflı <i
                  class="bx bx-chevron-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-boxes d-flex flex-column justify-content-center">
            <div class="row">
              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0 rounded">
                  <i class="bx bx-receipt"></i>
                  <h4>№1</h4>
                  <p>Smart Ranking-ə görə təhsilin keyfiyyətinə görə</p>
                </div>
              </div>
              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0 rounded">
                  <i class="bx bx-cube-alt"></i>
                  <h4>24/7</h4>
                  <p>Dünyanın istənilən yerindən istənilən cədvəllə təhsil alın</p>
                </div>
              </div>
              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0 rounded">
                  <i class="bx bx-images"></i>
                  <h4>93%</h4>
                  <p>Kurs məzunları deyir ki, Skillbox onlara məqsədlərinə çatmağa kömək edib</p>
                </div>
              </div>
            </div>
          </div><!-- End .content-->
        </div>
      </div>

    </div>
  </section><!-- End Why Us Section -->

  <!-- ======= Features Section ======= -->
  <!-- <section id="features" class="features">
    <div class="container" data-aos="fade-up">

      <div class="row" data-aos="zoom-in" data-aos-delay="100">
        <div class="col-lg-3 col-md-4">
          <div class="icon-box">
            <i class="ri-store-line" style="color: #ffbb2c;"></i>
            <h3><a href="">Lorem Ipsum</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
          <div class="icon-box">
            <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
            <h3><a href="">Dolor Sitema</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
          <div class="icon-box">
            <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
            <h3><a href="">Sed perspiciatis</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
          <div class="icon-box">
            <i class="ri-paint-brush-line" style="color: #e361ff;"></i>
            <h3><a href="">Magni Dolores</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-database-2-line" style="color: #47aeff;"></i>
            <h3><a href="">Nemo Enim</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-gradienter-line" style="color: #ffa76e;"></i>
            <h3><a href="">Eiusmod Tempor</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
            <h3><a href="">Midela Teren</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-price-tag-2-line" style="color: #4233ff;"></i>
            <h3><a href="">Pira Neve</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-anchor-line" style="color: #b2904f;"></i>
            <h3><a href="">Dirada Pack</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-disc-line" style="color: #b20969;"></i>
            <h3><a href="">Moton Ideal</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-base-station-line" style="color: #ff5828;"></i>
            <h3><a href="">Verdo Park</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-fingerprint-line" style="color: #29cc61;"></i>
            <h3><a href="">Flavor Nivelanda</a></h3>
          </div>
        </div>
      </div>

    </div>
  </section> -->
  <!-- End Features Section -->

  <!-- ======= Popular Courses Section ======= -->
  <section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Kurslar</h2>
        <p>Məşhur Kurslarımız</p>
      </div>

      <div class="row" data-aos="zoom-in" data-aos-delay="100">
        <?php foreach ($get_3_courses as $item) { ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item rounded-card">
              <?php if ($item['c_img']) { ?>
                <a href="<?php echo base_url('course_details/' . $item['c_id']) ?>">
                  <img class="rounded" style="object-fit: cover;" height="290px" width="416px"
                    src="<?php echo base_url('uploads/courses/' . $item['c_img']) ?>" class="img-fluid" alt="..."></a>
              <?php } else { ?>
                <a href="<?php echo base_url('course_details/' . $item['c_id']) ?>">
                  <img class="rounded" height="290px" width="416px" style="object-fit: cover;"
                    src="<?php echo base_url('assets/admin/assets/img/elements/no-img.jpg'); ?>" class="img-fluid"
                    alt="..."></a>
              <?php } ?>
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>
                    <?php echo $item['c_category']; ?>
                  </h4>
                  <span>
                    <?php echo $item['c_duration']; ?>
                  </span>
                </div>

                <h3><a href="<?php echo base_url('course_details/' . $item['c_id']) ?>">
                    <?php
                    $title = mb_strimwidth($item['c_title'], 0, 35, "...");
                    echo $title; ?>
                  </a></h3>
                <p>
                  <?php
                  $description = mb_strimwidth($item['c_description'], 0, 100, "...");
                  echo $description; ?>
                </p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="<?php echo base_url('uploads/trainers/' . $item['t_img']) ?>" class="" alt="">
                    <span>
                      <?php echo $item['c_trainer']; ?>
                    </span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <p style="font-size: 24px" class="price">
                      <?php echo '$' . $item['c_price']; ?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->
        <?php } ?>
      </div>

    </div>
  </section><!-- End Popular Courses Section -->


</main><!-- End #main -->


<?php $this->load->view('user/includes/footer'); ?>
<?php $this->load->view('user/includes/footerStyle'); ?>