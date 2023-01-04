<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("_includes/head.php") ?>
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <?php  $this->load->view("_includes/sidebar.php")  ?>
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
            <h3 class="h3 mb-0 text-gray-800">Profile</h3>
          </div>

        <div class="row">
        <div class="col-xl-10 offset-xl-1">
          <div class="row">
            <div class="col-lg-5">
                <img src="<?php echo base_url('img/sekolah/'.$profile->photo) ?>" class="img-fluid rounded-circle" alt="<?php echo $profile->fullname ?>" title="<?php echo $profile->fullname ?>">
            </div>
            <div class="col-lg-6">
              <div>
                <h4><?php echo $profile->fullname ?></h4>
              </div>
              <div>
                <h4>General Info</h4>
                <table class="table">
                  <tr>
                    <td><b>Full Name</b></td>
                    <td><?php echo $profile->fullname ?></td>
                  </tr>
                  <tr>
                    <td><b>Gender</b></td>
                    <td><?php echo $profile->gender ?></td>
                  </tr>
                  <tr>
                    <td><b>Religion</b></td>
                    <td><?php echo $profile->religion ?></td>
                  </tr>
                  <tr>
                    <td><b>Address</b></td>
                    <td><?php echo $profile->address ?></td>
                  </tr>
                  <tr>
                    <td><b>Phone</b></td>
                    <td><?php echo $profile->phone ?></td>
                  </tr>
                  <tr>
                </table>
              </div>
            </div> 
          </div>
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
