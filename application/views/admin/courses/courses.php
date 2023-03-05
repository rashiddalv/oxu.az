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

            <h5 class="card-header spaceB">Courses
                <a href="<?php echo base_url('course_create') ?>">
                    <button type="button" class="btn  btn-sm btn-success">Create</button>
                </a>
            </h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Course name</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Trainer</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Creators name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            <?php $news_amount = 0;
                            foreach ($get_all_courses as $item) { 
                             $news_amount++ ?>
                                <tr>
                                    <td><?php echo $news_amount; ?></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php 
                                    $title = mb_strimwidth($item['c_title'], 0, 20, '...');
                                    echo $title ?></strong>
                                    </td>
                                    <td><?php 
                                    $description = mb_strimwidth($item['c_description'], 0, 20, "...");
                                    echo $description; ?>
                                    </td>
                                    <td><?php echo $item['c_category']; ?></td>
                                    <td>
                                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                                class="avatar avatar-xs pull-up" title="<?php echo $item['c_trainer']; ?>">
                                                <img src="<?php echo base_url('assets/admin');?>/assets/img/avatars/5.png" alt="<?php echo $item['c_trainer']; ?>"
                                                    class="rounded-circle" />
                                                <p style="display: inline;"><?php echo $item['c_trainer']; ?></p>
                                            </li>
                                        </ul>
                                    </td>
                                    <td><span class="badge bg-label-success me-1"><?php echo "$". $item['c_price']; ?></span></td>
                                    <td>
                                        <img src="" alt="">
                                    </td>
                                    <td><?php echo $item['a_name']; ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="bx bx-detail me-1"></i> Details</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a onclick="return confirm('Are you sure you want to delete the course?')" id="delete-confirm" class="dropdown-item" href="<?php echo base_url('course_delete/'.$item['c_id']);?>"><i
                                                        class="bx bx-trash me-1"></i> Delete</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
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
