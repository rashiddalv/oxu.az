<?php $this->load->view('admin/includes/headerStyle'); ?>
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

    .ck-editor__editable_inline {
        min-height: 200px;
    }
</style>
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Basic Bootstrap Table -->
        <div class="card">

            <h5 class="card-header spaceB">Kursu redaktə edin
                <a href="<?php echo base_url('dashboard_courses') ?>">
                    <button type="button" class="btn  btn-sm btn-danger">Geri</button>
                </a>
            </h5>

            <div class="table-responsive text-nowrap">
                <div class="card-body">
                    <form action="<?php echo base_url('course_edit_act/' . $get_single_data['c_id']); ?>" method="post"
                        enctype="multipart/form-data">
                        <label for="title">Kursun adı</label>
                        <input type="text" id="title" name="title" class="form-control"
                            value="<?php echo $get_single_data['c_title']; ?>">
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
                            rows="10"><?php echo $get_single_data['c_description']; ?></textarea>
                        <br>



                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"
                            style="float: left; margin-right: 10px; margin-bottom: 15px;">
                            <label for="category">Kateqoriya</label>
                            <select name="category" id="category" class="form-control">
                                <option <?php if ($get_single_data['c_category'] == "") {
                                    echo "SELECTED";
                                } ?> value="">
                                    -SELECT-</option>
                                <option <?php if ($get_single_data['c_category'] == "Programming") {
                                    echo "SELECTED";
                                } ?>
                                    value="Programming">Programming</option>
                                <option <?php if ($get_single_data['c_category'] == "Languages") {
                                    echo "SELECTED";
                                } ?>
                                    value="Languages">Languages</option>
                                <option <?php if ($get_single_data['c_category'] == "Office programs") {
                                    echo "SELECTED";
                                } ?> value="Office programs">Office programs</option>

                                <option <?php if ($get_single_data['c_category'] == "Sales & Marketing") {
                                    echo "SELECTED";
                                } ?> value="Sales & Marketing">Sales & Marketing</option>

                                <option <?php if ($get_single_data['c_category'] == "Call Center Training") {
                                    echo "SELECTED";
                                } ?> value="Call Center Training">Call Center Training</option>

                                <option <?php if ($get_single_data['c_category'] == "Retail Training") {
                                    echo "SELECTED";
                                } ?> value="Retail Training">Retail Training</option>

                            </select>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"
                            style="float: left; margin-right: 10px; margin-bottom: 15px;">
                            <label for="status">Təlimçi</label>
                            <select name="trainer" id="status" class="form-control">
                                <?php foreach ($get_all_trainers as $item) { ?>
                                    <option <?php if ($item['t_name'] == $get_single_data['c_trainer']) {
                                        echo "SELECTED";
                                    } ?> value="<?php echo $item['t_name']; ?>"><?php echo $item['t_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"
                            style="float: left; margin-right: 10px;margin-bottom: 15px;">
                            <label for="price">Qiymət</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">$</span>
                                <input id="price" name="price" type="text" class="form-control" placeholder="100"
                                    aria-label="Amount (to the nearest dollar)"
                                    value="<?php echo $get_single_data['c_price']; ?>">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"
                            style="float: left; margin-right: 10px;margin-bottom: 15px;">
                            <label for="duration">Kursun müddəti</label>
                            <input type="text" id="duration" name="duration" class="form-control"
                                placeholder="5 Ay/1 Saat" value="<?php echo $get_single_data['c_duration']; ?>">
                        </div>

                        <br>
                        <br>
                        <br>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9" style="float: left; margin:0px">
                            <label for="img">Şəkil</label>
                            <br>
                            <?php if ($get_single_data['c_img']) { ?>
                                <img data-enlargable width="80%" height="auto"
                                    style="object-fit: cover; margin-bottom: 20px;"
                                    src="<?php echo base_url('uploads/courses/' . $get_single_data['c_img']); ?>" alt="">
                            <?php } else { ?>
                                <img width="80%" height="auto" style="object-fit: cover; margin-bottom: 20px;"
                                    src="<?php echo base_url('assets/admin/assets/img/elements/no-img.jpg'); ?>" alt="">
                            <?php } ?>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="float: left; margin-right: 10px;">
                            <input type="file" id="img" class="form-control" name="course_img">
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="float: left;">
                            <br>
                            <button type="submit" class="btn btn-success" style="float: right; margin-bottom: 20px;"><s
                                    style="text-decoration: none; color: white;" class="tf-icons bx bx-edit"></s>&nbsp;
                                Yadda saxla</button>
                            <?php if ($get_single_data['c_img']) { ?>
                                <button data-url="<?php echo base_url('course_img_delete/' . $get_single_data['c_id']); ?>"
                                    type="submit" class="btn btn-danger button_remove"
                                    style="color: white;float: right; margin-bottom: 20px; margin-right: 10px"><s
                                        style="text-decoration: none; color: white;" class="tf-icons bx bx-trash"></s>&nbsp;
                                    Şəkli sil</button>
                            <?php } ?>
                        </div>


                    </form>
                </div>
            </div>
        </div>
        <!-- ======================SWEERALERT====================== -->
        <script src="<?php echo base_url('assets/admin'); ?>/assets/js/sweet_alert_2.js"></script>
        <script>
            $(document).ready(function () {

                $(".button_remove").click(function (e) {
                    e.preventDefault();    // href-e getmemesi ucun.
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