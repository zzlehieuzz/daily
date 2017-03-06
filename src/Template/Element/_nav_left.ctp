<?php use \App\Libs\Constant;?>
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard fa-lg"></i>&nbsp&nbsp<?= __('Dashboard') ?><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse in">
                    <li>
                        <a href="<?= $this->Url->build('/admin/profile') ?>">
                            <i class="fa fa-user-md"></i>&nbsp&nbsp
                            <?php if(isset($user['name'])): ?>
                                <strong>[ <?= $user['name'] ?> ]</strong>
                            <?php endif; ?> <?= __('Profile') ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build('/admin/setting') ?>">
                            <i class="fa fa-gear"></i>&nbsp&nbsp<?= __('Setting') ?>
                        </a>
                    </li>
                    <?php if(isset($user['role']) && $user['role'] == Constant::C_USER_ROLE_SUPER): ?>
                        <li>
                            <a href="<?= $this->Url->build('/Tool/index') ?>">
                                <i class="fa fa-keyboard-o"></i>&nbsp&nbsp<?= __('Tool') ?>
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="divider"></li>
                    <li>
                        <a href="<?= $this->Url->build('/auth/logout') ?>">
                            <i class="fa fa-sign-out"></i>&nbsp&nbsp<?= __('Logout') ?>
                        </a>
                    </li>
                </ul>
            </li>
            <?php if(isset($user['role']) && $user['role'] == Constant::C_USER_ROLE_SUPER): ?>
                <li>
                    <a href="#"><i class="fa fa-users fa-lg"></i>&nbsp&nbsp<?= __('Users') ?><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?= $this->Url->build('/users/index') ?>"><?= __('List') ?></a>
                        </li>
                        <li>
                            <a href="<?= $this->Url->build('/users/add') ?>"><?= __('New') ?></a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
            <li>
                <a href="#"><i class="fa fa-money fa-lg"></i>&nbsp&nbsp<?= __('Daily') ?><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= $this->Url->build('/daily/index') ?>"><?= __('List') ?></a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build('/daily/add') ?>"><?= __('New') ?></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart fa-lg"></i>&nbsp&nbsp<?= __('Chart') ?><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= $this->Url->build('/graph/index') ?>"><?= __('Year/Month') ?></a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build('/graph/group') ?>"><?= __('Group') ?></a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build('/graph/calendar') ?>"><?= __('Calendar') ?></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>