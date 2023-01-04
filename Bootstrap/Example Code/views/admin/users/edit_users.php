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
            <h1 class="h3 mb-0 text-gray-800">Edit Users</h1>
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

            <form action="" method="post">
              <div class="form-group">
                <label for="id">ID*</label>
                <input class="form-control"
                 type="text" name="id" placeholder="id" value="<?php echo $users->id ?>" readonly/>
              </div>

              <div class="form-group">
                <label for="level">Level</label>
                <select class="form-control" name="level">
                  <option value="">-- Choose Level --</option>
                  <option value="Siswa" <?php echo $users->level == 'Siswa' ? 'selected': '' ?>>Siswa</option>
                  <option value="Admin" <?php echo $users->level == 'Admin' ? 'selected': '' ?>>Admin</option>
                </select>
              </div>


              <div class="form-group">
                <label for="active">Active</label>
                <select class="form-control" name="active">
                  <option value="0" <?php echo $users->active == '0' ? 'selected': '' ?>>0</option>
                  <option value="1" <?php echo $users->active == '1' ? 'selected': '' ?>>1</option>
                </select>
              </div>
              <input class="btn btn-outline-success shadow-sm" type="submit" name="btn" value="Update" />
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
