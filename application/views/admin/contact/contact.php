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

            <h5 class="card-header spaceB">Müraciətlər
            </h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="example" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Ad, Soyad, Ata adı</th>
                                <th>E-poçt</th>
                                <th>Başlıq</th>
                                <th>Müraciət tarixi</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php $news_amount = 0;
                            foreach ($get_all_contact as $item) {
                                $news_amount++ ?>
                                <tr>
                                    <td>
                                        <?php echo $news_amount; ?>
                                    </td>
                                    <td>
                                        <?php echo $item['contact_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $item['contact_email']; ?>
                                    </td>
                                    <td>
                                        <?php echo $item['contact_subject']; ?>
                                    </td>
                                    <td>
                                    <?php $orgDate = $item['contact_date'];
                                    $newDate = date("d.m.Y, H:i:s", strtotime($orgDate));
                                    echo $newDate;   ?>
                                    </td>
                                    <td><?php echo $item['contact_status']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url('contact_detail/' . $item['contact_id']); ?>">
                                            <button type="button" class="btn btn-sm btn-outline-primary">Təfərrüatlar</button>
                                        </a>


                                        <!-- <button type="button" class="btn btn-sm btn-outline-warning">Baxılıb</button> -->
                                <?php if($admin['a_status'] == "Verified user"){ ?>
                                        <?php if($item['contact_status'] == "Müraciət cavablandırılmayıb"){ ?>
                                        <a href="<?php echo base_url('contact_detail_viewed/'.$item['contact_id']) ?>"
                                        style="text-decoration: none; color: white; margin-top:20px" type="button">
                                        <button type="button" class="btn btn-sm btn-outline-success">Baxılıb</button>
                                        </a>
                                        <?php }else{ ?>
                                        <a href="<?php echo base_url('contact_detail_not_viewed/'.$item['contact_id']) ?>"
                                        style="text-decoration: none; color: white; margin-top:20px" type="button">
                                        <button type="button" class="btn btn-sm btn-outline-danger">Baxılışı ləğv et</button>
                                        </a>
                                        <?php } ?>


                                        
                                        
                                            <button data-url="<?php echo base_url('contact_detail_delete/'.$item['contact_id']) ?>" type="button" class="btn btn-sm btn-outline-danger button_remove">Sil</button>
                                <?php }else {?>
                                    <?php if($item['contact_status'] == "Müraciət cavablandırılmayıb"){ ?>
                                        <a style="cursor: not-allowed" 
                                        style="text-decoration: none; color: white; margin-top:20px" type="button">
                                        <button disabled type="button" class="btn btn-sm btn-outline-success">Baxılıb</button>
                                        </a>
                                        <?php }else{ ?>
                                        <a style="cursor: not-allowed; "
                                        style="text-decoration: none; color: white; margin-top:20px" type="button">
                                        <button style="color: #8592A3;" disabled type="button" class="btn btn-sm btn-outline-dark">Baxılışı ləğv et</button>
                                        </a>
                                        <?php } ?>


                                        
                                        
                                        <a style="cursor: not-allowed">
                                            <button style="color: #8592A3;" disabled type="button" class="btn btn-sm btn-outline-dark">Sil</button>
                                        </a>
                                <?php }?>


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
                <!-- <script>
                    $(document).ready(function () {
                     $('#example').DataTable({
                         order: [[3, 'acs']],
                     });
                    });
                </script>
  <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script> -->
            
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