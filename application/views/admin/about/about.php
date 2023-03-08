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
</style>
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Basic Bootstrap Table -->
        <div class="card">

            <h5 class="card-header spaceB">Haqqımızda
            </h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Başlıq</th>
                                <th>Şəkil</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            <?php
                            foreach ($get_about as $item) {
                                ?>
                                <tr>
                                    <td><strong>
                                            <?php
                                            // $title = mb_strimwidth($item['b_title'], 0, 20, '...');
                                            echo $item['b_title'] ?>
                                        </strong>
                                    </td>

                                    <td>
                                        <?php if ($item['b_img']) { ?>
                                            <img data-enlargable width="auto" height="200px"
                                                style="cursor: pointer; object-fit: cover;"
                                                src="<?php echo base_url('uploads/about/' . $item['b_img']); ?>" alt="">
                                        <?php } else { ?>
                                            <img width="120px" height="70px" style="object-fit: cover;"
                                                src="<?php echo base_url('assets/admin/assets/img/elements/no-img.jpg'); ?>"
                                                alt="">
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a style="color: #03C3EC;" class="dropdown-item"
                                                    href="<?php echo base_url('about_detail/' . $item['b_id']); ?>"><i
                                                        class="bx bx-detail me-1"></i> Təfərrüatlar</a>

                                                <?php if ($admin['a_status'] == "Verified user") { ?>
                                                    <a style="color: #FFAB00;" class="dropdown-item"
                                                        href="<?php echo base_url('about_edit/' . $item['b_id']); ?>"><i
                                                            class="bx bx-edit-alt me-1"></i> Redaktə et</a>
                                                <?php } else { ?>
                                                    <a style="color: #8592A3;cursor: not-allowed;" class="dropdown-item"><i
                                                            class="bx bx-edit-alt me-1"></i> Redaktə et</a>
                                                <?php } ?>

                                            </div>




                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
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
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- ======================SWEERALERT====================== -->
            <!-- <script src="<?php echo base_url('assets/admin'); ?>/assets/js/sweet_alert_2.js"></script>
        <script>
            $(document).ready(function(){
                $(".button_remove").click(function(e){
                e.preventDefault(); 
                $url = $(this).data("url");

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = $url;
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }
                    })
                })
            })
        </script> -->
            <!-- ======================SWEERALERT====================== -->

            <!-- ===========================FLASHDATA=========================== -->
            <?php if ($this->session->flashdata('err')) { ?>
                <div class="bs-toast toast toast-placement-ex m-2 fade bg-danger bottom-0 end-0 show" role="alert"
                    aria-live="assertive" aria-atomic="true" data-delay="20">
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
                    aria-live="assertive" aria-atomic="true" data-delay="20">
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