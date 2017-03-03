<?= $this->Html->script('flot/excanvas.min.js') ?>
<?= $this->Html->script('flot/jquery.flot.js') ?>
<?= $this->Html->script('flot/jquery.flot.pie.js') ?>
<?= $this->Html->script('flot/jquery.flot.resize.js') ?>
<?= $this->Html->script('flot/jquery.flot.time.js') ?>
<?= $this->Html->script('flot-tooltip/jquery.flot.tooltip.min.js') ?>

<?= $this->Html->script('graph/index.js') ?>
<?= $this->Html->css('graph/index.css') ?>

<style type="text/css">
    #legend-container {
        background-color: #fff;
        padding: 3px 6px;
        border-radius: 5px;
        border: 1px solid #E6E6E6;
        display: table;
        margin: auto 10px auto auto;
    }

    .flot-chart-content {
        height: 92%;
    }

</style>

<div class="panel panel-default">
    <div class="panel-heading">
        <ul class="nav nav-pills btn-sm">
            <li>
                <a class="btn btn-primary" href="<?= $this->Url->build('/daily/index') ?>">
                    <i class="fa fa-cloud-download fa-lg"></i>
                </a>
            </li>
            <li>
                <a class="btn btn-default" href="<?= $this->Url->build('/daily/add') ?>">
                    Year
                </a>
            </li>
            <li>
                <a class="btn btn-default" href="<?= $this->Url->build('/daily/add') ?>">
                    Month
                </a>
            </li>
            <li>
                <a class="btn btn-default" href="<?= $this->Url->build('/daily/add') ?>">
                    Week
                </a>
            </li>
            <li>
                <a class="btn btn-default" href="<?= $this->Url->build('/daily/add') ?>">
                    Day
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-info">
            <div class="panel-heading">Bar Chart</div>
            <div class="panel-body">
                <div class="flot-chart">
                    <div id="legend-container"></div>
                    <div class="flot-chart-content" id="flot-bar-chart"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="panel panel-info">
            <div class="panel-heading">Pie Chart</div>
            <div class="panel-body">
                <div class="flot-chart">
                    <div class="flot-chart-content" id="flot-pie-chart"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<input id="pie-chart-data" type="hidden" value='<?= json_encode($aryDailyPercent); ?>'/>
<input id="bar-chart-data" type="hidden" value='<?= json_encode($aryBarChart); ?>'/>
<input id="data-amount-total" type="hidden" value='<?= $intAmountTotal; ?>'/>
<input id="data-year" type="hidden" value='<?= $year; ?>'/>
