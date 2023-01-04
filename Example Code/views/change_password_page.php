<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("_includes/head.php") ?>
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <?php $this->load->view("_includes/sidebar.php") ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
       <?php $this->load->view("_includes/navbar.php") ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h3 class="h3 mb-0 text-gray-800">Change Password</h3>
          </div>
          <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success" role="alert">
          <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>

        <div class="card mb-3">
          <div class="card-body">
            <form action="<?php echo site_url('change/update') ?>" method="post">
              <div class="form-group">
                <label for="id">ID*</label>
                <input class="form-control" type="text" name="id" placeholder="id" value="<?php echo $change->id ?>" readonly/>
              </div>

              <div class="form-group">
                <label for="new_pass">New Password*</label>
                <input class="form-control" type="password" name="new_pass" placeholder="New Password" <?php echo form_error('new password') ? 'is-invalid':'' ?>" />
                <div class="invalid-feedback">
                  <?php echo form_error('New Password') ?>
                </div>
              </div>
              
              <div class="form-group">
                <label for="confirm_pass">Confirm Password*</label>
                <input class="form-control" type="password" name="confirm_pass" placeholder="Confirm Password"  <?php echo form_error('confirm password') ? 'is-invalid':'' ?>" />
                <div class="invalid-feedback">
                  <?php echo form_error('Confirm Password') ?>
                </div>
              </div>

              <input class="btn btn-outline-success" type="submit" name="btn" value="Update" />
            </form>

          </div>

          <div class="card-footer small text-muted">
            * required fields
          </div>            
      </div>

          <!-- Content Row -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php $this->load->view("_includes/footer.php") ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php $this->load->view("_includes/modal.php") ?>

  <!-- Bootstrap core JavaScript-->
  <?php $this->load->view("_includes/javascript.php") ?>

</body>

</html>
