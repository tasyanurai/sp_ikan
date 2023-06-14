<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
          <div class="main-navbar">
            <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
              <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                <div class="d-table m-auto">
                  <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="<?= base_url('assets/images/lele2.png')?>" alt="Shards Dashboard">
                  <span class="d-none d-md-inline ml-1">KoLe-Konsultasi Lele</span>
                </div>
              </a>
              <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons"></i>
              </a>
            </nav>
          </div>
          <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
            <div class="input-group input-group-seamless ml-3">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-search"></i>
                </div>
              </div>
               </div>
          </form>
          <div class="nav-wrapper">
            <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link <?php if($this->uri->segment(1)=="dashboard"){echo "active";}?> " href="<?php echo base_url(); ?>dashboard">
                  <i class="material-icons">view_module</i>
                  <span>Dashboard</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(1)=="gejala"){echo "active";}?> " href="<?php echo base_url(); ?>gejala/data_gejala">
                  <i class="material-icons ">table_chart</i>
                  <span>Data Gejala</span>
                </a>
              </li>
              <li class="nav-item">
              <a class="nav-link <?php if($this->uri->segment(1)=="penyakit"){echo "active";}?> " href="<?php echo base_url(); ?>penyakit/data_penyakit">
                  <i class="material-icons">table_chart</i>
                  <span>Data Penyakit</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(1)=="rule"){echo "active";}?> " href="<?= base_url('rule/data_rule')?>">
                  <i class="material-icons">note_add</i>
                  <span>Basis Pengetahuan</span>
                </a>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(1)=="diagnosa"){echo "active";}?> " href="<?= base_url('diagnosa/data_diagnosa')?>">
                  <i class="material-icons">vertical_split</i>
                  <span>Diagnosa</span>
                </a>
              </li>
              
              </li><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
               <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(1)=="logout"){echo "active";}?> " href="<?= base_url('login')?>">
                  <i class="material-icons">close</i>
                  <span>LOGOUT</span>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link " href="add-new-post.html">
                  <i class="material-icons">note_add</i>
                  <span>Tambah Artikel</span>
                </a>
              </li> -->
            </ul>
          </div>
        </aside>
