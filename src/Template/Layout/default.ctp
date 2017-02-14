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
        <div id="process-content"></div>
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?= $this->element('_nav_top'); ?>
            <?= $this->element('_nav_left'); ?>
        </nav>

        <div id="page-wrapper">
            <div class="he-10"></div>
            <?= $this->Flash->render('error') ?>
            <?= $this->Flash->render('success') ?>
            <?= $this->fetch('content') ?>
        </div>
    </div>
    </body>
</html>
