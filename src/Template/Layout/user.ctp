<?php use App\Libs\Constant; ?>
<!DOCTYPE html>
<html>
    <head>
        <title><?= Constant::C_TITLE ?></title>

        <?= $this->element('_meta'); ?>
        <?= $this->element('_user_css_script'); ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <body>
        <?= $this->element('_user_nav_top'); ?>
        <?= $this->Flash->render('error') ?>
        <?= $this->Flash->render('success') ?>
        <?= $this->fetch('content') ?>
        <?= $this->element('_user_footer'); ?>
    </body>
</html>
