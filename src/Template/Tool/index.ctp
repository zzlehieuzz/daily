<?= $this->Html->script('../libs/vendor/flot/excanvas.min.js') ?>
<?= $this->Html->script('../libs/vendor/flot/jquery.flot.js') ?>
<?= $this->Html->script('../libs/vendor/flot/jquery.flot.pie.js') ?>
<?= $this->Html->script('../libs/vendor/flot/jquery.flot.resize.js') ?>
<?= $this->Html->script('../libs/vendor/flot/jquery.flot.time.js') ?>
<?= $this->Html->script('../libs/vendor/flot-tooltip/jquery.flot.tooltip.min.js') ?>

<?= $this->Html->script('tool/index.js') ?>
<?= $this->Html->css('tool/index.css') ?>

<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="pull-left">Users ... !</span>
            <span class="pull-right">
                <a href="<?= $this->Url->build('/tool/clearTemp') ?>" class="btn btn-success btn-sm">Clear cache</a>
            </span>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <div class="huge">Total: <?= $intCountUser ?></div>
        </div>
        <div class="panel-footer">
            <a href="<?= $this->Url->build('/users/index') ?>">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">Pie Chart</div>
        <div class="panel-body">
            <div class="flot-chart">
                <div class="flot-chart-content" id="flot-pie-chart"></div>
            </div>
        </div>
    </div>
</div>

<input id="data-percent" type="hidden" value='<?= json_encode($aryDailyPercent); ?>'/>
<input id="data-amount-total" type="hidden" value='<?= $intAmountTotal; ?>'/>
