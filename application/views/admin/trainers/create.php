<?php $this->load->view('admin/includes/headerStyle'); ?>
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

            <h5 class="card-header spaceB">Təlimçi əlavə edin
                <a href="<?php echo base_url('dashboard_trainers') ?>">
                    <button type="button" class="btn  btn-sm btn-danger">Geri</button>
                </a>
            </h5>

            <div class="table-responsive text-nowrap">
                <div class="card-body">
                    <form action="<?php echo base_url('trainer_create_act'); ?>" method="post"
                        enctype="multipart/form-data">
                        <label for="title">Ad, Soyad</label>
                        <input type="text" id="title" name="name-surname" class="form-control">
                        <br>

                        <label for="description">BİO</label>
                        <textarea name="bio" class="form-control" id="description" cols="30" rows="10"></textarea>
                        <br>

                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="float: left; margin-right: 10px;">
                            <label for="img">Şəkil</label> <br>
                            <small class="text-muted"> Yalnız JPG, JPEG və PNG formatları.
                            </small>
                            <br>
                            <br>
                            <input type="file" id="img" class="form-control" name="trainer_img">
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="float: left;">
                            <br>
                            <button type="submit" class="btn btn-success" style="float: right; margin-bottom: 20px;"><s
                                    style="text-decoration: none; color: white;" class="tf-icons bx bx-edit"></s>&nbsp;
                                    Əlavə et</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
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