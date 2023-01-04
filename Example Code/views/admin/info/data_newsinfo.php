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
            <h1 class="h3 mb-0 text-gray-800">Data Paper</h1>
          </div><br>
            <div class="row">
              <div class="col-md-8">
                <a class="btn btn-outline-primary shadow-sm" href="<?php echo site_url('admin/info/add') ?>"><span class="fa fa-plus"></span> New</a>
                <a class="btn btn-outline-primary shadow-sm" href="<?php echo site_url('admin/reportdatasiswa') ?>"><span class="fa fa-download"></span> Report</a>
              </div>
              <div class="col-md-4">
                <form action="<?php echo site_url('admin/info/search') ?>"  method="get">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control shadow-sm" placeholder="Search ID / Judul" name="keyword" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-outline-primary shadow-sm" type="submit"><span class="fa fa-search"></span>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                      <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Publisher</th>
                        <th>News & Info</th>
                        <th>Time & Date</th>
                      </tr>
                    </thead>
                    <tbody>
					<thead class="text-center">
                      <?php foreach ($info as $i): ?>
                      <tr>
                        <td>
                          <?php echo $i->id ?>
                        </td>
                        <td>
                          <?php echo $i->judul ?>
                        </td>
						<td>
                          <img src="<?php echo base_url('img/sekolah/'.$i->photo) ?>" class="img-fluid rounded mx-auto d-block" width="50px" height="50px" />
                        </td>
                        <td>
                          <?php echo $i->newsinfo ?>  
                        </td>
                        <td>
                          <?php echo $i->pt ?>
                        </td>
                        <td class="text-center">
                          <a href="<?php echo site_url('admin/info/edit/'.$i->id) ?>"
                           class="btn btn-small"><i class="fas fa-pen"></i></a>
                          <a onclick="deleteConfirm('<?php echo site_url('admin/info/delete/'.$i->id) ?>')"
                           href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
					</thead>
                  </tbody>
                </table>
              </div>
            </div>
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

  <!-- Logout dan Delete Modal-->
  <?php $this->load->view("_includes/modal.php") ?>

  <!-- Bootstrap core JavaScript-->
  <?php $this->load->view("_includes/javascript.php") ?>
  <script>
  function deleteConfirm(url){
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
  }
  </script>
</body>

</html>
