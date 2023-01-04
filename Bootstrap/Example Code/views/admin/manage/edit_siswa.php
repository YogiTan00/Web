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
            <h1 class="h3 mb-0 text-gray-800">Edit Siswa</h1>
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

            <form action="" method="post" enctype="multipart/form-data" >
              <div class="form-group">
                <label for="id">ID*</label>
                <input class="form-control <?php echo form_error('id') ? 'is-invalid':'' ?>"
                 type="text" name="id" placeholder="id" value="<?php echo $manage->id ?>" readonly/>
                <div class="invalid-feedback">
                  <?php echo form_error('id') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="photo">Photo</label>
                <input class="form-control-file"
                 type="file" name="photo" value="<?php echo $manage->photo ?>"/>
                <input type="hidden" name="old_image" value="<?php echo $manage->photo ?>" />
              </div>

              <div class="form-group">
                <label for="fullname">Full Name*</label>
                <input class="form-control <?php echo form_error('fullname') ? 'is-invalid':'' ?>"
                 type="text" name="fullname" placeholder="Full Name" value="<?php echo $manage->fullname ?>"/>
                <div class="invalid-feedback">
                  <?php echo form_error('fullname') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="gender">Gender</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="Pria" <?php echo $manage->gender == 'Pria' ? 'checked': '' ?>>
                <label class="form-check-label">Pria</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="Perempuan" <?php echo $manage->gender == 'Perempuan' ? 'checked': '' ?>>
                <label class="form-check-label">Perempuan</label>
              </div>
              </div>

              <div class="form-group">
                <label for="religion">Religion</label>
                <select class="form-control" name="religion">
                  <option value="Katolik" <?php echo $manage->religion == 'Katolik' ? 'selected': '' ?>>
                  Katolik</option>
                  <option value="Kristen" <?php echo $manage->religion == 'Kristen' ? 'selected': '' ?>>
                  Kristen</option>
                  <option value="Islam" <?php echo $manage->religion == 'Islam' ? 'selected': '' ?>>
                  Islam</option>
                  <option value="Hindu" <?php echo $manage->religion == 'Hindu' ? 'selected': '' ?>>
                  Hindu</option>
                  <option value="Buddha" <?php echo $manage->religion == 'Buddha' ? 'selected': '' ?>>
                  Buddha</option>
                  <option value="Others" <?php echo $manage->religion == 'Others' ? 'selected': '' ?>>
                  Others</option>
                </select>
              </div>

              <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control"
                 name="address" placeholder="Address"><?php echo $manage->address ?></textarea>
              </div>

              <div class="form-group">
                <label for="phone">Phone*</label>
                <input class="form-control <?php echo form_error('phone') ? 'is-invalid':'' ?>"
                 type="text" name="phone" placeholder="Phone" value="<?php echo $manage->phone ?>"/>
                <div class="invalid-feedback">
                  <?php echo form_error('phone') ?>
                </div>
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
