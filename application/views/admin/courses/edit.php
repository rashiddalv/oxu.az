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

            <h5 class="card-header spaceB">Edit Course
                <a href="<?php echo base_url('dashboard_courses') ?>">
                    <button type="button" class="btn  btn-sm btn-danger">Back</button>
                </a>
            </h5>

            <div class="table-responsive text-nowrap">
                <div class="card-body">
                    <form action="<?php echo base_url('course_edit_act/'.$get_single_data['c_id']); ?>" method="post"
                        enctype="multipart/form-data">
                        <label for="title">Course name</label>
                        <input type="text" id="title" name="title" class="form-control"
                            value="<?php echo $get_single_data['c_title']; ?>">
                        <br>

                        <label for="description">Description</label>
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



                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="float: left; margin-right: 10px;">
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-control">
                                <option <?php if ($get_single_data['c_category'] = "") {
                                    echo "SELECTED";
                                } ?> value="">
                                    -SELECT-</option>
                                <option <?php if ($get_single_data['c_category'] = "Programming") {
                                    echo "SELECTED";
                                } ?>
                                    value="Programming">Programming</option>
                                <option <?php if ($get_single_data['c_category'] = "Languages") {
                                    echo "SELECTED";
                                } ?>
                                    value="Languages">Languages</option>
                                <option <?php if ($get_single_data['c_category'] = "Office programs") {
                                    echo "SELECTED";
                                } ?> value="Office programs">Office programs</option>
                            </select>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="float: left; margin-right: 10px;">
                            <label for="status">Trainer</label>
                            <select name="trainer" id="status" class="form-control">
                                <option <?php if ($get_single_data['c_trainer'] = "") {
                                    echo "SELECTED";
                                } ?> value="">
                                    -SELECT-</option>
                                <option <?php if ($get_single_data['c_trainer'] = "Rza Talibov") {
                                    echo "SELECTED";
                                } ?>
                                    value="Rza Talibov">Rza Talibov</option>
                                <option <?php if ($get_single_data['c_trainer'] = "Əmiraslan Məmmədov") {
                                    echo "SELECTED";
                                } ?> value="Əmiraslan Məmmədov">Əmiraslan Məmmədov</option>
                                <option <?php if ($get_single_data['c_trainer'] = "Elşad Ağazadə") {
                                    echo "SELECTED";
                                } ?>
                                    value="Elşad Ağazadə">Elşad Ağazadə</option>
                                <option <?php if ($get_single_data['c_trainer'] = "Jeyhun Xəlilov") {
                                    echo "SELECTED";
                                } ?>
                                    value="Jeyhun Xəlilov">Jeyhun Xəlilov</option>
                                <option <?php if ($get_single_data['c_trainer'] = "Sənan Abdullayev") {
                                    echo "SELECTED";
                                } ?> value="Sənan Abdullayev">Sənan Abdullayev</option>
                                <option <?php if ($get_single_data['c_trainer'] = "Kərim Kərimov") {
                                    echo "SELECTED";
                                } ?>
                                    value="Kərim Kərimov">Kərim Kərimov</option>
                            </select>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" style="float: left; margin-right: 10px;">
                            <label for="price">Price</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">$</span>
                                <input id="price" name="price" type="text" class="form-control" placeholder="100"
                                    aria-label="Amount (to the nearest dollar)"
                                    value="<?php echo $get_single_data['c_price']; ?>">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>

                                <br>
                                <br>
                                <br>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9" style="float: left; margin:0px">
                    <label for="img">Image</label>
                    <br>
                    <?php if ($get_single_data['c_img']) { ?>
                        <img data-enlargable width="586px" height="330px" style="object-fit: cover; margin-bottom: 20px;"
                            src="<?php echo base_url('uploads/courses/' . $get_single_data['c_img']); ?>" alt="">
                    <?php } else { ?>
                        <img width="120px" height="70px" style="object-fit: cover; margin-bottom: 20px;"
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
                                Save</button>
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