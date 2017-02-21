<?php use App\Libs\Constant; ?>
<?php use Cake\Routing\Router; ?>

<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
    <div class="container topnav">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand topnav"  href="<?= Router::url(Constant::$C_ROUTE_DEFAULT) ?>">
                <?= Constant::C_TITLE ?>
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?php if(isset($user)): ?>
                    <li>
                        <a href="<?= Router::url(Constant::$C_ROUTE_LOGIN_REDIRECT); ?>">
                            <i class="fa fa-dashboard"></i>&nbsp&nbspDashboard
                        </a>
                    </li>
                <?php endif;?>
                <li>
                    <a href="#about">About</a>
                </li>
                <li>
                    <a href="#services">Services</a>
                </li>
                <li>
                    <a href="#contact">Contact</a>
                </li>
                <?php if(isset($user)): ?>
                    <li>
                        <a href="<?= $this->Url->build('/auth/logout') ?>">
                            <i class="fa fa-sign-out"></i>&nbsp&nbspLogout
                        </a>
                    </li>
                <?php else:?>
                    <li>
                        <a href="<?= Router::url(Constant::$C_ROUTE_LOGIN) ?>">
                            <i class="fa fa-sign-in"></i>&nbsp&nbspLogin
                        </a>
                    </li>
                <?php endif?>
            </ul>
        </div>
    </div>
</nav>