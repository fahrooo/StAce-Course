<div class="left-side-bar">
    <div class="brand-logo mt-4 ml-4">
        <a href="index.html">
            <img src="<?= base_url('assets/img/logo/stace.png') ?>" style="height: 2cm;" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="<?= base_url('admin/index') ?>" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-home"></span><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/listteacher') ?>" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-user1"></span><span class="mtext">Data Teachers</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/liststudent') ?>" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-user1"></span><span class="mtext">Data Students</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/listsubject') ?>" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-book"></span><span class="mtext">Courses</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/listtransaction') ?>" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-wallet"></span><span class="mtext">Transactions</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/listaccount') ?>" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-key1"></span><span class="mtext">Account</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>