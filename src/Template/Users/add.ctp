<div class="panel panel-default">
    <div class="panel-heading">
        <ul class="nav nav-pills btn-sm">
            <li>
                <a class="btn btn-default" href="<?= $this->Url->build('/users/index') ?>">List</a>
            </li>
            <li>
                <a class="btn btn-primary" href="<?= $this->Url->build('/users/add') ?>">New</a>
            </li>
            <li>
                <a class="btn btn-default" href="<?= $this->Url->build('/admin/profile') ?>">Profile</a>
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
