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
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">New Siswa</h1>
          </div>
          <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success" role="alert">
          <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>

        <div class="card mb-3">
          <div class="card-header">
            <a class="btn btn-outline-primary shadow-sm" href="<?php echo site_url('admin/manage/') ?>">
              <span class="fa fa-arrow-left"></span> Back
            </a>
          </div>
          <div class="card-body">

            <form action="<?php echo site_url('admin/manage/add') ?>" method="post" enctype="multipart/form-data" >
              <div class="form-group">
                <label for="id">ID*</label>
                <input class="form-control <?php echo form_error('id') ? 'is-invalid':'' ?>"
                 type="text" name="id" placeholder="id" />
                <div class="invalid-feedback">
                  <?php echo form_error('id') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="photo">Photo</label>
                <input class="form-control-file" type="file" name="photo" />
              </div>

              <div class="form-group">
                <label for="fullname">Full Name*</label>
                <input class="form-control <?php echo form_error('fullname') ? 'is-invalid':'' ?>"
                 type="text" name="fullname" placeholder="Full Name" />
                <div class="invalid-feedback">
                  <?php echo form_error('fullname') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="gender">Gender</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="Pria">
                <label class="form-check-label">Pria</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="Perempuan">
                <label class="form-check-label">Perempuan</label>
              </div>
              </div>

              <div class="form-group">
                <label for="religion">Religion</label>
                <select class="form-control" name="religion">
                  <option value="" selected>-- Choose Religion --</option>
                  <option value="Katolik">Katolik</option>
                  <option value="Kristen">Kristen</option>
                  <option value="Islam">Islam</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Buddha">Buddha</option>
                  <option value="Others">Others</option>
                </select>
              </div>

              <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control"
                 name="address" placeholder="Address"></textarea>
              </div>

              <div class="form-group">
                <label for="phone">Phone*</label>
                <input class="form-control <?php echo form_error('phone') ? 'is-invalid':'' ?>"
                 type="text" name="phone" placeholder="Phone" />
				 <input type="hidden" name="active" value="0" />
                <div class="invalid-feedback">
                  <?php echo form_error('phone') ?>
                </div>
              </div>

              <input class="btn btn-outline-success shadow-sm" type="submit" name="btn" value="Save" />
            </form>

          </div>

          <div class="card-footer small text-muted">
            * required fields
          </div>

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
