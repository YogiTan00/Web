 <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      
	  

      <!-- Divider -->
      <hr class="sidebar-divider">

      <?php
        if($_SESSION['level']=='Admin')
        { 
      ?>
		<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('admin') ?>">
        <div class="sidebar-brand-icon"> 
        </div>
        <div class="sidebar-brand-text mx-4">Bethel</div>
      </a>
	    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/info') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>News & Info</span></a>
		</li>
          <div class="sidebar-heading">
            Main Navigation
          </div>

          <!-- Nav Item - Pages Collapse Menu --> 
          <li class="nav-item <?php echo $this->uri->segment(2) == 'manage' ? 'active': '' ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-fw fa-cog"></i>
              <span>Manage</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Master Data: </h6>
                <a class="collapse-item" href="<?php echo site_url('admin/manage/add') ?>">New Siswa</a>
                <a class="collapse-item" href="<?php echo site_url('admin/manage') ?>">Data Siswa</a>
              </div>
            </div>
          </li>

          <!-- Nav Item -->
          <li class="nav-item <?php echo $this->uri->segment(2) == 'users' ? 'active': '' ?>">
            <a class="nav-link" href="<?php echo site_url('admin/users') ?>">
              <i class="fas fa-fw fa-users"></i>
              <span>Users</span></a>
          </li>
          
          <li class="nav-item <?php echo $this->uri->segment(1) == 'change' ? 'active': '' ?>">
            <a class="nav-link" href="<?php echo site_url('change') ?>">
              <i class="fas fa-fw fa-pen-alt"></i>
              <span>Change Password</span></a>
          </li>   
        <?php 
        }
        if($_SESSION['level']=='Siswa')
        { ?>
		<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('siswa') ?>">
        <div class="sidebar-brand-icon">
        </div>
        <div class="sidebar-brand-text mx-4">Bethel</div>
		</a>
		<li class="nav-item <?php echo $this->uri->segment(1) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('siswa/info') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>News & Info</span></a>
		</li>
          <li class="nav-item <?php echo $this->uri->segment(1) == 'change' ? 'active': '' ?>">
            <a class="nav-link" href="<?php echo site_url('change') ?>">
              <i class="fas fa-fw fa-pen-alt"></i>
              <span>Change Password</span></a>
          </li>
   
        <?php
        }  
        ?>
      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>