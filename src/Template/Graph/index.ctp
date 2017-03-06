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
                <a class="btn btn-primary" href="<?= $this->Url->build("/graph/export/$pYear/$pMonth/$pType") ?>">
                    <i class="fa fa-cloud-download fa-lg"></i>
                </a>
            </li>
            <li>
                <?= $this->Form->input('list-year', [
                    'type' => 'select',
                    'class'=>'form-control',
                    'default' => $pYear,
                    'options' => $aryYear,
                    'label' => FALSE,
                ]); ?>
            </li>
            <?php if($pType == 'Y'): ?>
                <?php $yearCls = 'primary' ?>
                <?php $monthCls = 'default' ?>
            <?php else: ?>
                <?php $yearCls = 'default' ?>
                <?php $monthCls = 'primary' ?>
                <li>
                    <?= $this->Form->input('list-month', [
                        'type' => 'select',
                        'class'=>'form-control',
                        'default' => $pMonth,
                        'options' => $aryMonth,
                        'label' => FALSE,
                    ]); ?>
                </li>
            <?php endif; ?>
            <li>
                <a class="btn btn-<?= $yearCls ?>" href="<?= $this->Url->build("/graph/index/$pYear/$pMonth/Y") ?>">
                    Y
                </a>
            </li>
            <li>
                <a class="btn btn-<?= $monthCls ?>" href="<?= $this->Url->build("/graph/index/$pYear/$pMonth/M") ?>">
                    M
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="row">
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
<input id="data-amount-total" type="hidden" value='<?= $intAmountTotal; ?>'/>
<input id="data-p-type" type="hidden" value='<?= $pType; ?>'/>
<input id="data-p-month" type="hidden" value='<?= $pMonth; ?>'/>
<input id="url-graph-index" type="hidden" value='<?= $this->Url->build('/graph/index/') ?>'/>
