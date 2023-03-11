<?php $this->load->view('user/includes/headerStyle'); ?>
<?php $this->load->view('user/includes/header'); ?>
<style>
  /* .show {
    display: flex;
  }
  .box {
    display: none !important;
  } */
  button,
  ::after,
  ::before,
  .transition-3 {
    -webkit-transition: all 0.3s ease-out 0s;
    -moz-transition: all 0.3s ease-out 0s;
    -ms-transition: all 0.3s ease-out 0s;
    -o-transition: all 0.3s ease-out 0s;
    transition: all 0.3s ease-out 0s;
  }

  .course-item {
    margin-bottom: 30px;
  }

  .category {
    margin-bottom: 10px;
  }

  .course__menu button:hover,
  .course__menu button.active {
    background: transparent !important;
    padding: 5px 10px !important;
    border-radius: 3px !important;
    color: #2b4eff !important;
    margin: 5px 0px !important;
    border: 1px solid #2b4eff !important;
  }

  .course__menu button {
    font-size: 16px;
    font-weight: 500;
    color: #0e1133;
    background: transparent;
    text-transform: capitalize;
    position: relative;
  }

  .filterMenu_design {
    background: #696CFF !important;
    padding: 5px 10px !important;
    border-radius: 3px !important;
    color: white !important;
    margin: 5px 0px !important;
    border: 1px solid #696CFF !important;
  }

  .img-fluid {
    max-width: 100%;
    height: 290px;
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
</style>

<main id="main" data-aos="fade-in">


  <section class="page__title-area page__title-height page__title-overlay d-flex align-items-center"
    data-background="https://code.edu.az/wp-content/uploads/2022/04/korporativ-heller-1024x637.jpg"
    style="background-image: url(https://code.edu.az/wp-content/uploads/2022/04/korporativ-heller-1024x637.jpg)">
    <div class="container">
      <div class="row">
        <div class="col-xxl-12">
          <div class="page__title-wrapper mt-110">
            <h3 class="page__title">Kurslar</h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('index') ?>">Ana səhifə</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kurslar</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- ======= Breadcrumbs ======= -->
  <!-- <div class="breadcrumbs">
    <div class="container">
      <h2 style="font-size: 50px; font-weight: 900;">Kurslar</h2>
    </div>
  </div> -->
  <!-- End Breadcrumbs -->
  <br>


  <div class="col-xxl-12 col-xl-12 col-lg-12">
    <div class="course__menu d-flex justify-content-lg-end mb-60" data-aos="fade-up"
      style="display: flex!important; align-items: center!important;justify-content: center!important; text-align: center;">
      <div class="masonary-menu filter-button-group">
        <button class="filterMenu_design categories active">Bütün kurslarımız</button>
        <?php $num = 0;
        foreach ($get_all_categories as $category) {
          $num++ ?>
          <button class="filterMenu_design categories">
            <?php echo $category['category_name']; ?>
          </button>
        <?php } ?>
      </div>
    </div>
  </div>




  <!-- <section id="features" class="features">
    <div class="container" data-aos="fade-up">

      <div class="row" data-aos="zoom-in" data-aos-delay="100">
        <?php foreach ($get_all_categories as $category) { ?>
          <div class="col-lg-3 col-md-4 category">
            <div class="icon-box">
              <i class="ri-bar-chart-box-line" style="color: #696CFF;"></i>
              <h3><a href=""><?php echo $category['category_name']; ?></a></h3>
            </div>
          </div>
        <?php } ?>
      </div>

    </div>
  </section> -->
  <!-- End Features Section -->
  <!-- ======= Courses Section ======= -->
  <section id="courses" class="courses">
    <div class="container" data-aos="fade-up">

      <div id="cont" class="row" data-aos="zoom-in" data-aos-delay="100">
        <?php foreach ($get_all_courses as $item) { ?>
          <div data-category="<?php echo $item['c_category']; ?>" style="display: flex;"
            class="col-lg-4 col-md-6 align-items-stretch">
            <div class="course-item rounded-card">
              <?php if ($item['c_img']) { ?>
                <img class="rounded" style="object-fit: cover;" height="290px" width="100%"
                  src="<?php echo base_url('uploads/courses/' . $item['c_img']) ?>" class="" alt="...">
              <?php } else { ?>
                <img class="rounded" height="290px" width="100%" style="object-fit: cover;"
                  src="<?php echo base_url('assets/admin/assets/img/elements/no-img.jpg'); ?>" class="" alt="...">
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
                    <?php $title = mb_strimwidth($item['c_title'], 0, 35, "...");
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
          </div>
          <!-- End Course Item-->
        <?php } ?>
                
      </div>
    </div>
  </section>
  <!-- End Courses Section -->
</main>
<!-- End #main -->
<script>

  let x = document.querySelector('#cont')
  document.querySelectorAll('.categories').forEach(function (e) {
    e.addEventListener('click', function () {
      // console.log(e.textContent)
      document.querySelectorAll('.categories').forEach(function (b) {
        b.classList.remove('active')
      })
      e.classList.add('active')

      for (let y of x.children) {
        if (e.textContent.trim() == 'Bütün kurslarımız') {
          $(y).show(300)
          continue
        }
        if (y.dataset.category != e.textContent.trim()) {
          $(y).hide(300)
        } else {
          $(y).show(300)

        }
      }
    })
  })

  // document.querySelector("#allcourses").addEventListener('click', function () {
  //   for (let y of x.children) {
  //     $(y).show(300)
  //   }
  // })


</script>

<?php $this->load->view('user/includes/footer'); ?>
<?php $this->load->view('user/includes/footerStyle'); ?>