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
                            <i class="fa fa-user fa-lg"></i>&nbsp&nbsp
                            <?php if(isset($user['name'])): ?>
                                <strong>[ <?= $user['name'] ?> ]</strong>
                            <?php endif; ?> profile
                        </a>
                    </li>
                    <?php if(isset($user['role']) && $user['role'] == \App\Libs\Constant::C_USER_ROLE_SUPER): ?>
                        <li>
                            <a href="<?= $this->Url->build('/Tool/index') ?>">
                                <i class="fa fa-keyboard-o fa-lg"></i>&nbsp&nbspTool
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="divider"></li>
                    <li>
                        <a href="<?= $this->Url->build('/auth/logout') ?>">
                            <i class="fa fa-sign-out fa-lg"></i>&nbsp&nbspLogout
                        </a>
                    </li>
                </ul>
            </li>
            <?php if(isset($user['role']) && $user['role'] == \App\Libs\Constant::C_USER_ROLE_SUPER): ?>
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
                <a href="#"><i class="fa fa-users fa-lg"></i>&nbsp&nbspDaily<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= $this->Url->build('/daily/salary') ?>">Salary</a>
                    </li>
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