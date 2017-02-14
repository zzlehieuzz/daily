<?php use Cake\Routing\Router; ?>
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="<?= Router::url(['controller' => 'admin', 'action'=> 'home']); ?>">
                    <i class="fa fa-dashboard fa-fw"></i> Dashboard<span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= Router::url(['controller' => 'pages', 'action'=> 'home']); ?>">
                            <i class="fa fa-home fa-fw"></i> Home
                        </a>
                    </li>
                    <li>
                        <a href="<?= Router::url(['controller' => 'users', 'action'=> 'profile']); ?>">
                            <i class="fa fa-user fa-fw"></i> User Profile
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?= Router::url(['controller' => 'auth', 'action'=> 'logout']); ?>">
                            <i class="fa fa-sign-out fa-fw"></i> Logout
                        </a>
                    </li>
                </ul>

            </li>
            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> Users<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= Router::url(['controller' => 'users', 'action'=> 'index']); ?>">List User</a>
                    </li>
                    <li>
                        <a href="<?= Router::url(['controller' => 'users', 'action'=> 'add']); ?>">Add User</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> Daily<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= Router::url(['controller' => 'daily', 'action'=> 'index']); ?>">List Daily</a>
                    </li>
                    <li>
                        <a href="<?= Router::url(['controller' => 'daily', 'action'=> 'add']); ?>">Add Daily</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>