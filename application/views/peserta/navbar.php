<nav class="navbar navbar-expand-lg navbar-light" style="background-color: white;">
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-primary bg-custom">
          <i class="fas fa-bars bg-custom"></i>
          <!-- <span>Toggle Sidebar</span> -->
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-align-justify"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                <i class="fas fa-user"></i>
                Welcome <?php echo $var = $this->session->userdata('nama_tim'); ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo base_url('Peserta/logout') ?>"><i class="fas fa-sign-out-alt"></i>Logout</a>
              </div>
            </li>
        </ul>
        </div>
    </div>
</nav>