 <!-- navbar -->
<!-- ============================================================== -->
<div class="dashboard-header">
<nav class="navbar navbar-expand-lg bg-white fixed-top">
    <a class="navbar-brand" href="index.html">Admin Panel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto navbar-right-top">
            <li class="nav-item dropdown nav-user">
                <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url('assets/admi32n_ma4nager_con45trol_panel/');?>assets/images/coronavirus.svg" alt="" class="user-avatar-md rounded-circle"></a>
                <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                    <div class="nav-user-info">
                        <h5 class="mb-0 text-white nav-user-name"><?php echo ucwords($this->session->userdata('admin_manage_full_name'));?></h5>
                        <span class="status"></span><span class="ml-2"><?php echo ($this->session->userdata('admin_manage_login_id'));?></span>
                    </div>
                    <a class="dropdown-item" href="<?php echo base_url('admi32n_ma4nager_con45trol_panel/profile');?>"><i class="fas fa-user mr-2"></i>Account</a>
                    <a class="dropdown-item" href="#" style="display: none;"><i class="fas fa-cog mr-2"></i>Setting</a>
                    <a class="dropdown-item" href="<?php echo base_url('admi32n_ma4nager_con45trol_panel/logout');?>"><i class="fas fa-power-off mr-2"></i>Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
</div>
<!-- ============================================================== -->
<!-- end navbar -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<div class="nav-left-sidebar sidebar-dark">
<div class="menu-list">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav flex-column">
                <li class="nav-divider">
                    Menu
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="<?php echo base_url('admi32n_ma4nager_con45trol_panel/dashboard');?>" ><i class="fas fa-fw fa-chart-pie"></i>Dashboard </a>
                </li>
             
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('admi32n_ma4nager_con45trol_panel/users');?>" ><i class="fa fa-fw fa-user-circle"></i>Users List</a>
                </li>
              
            
            </ul>
        </div>
    </nav>
</div>
</div>
<!-- ============================================================== -->
<!-- end left sidebar -->