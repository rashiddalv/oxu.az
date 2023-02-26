 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top">
   <div class="container d-flex align-items-center">

     <h1 class="logo me-auto"><a href="<?php echo base_url('index') ?>">OXU.az</a></h1>
     <!-- Uncomment below if you prefer to use an image logo -->
     <!-- <a href="index.html" class="logo me-auto"><img src="<?php echo base_url('assets/user/'); ?>assets/img/logo.png" alt="" class="img-fluid"></a>-->

     <nav id="navbar" class="navbar order-last order-lg-0">
       <ul>
         <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index') ?>">Home</a></li>
         <li class="nav-item"><a class="nav-link" href="<?php echo base_url('about') ?>">About</a></li>
         <li class="nav-item"><a class="nav-link" href="<?php echo base_url('courses') ?>">Courses</a></li>
         <li class="nav-item"><a class="nav-link" href="<?php echo base_url('trainers') ?>">Trainers</a></li>

         <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->


         <li class="nav-item"><a class="nav-link" href="<?php echo base_url('contact') ?>">Contact</a></li>
       </ul>
       <i class="bi bi-list mobile-nav-toggle"></i>
     </nav><!-- .navbar -->

     <!-- <a href="courses.html" class="get-started-btn">Get Started</a> -->

   </div>
 </header><!-- End Header -->

 <script>
   document.querySelectorAll(".nav-link").forEach((link) => {
     if (link.href === window.location.href) {
       link.classList.add("active");
       link.setAttribute("aria-current", "page");
     }
   });
 </script>