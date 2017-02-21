<?php use App\Libs\Constant; ?>
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?= $this->Url->build('/' . implode('/', Constant::$C_ROUTE_DEFAULT)); ?>">
        <?= Constant::C_TITLE ?>
    </a>
</div>

<ul class="nav navbar-top-links navbar-right">
    <li class="dropdown">
        <a href="<?= $this->Url->build('/pages/home') ?>">
            <i class="fa fa-home fa-lg"></i>&nbsp&nbspHome
        </a>
    </li>
    <?php if(isset($user) && $user): ?>
        <li>
            <a href="#">
                <i class="fa fa-dashboard fa-lg"></i>&nbsp&nbspDashboard<span class="fa arrow"></span>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li>
                    <a href="<?= $this->Url->build('/admin/profile') ?>">
                        <i class="fa fa-user fa-lg"></i>&nbsp&nbsp
                        <?php if(isset($user['name'])): ?>
                            <strong>[ <?= $user['name'] ?> ]</strong>
                        <?php endif; ?> profile
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="<?= $this->Url->build('/auth/logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
        </li>
    <?php else: ?>
        <li>
            <a href="<?= $this->Url->build('/auth/login') ?>">
                <i class="fa fa-sign-in fa-lg"></i>&nbsp&nbspLogin
            </a>
        </li>
    <?php endif; ?>
</ul>
