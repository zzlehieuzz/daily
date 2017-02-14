<div class="panel panel-default">
    <div class="panel-heading">
        <ul class="nav nav-pills btn-sm">
            <li>
                <a class="btn btn-default" href="<?= $this->Url->build('/users/index') ?>">List users</a>
            </li>
            <li>
                <a class="btn btn-default" href="<?= $this->Url->build('/users/add') ?>">New users</a>
            </li>
            <li>
                <a class="btn btn-primary" href="<?= $this->Url->build('/users/edit/' . $objEntityUser->id) ?>">Edit users</a>
            </li>
        </ul>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12">
                <?= $this->element('../Users/_form', ['action' => 'edit', 'objEntityUser' => $objEntityUser]); ?>
            </div>
        </div>
    </div>
</div>

