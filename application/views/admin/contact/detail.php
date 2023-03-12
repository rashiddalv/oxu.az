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

            <h5 class="card-header spaceB">Təfərrüat
                <a href="<?php echo base_url('dashboard_contact') ?>">
                    <button type="button" class="btn  btn-sm btn-danger">Geri</button>
                </a>
            </h5>

            <!-- <div class="card-body">



                <label for="title"><b>Ad, Soyad, Ata adı</b></label>
                <p>
                    <?php echo $contact_detail['contact_name']; ?>
                </p>
                <label for="descr"><b>E-poçt</b></label>
                <p>
                    <?php echo $contact_detail['contact_email']; ?>
                </p>
                <label for="descr"><b>Başlıq</b></label>
                <p>
                    <?php echo $contact_detail['contact_subject']; ?>
                </p>
                <label for="descr"><b>Müraciət</b></label>
                <p>
                    <?php echo $contact_detail['contact_message']; ?>
                </p>
                <label for="descr"><b>Müraciət tarixi</b></label>
                <p>
                    <?php $orgDate = $contact_detail['contact_date'];
                    $newDate = date("d.m.Y, H:i:s", strtotime($orgDate));
                    echo $newDate; ?>
                </p>
                <label for="descr"><b>Status</b></label>
                <p>
                    <?php echo $contact_detail['contact_status']; ?>
                </p>
                <label for="descr"><b>Müraciətin təsdiqlənmə tarixi</b></label>
                <p>
                    <?php echo $contact_detail['contact_viewed_date']; ?>
                </p>
                <label for="descr"><b>Müraciəti təsdiq edən</b></label>
                <p>
                    <?php if ($contact_detail['contact_viewer_id'] == 0) { ?>
                                                        <?php echo '—';
                    } else { ?>
                                                        <?php echo $admin['a_name'];
                    } ?>
                </p>
 -->
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="title"><b>Ad, Soyad, Ata adı</b></label>
                        <p>
                            <?php echo $contact_detail['contact_name']; ?>
                        </p>
                        <br>
                        <label for="descr"><b>Başlıq</b></label>
                        <p>
                            <?php echo $contact_detail['contact_subject']; ?>
                        </p>
                        <br>
                        <label for="descr"><b>Müraciət tarixi</b></label>
                        <p>
                            <?php $orgDate = $contact_detail['contact_date'];
                            $newDate = date("d.m.Y, H:i:s", strtotime($orgDate));
                            echo $newDate; ?>
                        </p>
                        <br>
                        <label for="descr"><b>Müraciətin təsdiqlənmə tarixi</b></label>
                        <p>
                            <?php echo $contact_detail['contact_viewed_date']; ?>
                        </p>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="descr"><b>E-poçt</b></label>
                        <p>
                            <?php echo $contact_detail['contact_email']; ?>
                        </p>
                        <br>
                        <label for="descr"><b>Müraciət</b></label>
                        <p>
                            <?php echo $contact_detail['contact_message']; ?>
                        </p>
                        <br>
                        <label for="descr"><b>Status</b></label>
                        <p>
                            <?php echo $contact_detail['contact_status']; ?>
                        </p>
                        <br>
                        <label for="descr"><b>Müraciəti təsdiq edən</b></label>
                        <p>
                            <?php if ($contact_detail['contact_viewer_id'] == 0) { ?>
                                <?php echo '—';
                            } else { ?>
                                <?php echo $contact_detail['a_name'];
                            } ?>
                        </p>
                    </div>
                </div>
                <?php if ($admin['a_status'] == "Verified user") { ?>
                    <button data-url="<?php echo base_url('contact_detail_delete/' . $contact_detail['contact_id']) ?>"
                        style="text-decoration: none; color: white; margin-top:20px" type="button"
                        class="btn btn-danger button_remove">
                        <s style="text-decoration:none;" class="tf-icons bx bx-trash"></s>&nbsp; Sil
                    </button>
                <?php } else { ?>
                <?php } ?>
            </div>






            <script>
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
            </script>



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