<div class="panel panel-default">
    <div class="panel-heading">
        <ul class="nav nav-pills btn-sm">
            <li>
                <a class="btn btn-default" href="<?= $this->Url->build('/users/index') ?>">
                    <i class="fa fa-list fa-lg"></i>
                </a>
            </li>
            <li>
                <a class="btn btn-primary" href="<?= $this->Url->build('/users/add') ?>">
                    <i class="fa fa-plus-square fa-lg"></i>
                </a>
            </li>
            <li>
                <a class="btn btn-default" href="<?= $this->Url->build('/admin/profile') ?>">
                    <i class="fa fa-user-md fa-lg"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12">
                <?= $this->element('../Users/_form', ['action' => 'add', 'objEntityUser' => $objEntityUser]); ?>
            </div>
        </div>
    </div>
</div>
