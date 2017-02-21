<?php $time = time(); ?>

<?= $this->Html->css('bootstrap/user.bootstrap.min.css') ?>
<?= $this->Html->css('font-awesome.min.css') ?>
<?= $this->Html->css('landing-page.css') ?>
<?= $this->Html->css('user.common.css?v=' . $time) ?>

<?= $this->Html->script('jquery.min.js') ?>
<?= $this->Html->script('bootstrap.min.js') ?>
<?= $this->Html->script('common.js?v=' . $time) ?>