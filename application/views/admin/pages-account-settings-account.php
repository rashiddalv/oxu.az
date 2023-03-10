<?php
// print_r("<pre>");
// print_r($get_all_courses);
// die();
$this->load->view('admin/includes/headerStyle'); ?>
<?php $this->load->view('admin/includes/aside'); ?>
<?php $this->load->view('admin/includes/navbar'); ?>

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">

    <div class="row">
      <div class="col-md-12">

        <div class="card mb-4">
          <h5 class="card-header">Profil parametrləri</h5>
          <!-- Account -->
          <form action="<?php echo base_url('account_settings_act'); ?>" id="formAccountSettings" method="POST"
            enctype="multipart/form-data">
            <div class="card-body">
              <div class="d-flex align-items-start align-items-sm-center gap-4">
                <?php if ($admin['a_img']) { ?>
                  <img style="object-fit:cover;" src="<?php echo base_url('uploads/admin/' . $admin['a_img']) ?>"
                    alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                <?php } else { ?>
                  <img style="object-fit:cover;"
                    src="https://icon-library.com/images/no-user-image-icon/no-user-image-icon-27.jpg"
                    class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                <?php } ?>
                <div class="button-wrapper">
                  <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                    <span class="d-none d-sm-block">Yeni şəkil yükləyin</span>
                    <i class="bx bx-upload d-block d-sm-none"></i>
                    <input value="<?php echo base_url('uploads/admin/' . $admin['a_img']) ?>" name="profile_pic"
                      type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                  </label>
                  <?php if ($admin['a_img']) { ?>
                    <a href="<?php echo base_url('account_img_delete/' . $admin['a_id']) ?>" type="button"
                      class="btn btn-danger account-image-reset mb-4">
                      <i class="bx bx-reset d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Şəkli sil</span></a>
                  <?php } else { ?>
                  <?php } ?>
                  <p class="text-muted mb-0">İcazə verilir JPG, GIF və ya PNG. Maksimum ölçü 800K</p>
                </div>
              </div>
            </div>
            <hr class="my-0" />
            <div class="card-body">
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="firstName" class="form-label">Adınız və soyadınız</label>
                  <input class="form-control" type="text" id="firstName" name="new_name"
                    placeholder="<?php echo $admin['a_name']; ?>" value="<?php echo $admin['a_name'] ?>" autofocus />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="email" class="form-label">E-poçt</label>
                  <input disabled class="form-control" type="text" id="email" name="new_mail"
                    placeholder="<?php echo $admin['a_mail']; ?>" value="<?php echo $admin['a_mail'] ?>" />

                </div>
                <div class="mt-2">
                  <button type="submit" class="btn btn-primary me-2">Yadda saxla</button>
                </div>
                <div class="mt-2">
                  <?php if ($admin['a_status'] == "Verified user") { ?>
                    <button disabled class="btn btn-success"><s style="text-decoration: none; color: white;"
                        class="tf-icons bx bx-check-double"></s>&nbsp;Verified</button>
                  <?php } else { ?>
                    <a href="<?php echo base_url('verify_account/'); ?>" type="submit"
                      class="btn btn-warning me-2">Verify</a>
                  <?php } ?>
                </div>
              </div>
            </div>
          </form>
        </div>
        <!-- /Account -->
      </div>

    </div>
  </div>
</div>
<!-- / Content -->

<!-- Footer -->


<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->

<!-- ===========================FLASHDATA=========================== -->
<?php if ($this->session->flashdata('err')) { ?>
  <div class="bs-toast toast toast-placement-ex m-2 fade bg-danger bottom-0 end-0 show" role="alert" aria-live="assertive"
    aria-atomic="true" data-delay="2000">
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