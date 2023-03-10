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

            <h5 class="card-header spaceB">Təlimçilər
                <!-- <a href="<?php echo base_url('trainer_create') ?>">
                    <button type="button" class="btn  btn-sm btn-success">Add</button>
                </a> -->
                <?php if($admin['a_status'] == "Verified user"){ ?>
                    <a href="<?php echo base_url('trainer_create') ?>">
                    <button type="button" class="btn btn-sm btn-success">Əlavə et</button>
                    </a>
                <?php }else{ ?>
                    <a href="" style="cursor: not-allowed;"> 
                    <button type="button" class="btn btn-sm btn-danger" disabled>Əlavə et</button>
                    </a>
                <?php } ?>
                
            </h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Ad, Soyad</th>
                                <th>BİO</th>
                                <th>Şəkil</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            <?php $news_amount = 0;
                            foreach ($get_all_trainers as $item) {
                                $news_amount++ ?>
                                <tr>
                                    <td>
                                        <?php echo $news_amount; ?>
                                    </td>
                                    <td><?php echo $item['t_name']; ?></td>
                                    <td><?php 
                                    $about = mb_strimwidth($item['t_about'], 0, 70, '...');
                                    echo $about ?></td>
                                    <td>
                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                                class="avatar avatar-xl pull-up" title="<?php echo $item['t_name']; ?>">
                                                <!-- <img style="object-fit:cover;" src="<?php echo base_url('uploads/trainers/'. $item['t_img']) ?>" alt="<?php echo $item['t_img']; ?>"
                                                    class="rounded-circle" /> -->
                                                    <?php if($item['t_img']){ ?>
                                                        <img style="object-fit:cover;" src="<?php echo base_url('uploads/trainers/'. $item['t_img']) ?>" alt="<?php echo $item['t_img']; ?>"
                                                    class="rounded-circle" />
                                                    <?php }else{ ?>
                                                    <img style="object-fit:cover;" class="rounded-circle" src="https://icon-library.com/images/no-user-image-icon/no-user-image-icon-27.jpg" alt="">
                                                    <?php } ?>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a style="color: #03C3EC;" class="dropdown-item" href="<?php echo base_url('trainer_detail/'.$item['t_id']) ?>"><i
                                                        class="bx bx-detail me-1"></i> Təfərrüatlar</a>


                                                <!-- <a style="color: #FFAB00;" class="dropdown-item" href="<?php echo base_url('trainer_edit/'.$item['t_id']);?>"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a> -->
                                                        <?php if($admin['a_status'] == "Verified user"){ ?>
                                                            <a style="color: #FFAB00;" class="dropdown-item" href="<?php echo base_url('trainer_edit/'.$item['t_id']);?>"><i
                                                        class="bx bx-edit-alt me-1"></i> Redaktə et</a>
                                                        <?php }else{ ?>
                                                            <a style="color: #8592A3; cursor:not-allowed;" class="dropdown-item"><i
                                                        class="bx bx-edit-alt me-1" disabled></i> Redaktə et</a>
                                                        <?php } ?>




                                                <!-- <a style="color: red;" onclick="return confirm('Are you sure?')" class="dropdown-item button_remove" href="<?php echo base_url('trainer_delete/'.$item['t_id']);?>"><i
                                                        class="bx bx-trash me-1"></i> Delete</a> -->
                                                        <?php if($admin['a_status'] == "Verified user"){ ?>
                                                            <button style="color: red;" class="dropdown-item button_remove" data-url="<?php echo base_url('trainer_delete/'.$item['t_id']);?>"><i
                                                        class="bx bx-trash me-1"></i> Sil</button>
                                                        <?php }else{ ?>
                                                            <a style="color: #8592A3; cursor:not-allowed;" class="dropdown-item "><i
                                                        class="bx bx-trash me-1" disabled></i> Sil</a>
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
         <script src="<?php echo base_url('assets/admin'); ?>/assets/js/sweet_alert_2.js"></script>
        <script>
           $(document).ready(function(){

            $(".button_remove").click(function(){
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