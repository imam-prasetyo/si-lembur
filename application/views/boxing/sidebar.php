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
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
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
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePegawai" aria-expanded="true" aria-controls="collapsePegawai">
                    <i class="fa fa-child"></i>
                        <span>Pegawai</span>
                    </a>
                    <div id="collapsePegawai" class="collapse" aria-labelledby="headingPegawai" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Pegawai</h6>
                            <a class="collapse-item" href="<?= base_url($data["config_web"]["admin_panel"]."/pegawai"); ?>">Pegawai</a>
                            <!-- <h6 class="collapse-header">Struktur</h6>
                            <a class="collapse-item" href="<?//= base_url($data["config_web"]["admin_panel"]."/jabatan"); ?>">Jabatan</a> -->
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAbsensi" aria-expanded="true" aria-controls="collapseAbsensi">
                    <i class="fa fa-database"></i>
                        <span>Absensi</span>
                    </a>
                    <div id="collapseAbsensi" class="collapse" aria-labelledby="headingAbsensi" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Approval</h6>
                            <a class="collapse-item" href="<?= base_url($data["config_web"]["admin_panel"]."/absensi-approval"); ?>">Approval</a>
                            <h6 class="collapse-header">Shift</h6>
                            <a class="collapse-item" href="<?= base_url($data["config_web"]["admin_panel"]."/absensi-shift"); ?>">Shift</a>
                            <h6 class="collapse-header">Overtime</h6>
                            <a class="collapse-item" href="<?= base_url($data["config_web"]["admin_panel"]."/absensi-overtime"); ?>">Overtime</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAbsensiReport" aria-expanded="true" aria-controls="collapseAbsensiReport">
                    <i class="fa fa-print"></i>
                        <span>Report</span>
                    </a>
                    <div id="collapseAbsensiReport" class="collapse" aria-labelledby="headingAbsensiReport" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Shift</h6>
                            <a class="collapse-item" href="<?= base_url($data["config_web"]["admin_panel"]."/absensi-shift-report"); ?>">Shift</a>
                            <h6 class="collapse-header">Overtime</h6>
                            <a class="collapse-item" href="<?= base_url($data["config_web"]["admin_panel"]."/absensi-overtime-report"); ?>">Overtime</a>
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
