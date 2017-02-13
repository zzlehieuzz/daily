<?php use App\Libs\Constant; ?>
<!DOCTYPE html>
<html>
    <head>
        <title><?= Constant::C_TITLE ?></title>

        <?= $this->element('_meta'); ?>
        <?= $this->element('_css_script'); ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>

    <body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?= $this->element('_nav_top'); ?>
            <?= $this->element('_nav_left'); ?>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 id="header-text" class="page-header">Dashboard</h1>
                </div>
            </div>
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </div>
    </body>
</html>
