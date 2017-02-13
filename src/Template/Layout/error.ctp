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
    <div id="page-wrapper">
        <div class="row"></div>
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
        <div id="footer">
            <?= $this->Html->link(__('Back'), 'javascript:history.back()') ?>
        </div>
    </div>
</div>
</body>
</html>
