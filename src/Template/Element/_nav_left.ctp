<?php use \App\Libs\Constant;?>
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard fa-lg"></i>&nbsp&nbspDashboard<span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse in">
                    <li>
                        <a href="<?= $this->Url->build('/admin/profile') ?>">
                            <i class="fa fa-user-md"></i>&nbsp&nbsp
                            <?php if(isset($user['name'])): ?>
                                <strong>[ <?= $user['name'] ?> ]</strong>
                            <?php endif; ?> profile
                        </a>
                    </li>
                    <?php if(isset($user['role']) && $user['role'] == Constant::C_USER_ROLE_SUPER): ?>
                        <li>
                            <a href="<?= $this->Url->build('/Tool/index') ?>">
                                <i class="fa fa-keyboard-o"></i>&nbsp&nbspTool
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="divider"></li>
                    <li>
                        <a href="<?= $this->Url->build('/pages/home') ?>">
                            <i class="fa fa-home"></i>&nbsp&nbspHome
                        </a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build('/auth/logout') ?>">
                            <i class="fa fa-sign-out"></i>&nbsp&nbspLogout
                        </a>
                    </li>
                </ul>
            </li>
            <?php if(isset($user['role']) && $user['role'] == Constant::C_USER_ROLE_SUPER): ?>
                <li>
                    <a href="#"><i class="fa fa-users fa-lg"></i>&nbsp&nbspUsers<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?= $this->Url->build('/users/index') ?>">List</a>
                        </li>
                        <li>
                            <a href="<?= $this->Url->build('/users/add') ?>">Add</a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
            <li>
                <a href="#"><i class="fa fa-money fa-lg"></i>&nbsp&nbspDaily<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= $this->Url->build('/daily/index') ?>">List</a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build('/daily/add') ?>">New</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>