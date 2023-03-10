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
</style>

<main id="main" data-aos="fade-in">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="container">
      <h2 style="font-size: 50px; font-weight: 900;">Kurslar</h2>
    </div>
  </div><!-- End Breadcrumbs -->
  <br>


  <div class="col-xxl-12 col-xl-12 col-lg-12">
    <div class="course__menu d-flex justify-content-lg-end mb-60"
      style="display: flex!important; align-items: center!important;justify-content: center!important; text-align: center;">
      <div class="masonary-menu filter-button-group">
        <button class="filterMenu_design" data-filter="*">Bütün kurslarımız</button>
        <?php foreach ($get_all_categories as $category) { ?>
          <button onclick="filterObjects('all')" class="filterMenu_design" data-filter="">
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

      <div class="row" data-aos="zoom-in" data-aos-delay="100">
        <?php foreach ($get_all_courses as $item) { ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <?php if ($item['c_img']) { ?>
                <img style="object-fit: cover;" height="290px" width="416px"
                  src="<?php echo base_url('uploads/courses/' . $item['c_img']) ?>" class="img-fluid" alt="...">
              <?php } else { ?>
                <img height="290px" width="416px" style="object-fit: cover;"
                  src="<?php echo base_url('assets/admin/assets/img/elements/no-img.jpg'); ?>" class="img-fluid" alt="...">
              <?php } ?>
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>
                    <?php echo $item['c_category']; ?>
                  </h4>
                  <p class="price">
                    <?php echo $item['c_price'] . '$'; ?>
                  </p>
                </div>

                <h3><a href="<?php echo base_url('course_details/'.$item['c_id']) ?>">
                    <?php echo $item['c_title']; ?>
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
                    <i class="bx bx-user"></i>&nbsp;50
                    &nbsp;&nbsp;
                    <i class="bx bx-heart"></i>&nbsp;65
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->

        <?php } ?>
        <script>
          function(event) {
            $(this).siblings('.active').removeClass('active');
            $(this).addClass('active');
            event.preventDefault();
          }
        </script>
        <!-- ===============FILTER=============== -->
        <!-- <script>
  filterObjects("all");
  function filterObjects(c){
    var x, i;
    x = document.getElementsByClassName("box");
    if (c == 'all') c = "";
    for (i = 0; i < x.length; i++){
      removeClass(x[i], 'show');
      if(x[i].className.indexOf(c) > -1) addClass(x[i], 'show')
    }
  }
  function addClass(element, name){
    var i, arr1, arr2;
    arr1 = element.className.split('');
    arr2 = name.split('');
    for (i = 0; i < arr2.length; i++){
      if (arr1.indexOf(arr2[i]) == -1){
        element.className += " " + arr2[i]
      }
    }
  }
  function removeClass(element, name){
    var i, arr1, arr2;
    arr1 = element.className.split('');
    arr2 = name.split('');
    for (i = 0; i < arr2.length; i++){
      while (arr1.indexOf(arr2[i]) > -1){
        arr1.splice(arr1.indexOf(arr2[i]), 1);
      }
    }
    element.className = arr1.join(" ");
  }
</script> -->
        <!-- ===============FILTER=============== -->

      </div>

    </div>
  </section><!-- End Courses Section -->

</main><!-- End #main -->

<?php $this->load->view('user/includes/footer'); ?>
<?php $this->load->view('user/includes/footerStyle'); ?>