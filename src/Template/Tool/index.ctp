<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?= $intCountUser ?></div>
                        <div>Users ... !</div>
                    </div>
                </div>
            </div>
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
<div class="row">
    <div class="col-lg-3 col-md-6">
        <a href="<?= $this->Url->build('/tool/clearTemp') ?>" class="btn btn-success">Clear cache</a>
    </div>
</div>