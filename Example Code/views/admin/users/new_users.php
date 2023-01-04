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
            <h1 class="h3 mb-0 text-gray-800">New Users</h1>
          </div>
          <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success" role="alert">
          <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>

        <div class="card mb-3">
          <div class="card-header">
            <a class="btn btn-outline-primary shadow-sm" href="<?php echo site_url('admin/users/') ?>">
              <span class="fa fa-arrow-left"></span> Back
            </a>
          </div>
          <div class="card-body">

            <form action="<?php echo site_url('admin/users/add') ?>" method="post" enctype="multipart/form-data" >
              <div class="form-group">
                <label for="id">ID*</label>
                <select class="form-control <?php echo form_error('id') ? 'is-invalid':'' ?>" name="id">
                  <option value="" selected>-- Available ID --</option>
                  <?php foreach ($id_users as $nu): ?>
                  <option value=<?php echo $nu->id ?>><?php echo $nu->id ?></option>
                  <?php endforeach; ?>
                </select>
                
                <div class="invalid-feedback">
                  <?php echo form_error('id') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="level">Level</label>
                <select class="form-control <?php echo form_error('level') ? 'is-invalid':'' ?>" name="level">
                  <option value="" selected>-- Choose Level --</option>
                  <option value="Siswa">Siswa</option>
                  <option value="Admin">Admin</option>
                </select>
                <div class="invalid-feedback">
                  <?php echo form_error('level') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="password">Password*</label>
                <input class="form-control" type="password" name="password" value="bethel123" readonly/>
                <div class="small text-muted">
                  default : "bethel123"
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
