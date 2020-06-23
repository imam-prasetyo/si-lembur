            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url($data["config_web"]["admin_panel"]); ?>">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <!-- <i class="fas fa-laugh-wink"></i> -->
                    </div>
                    <div class="sidebar-brand-text mx-3">
                        <?//= $data["config_web"]["title"]; ?>
                        <img src="<?= base_url('img/logo/site/small/default.png'); ?>" />
                    </div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">
            
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url($data["config_web"]["admin_panel"]); ?>">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseuser">
                    <i class="fas fa-user"></i>
                        <span>User</span>
                    </a>
                    <div id="collapseUser" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Administrator</h6>
                            <a class="collapse-item" href="<?= base_url($data["config_web"]["admin_panel"]."/user"); ?>">User</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDivisiUnit" aria-expanded="true" aria-controls="collapseDivisiUnit">
                    <i class="fas fa-users"></i>
                        <span>Divisi & Unit</span>
                    </a>
                    <div id="collapseDivisiUnit" class="collapse" aria-labelledby="headingDivisiUnit" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Divisi</h6>
                            <a class="collapse-item" href="<?= base_url($data["config_web"]["admin_panel"]."/divisi"); ?>">Divisi</a>
                            <h6 class="collapse-header">Unit</h6>
                            <a class="collapse-item" href="<?= base_url($data["config_web"]["admin_panel"]."/unit"); ?>">Unit</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseusers">
                    <i class="fas fa-users"></i>
                        <span>Pegawai</span>
                    </a>
                    <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Pegawai</h6>
                            <a class="collapse-item" href="<?= base_url($data["config_web"]["admin_panel"]."/pegawai"); ?>">Pegawai</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseActivityLog" aria-expanded="true" aria-controls="collapseActivityLog">
                    <i class="fas fa-cogs"></i>
                        <span>System</span>
                    </a>
                    <div id="collapseActivityLog" class="collapse" aria-labelledby="headingActivityLog" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Configuration</h6>
                            <a class="collapse-item" href="<?= base_url($data["config_web"]["admin_panel"]."/configuration"); ?>">Configuration</a>
                            
                            <!-- <h6 class="collapse-header">Logger</h6>
                            <a class="collapse-item" href="<?//= base_url($data["config_web"]["admin_panel"]."/activity-log"); ?>">Activity Log</a> -->
                        </div>
                    </div>
                </li>
            </ul>
