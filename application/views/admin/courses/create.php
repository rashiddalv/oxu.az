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

            <h5 class="card-header spaceB">Kurs yaradın
                <a href="<?php echo base_url('dashboard_courses') ?>">
                    <button type="button" class="btn  btn-sm btn-danger">Geri</button>
                </a>
            </h5>

            <div class="table-responsive text-nowrap">
                <div class="card-body">
                    <form action="<?php echo base_url('course_create_act'); ?>" method="post"
                        enctype="multipart/form-data">
                        <label for="title">Kursun adı</label>
                        <input type="text" id="title" name="title" class="form-control">
                        <br>

                        <label for="description">Təsvir</label>
                        <textarea name="description" class="form-control" id="description" cols="30"
                            rows="10"></textarea>
                        <br>



                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="float: left; margin-right: 10px;">
                            <label for="category">Kateqoriya</label>
                            <select name="category" id="category" class="form-control">
                                <option value="">-SELECT-</option>
                                <?php foreach ($get_all_categories as $item) { ?>
                                    <option value="<?php echo $item['category_name']; ?>"><?php echo $item['category_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="float: left; margin-right: 10px;">
                            <label for="status">Təlimçi</label>
                            <select name="trainer" id="status" class="form-control">
                                <option value="">-SELECT-</option>
                                <?php foreach ($get_all_trainers as $item) { ?>
                                    <option value="<?php echo $item['t_name']; ?>"><?php echo $item['t_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="float: left; margin-right: 10px;">
                            <label for="img">Şəkil</label>
                            <input type="file" id="img" class="form-control" name="course_img">
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" style="float: left;">
                            <label for="price">Qiymət</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">$</span>
                                <input id="price" name="price" type="text" class="form-control" placeholder="100"
                                    aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-text">.00</span>
                            </div>
                            <br>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="float: left; margin-right: 10px;">
                            <label for="duration">Kursun müddəti</label>
                            <input type="text" id="duration" name="duration" class="form-control" placeholder="5 Ay/2 Saat" value="Ay/ Saat">
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="float: left;">
                            <br>
                            <button type="submit" class="btn btn-success"
                                style="float: right; margin-bottom: 20px;">Yarat</button>
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