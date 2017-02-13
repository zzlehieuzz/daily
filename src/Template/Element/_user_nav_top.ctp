<?php use App\Libs\Constant; ?>
<?php use Cake\Routing\Router; ?>
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.html"><?= Constant::C_TITLE ?></a>
</div>
<!-- /.navbar-header -->

<ul class="nav navbar-top-links navbar-right">
    <li class="dropdown">
        <a href="<?= Router::url(['controller' => 'pages', 'action'=> 'home']); ?>">
            Home
        </a>
    </li>
    <?php if(isset($user) && $user): ?>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li>
                    <a href="<?= Router::url(['controller' => 'users', 'action'=> 'profile']); ?>">
                        <i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="<?= Router::url(['controller' => 'auth', 'action'=> 'logout']); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
        </li>
    <?php else: ?>
        <li class="dropdown">
            <a href="<?= Router::url(['controller' => 'auth', 'action'=> 'login']); ?>">
                <span class="glyphicon glyphicon-log-out"></span>&nbsp&nbspLogin
            </a>
        </li>
    <?php endif; ?>
</ul>
