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
