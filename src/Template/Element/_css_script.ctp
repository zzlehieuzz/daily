<?php $time = time(); ?>

<?= $this->Html->css('bootstrap.min.css') ?>
<?= $this->Html->css('bootstrap-datetimepicker.min.css') ?>
<?= $this->Html->css('../libs/vendor/metisMenu/metisMenu.min.css') ?>
<?= $this->Html->css('../css/sb-admin-2.css?v=' . $time) ?>
<?= $this->Html->css('../libs/vendor/morrisjs/morris.css') ?>
<?= $this->Html->css('font-awesome.min.css') ?>
<?= $this->Html->css('common.css?v=' . $time) ?>

<?= $this->Html->script('jquery.min.js') ?>
<?= $this->Html->script('bootstrap.min.js') ?>
<?= $this->Html->script('moment-with-locales.min.js') ?>
<?= $this->Html->script('bootstrap-datetimepicker.min.js') ?>
<?= $this->Html->script('../libs/vendor/metisMenu/metisMenu.min.js') ?>
<?= $this->Html->script('../libs/vendor/raphael/raphael.min.js') ?>
<?= $this->Html->script('../libs/vendor/morrisjs/morris.min.js') ?>
<?= $this->Html->script('../libs/dist/js/sb-admin-2.js?v=' . $time) ?>
<?= $this->Html->script('common.js?v=' . $time) ?>