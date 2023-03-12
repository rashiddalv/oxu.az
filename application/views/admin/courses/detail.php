<?php
// print_r("<pre>");
// print_r($get_all_courses);
// die();
$this->load->view('admin/includes/headerStyle'); ?>
<?php $this->load->view('admin/includes/aside'); ?>
<?php $this->load->view('admin/includes/navbar'); ?>
<style>
    .spaceB {
        display: flex;
        justify-content: space-between;
    }

    .swal2-container {
        z-index: 6000;
    }
</style>

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Basic Bootstrap Table -->
        <div class="card">

            <h5 class="card-header spaceB">Kursun təfərrüatı
                <a href="<?php echo base_url('dashboard_courses') ?>">
                    <button type="button" class="btn  btn-sm btn-danger">Geri</button>
                </a>
            </h5>

            <div class="card-body">



                <label for="title"><b>Kursun adı</b></label>
                <br>
                <p>
                    <?php echo $course_detail['c_title']; ?>
                </p>

                <label for="descr"><b>Təsvir</b></label>
                <p>
                    <?php echo $course_detail['c_description']; ?>
                </p>
                <label for="status"><b>Kursun müddəti</b></label>
                <p>
                    <?php echo $course_detail['c_duration']; ?>
                </p>


                <label for="date"><b>Kateqoriya</b></label>
                <p>
                    <?php echo $course_detail['c_category']; ?>
                </p>



                <label for="cate"><b>Təlimçinin adı və soyadı</b></label>
                <p>
                    <?php echo $course_detail['c_trainer']; ?>
                </p>


                <label for="status"><b>Qiymət</b></label>
                <p>
                    <?php echo "$" . $course_detail['c_price']; ?>
                </p>

                <label for="status"><b>Yaradıcı</b></label>
                <p>
                    <?php echo $course_detail['a_name']; ?>
                </p>



                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="float: left; margin:0px">
                    <label for="img"><b>Şəkil</b></label>
                    <br>
                    <br>
                    <?php if ($course_detail['c_img']) { ?>
                        <img data-enlargable width="90%" height="auto" style="object-fit: cover;"
                            src="<?php echo base_url('uploads/courses/' . $course_detail['c_img']); ?>" alt="">
                    <?php } else { ?>
                        <img width="90%" height="auto" style="object-fit: cover;"
                            src="<?php echo base_url('assets/admin/assets/img/elements/no-img.jpg'); ?>" alt="">
                    <?php } ?>

                    <?php if ($admin['a_status'] == "Verified user") { ?>
                        <a href="<?php echo base_url('course_edit/' . $course_detail['c_id']); ?>"
                            style="text-decoration: none; color: white; margin-top:20px" type="button"
                            class="btn btn-warning">
                            <s style="text-decoration:none;" class="tf-icons bx bx-edit"></s>&nbsp; Redaktə et
                        </a>
                    <?php } else { ?>
                    <?php } ?>



                    <?php if ($course_detail['c_img']) { ?>
                        <a href="<?php echo base_url('uploads/courses/' . $course_detail['c_img']); ?>"
                            download="<?php echo $course_detail['c_img'] ?>"
                            style="text-decoration: none; color: white; margin-top:20px" type="button"
                            class="btn btn-primary">
                            <s style="text-decoration:none;" class="tf-icons bx bx-download"></s>&nbsp; Şəkli yüklə
                        </a>
                    <?php } ?>
                    <!-- <a onclick="return confirm('Are you sure?')" href="<?php echo base_url('delete_course_detail/' . $course_detail['c_id']); ?>"
                    style="text-decoration: none; color: white; margin-top:20px" type="button" class="btn btn-danger">
                    <s style="text-decoration:none;" class="tf-icons bx bx-trash"></s>&nbsp; Delete
                </a> -->

                    <?php if ($admin['a_status'] == "Verified user") { ?>
                        <button data-url="<?php echo base_url('delete_course_detail/' . $course_detail['c_id']); ?>"
                            style="text-decoration: none; color: white; margin-top:20px" type="button"
                            class="btn btn-danger button_remove">
                            <s style="text-decoration:none;" class="tf-icons bx bx-trash"></s>&nbsp; Sil
                        </button>

                    <?php } else { ?>
                    <?php } ?>
                </div>
                <!-- <a href="<?php echo base_url('course_edit/' . $course_detail['c_id']); ?>"
                    style="text-decoration: none; color: white; margin-top:20px" type="button" class="btn btn-warning">
                    <s style="text-decoration:none;" class="tf-icons bx bx-edit"></s>&nbsp; Edit
                </a> -->





                <!-- <script>
                    $('img[data-enlargable]').addClass('img-enlargable').click(function () {
                        var src = $(this).attr('src');
                        $('<div>').css({
                            background: 'RGBA(0,0,0,.5) url(' + src + ') no-repeat center',
                            backgroundSize: 'contain',
                            width: '100%', height: '100%',
                            position: 'fixed',
                            zIndex: '10000',
                            top: '0', left: '0',
                            cursor: 'zoom-out'
                        }).click(function () {
                            $(this).remove();
                        }).appendTo('body');
                    });
                </script> -->



            </div>


            <!-- ======================SWEERALERT====================== -->
            <script src="<?php echo base_url('assets/admin'); ?>/assets/js/sweet_alert_2.js"></script>
            <script>
                $(document).ready(function () {

                    $(".button_remove").click(function () {
                        // e.preventDefault();    // href-e getmemesi ucun.
                        $data_url = $(this).data("url");
                        Swal.fire({
                            title: 'Silmək istədiyinizə əminsiniz?',
                            text: "Siləcəyiniz məlumatı bərpa edə bilməyəcəksiniz.",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Bəli, sil',
                            cancelButtonText: 'Xeyr, silmə',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = $data_url;
                            }
                        })
                    })


                    // Swal.fire({
                    //     title: 'Error!',
                    //     text: 'Do you want to continue',
                    //     icon: 'error',
                    //     confirmButtonText: 'Cool'
                    // })





                })
            </script>
            <!-- ======================SWEERALERT====================== -->

            <!-- ===========================FLASHDATA=========================== -->
            <?php if ($this->session->flashdata('err')) { ?>
                <div class="bs-toast toast toast-placement-ex m-2 fade bg-danger bottom-0 end-0 show" role="alert"
                    aria-live="assertive" aria-atomic="true" data-delay="2000">
                    <div class="toast-header">
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body"><i class="bx bx-bell me-2"></i>
                        <?php echo $this->session->flashdata('err'); ?>
                    </div>
                </div>
            <?php } ?>
            <?php if ($this->session->flashdata('success')) { ?>
                <div class="bs-toast toast toast-placement-ex m-2 fade bg-success bottom-0 end-0 show" role="alert"
                    aria-live="assertive" aria-atomic="true" data-delay="2000">
                    <div class="toast-header">
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body"><i class="bx bx-bell me-2"></i>
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                </div>
            <?php } ?>
            <!-- ===========================FLASHDATA=========================== -->

            <?php $this->load->view('admin/includes/footerStyle'); ?>