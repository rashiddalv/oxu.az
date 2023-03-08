<?php $this->load->view('admin/includes/headerStyle'); ?>
<?php $this->load->view('admin/includes/aside'); ?>
<?php $this->load->view('admin/includes/navbar'); ?>
<style>
    .spaceB {
        display: flex;
        justify-content: space-between;
    }

    .ck-editor__editable_inline {
        min-height: 200px;
    }
</style>
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Basic Bootstrap Table -->
        <div class="card">

            <h5 class="card-header spaceB">Redaktə et
                <a href="<?php echo base_url('dashboard_about') ?>">
                    <button type="button" class="btn  btn-sm btn-danger">Geri</button>
                </a>
            </h5>

            <div class="table-responsive text-nowrap">
                <div class="card-body">
                    <form action="<?php echo base_url('about_edit_act/' . $get_about['b_id']); ?>" method="post"
                        enctype="multipart/form-data">
                        <label for="title">Başlıq</label>
                        <input type="text" id="title" name="title" class="form-control"
                            value="<?php echo $get_about['b_title']; ?>">
                        <br>

                        <label for="description">Təsvir</label>
                        <!-- <div id="textarea-edit"></div>
                        <script>
                            CKEDITOR.config.contentsCss = 'contents_b.css'; 
                            ClassicEditor
                            
                                .create(document.querySelector('#textarea-edit'))
                                .catch(error => {
                                    console.error(error);
                                }) ;
                        </script>
    -->
                        <textarea name="description" class="form-control" id="description" cols="30"
                            rows="10"><?php echo $get_about['b_description']; ?></textarea>
                        <br>


                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9" style="float: left; margin:0px">
                            <label for="img">Şəkil</label>
                            <br>
                            <?php if ($get_about['b_img']) { ?>
                                <img class="rounded" data-enlargable width="auto" height="300px"
                                    style="object-fit: cover; margin-bottom: 20px;"
                                    src="<?php echo base_url('uploads/about/' . $get_about['b_img']); ?>" alt="">
                            <?php } else { ?>
                                <img width="120px" height="70px" style="object-fit: cover; margin-bottom: 20px;"
                                    src="https://icon-library.com/images/no-user-image-icon/no-user-image-icon-27.jpg" alt="">
                            <?php } ?>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="float: left; margin-right: 10px;">
                            <input type="file" id="img" class="form-control" name="about_img">
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="float: left;">
                            <br>
                            <button type="submit" class="btn btn-success" style="float: right; margin-bottom: 20px;"><s
                                    style="text-decoration: none; color: white;" class="tf-icons bx bx-edit"></s>&nbsp;Yadda saxla</button>
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