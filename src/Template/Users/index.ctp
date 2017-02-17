<div class="panel panel-default">
    <div class="panel-heading">
        <ul class="nav nav-pills btn-sm">
            <li>
                <a class="btn btn-primary" href="<?= $this->Url->build('/users/index') ?>">List</a>
            </li>
            <li>
                <a class="btn btn-default" href="<?= $this->Url->build('/users/add') ?>">New</a>
            </li>
            <li>
                <a class="btn btn-default" href="<?= $this->Url->build('/users/profile') ?>">Profile</a>
            </li>
        </ul>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th width="5%">#</th>
            <th width="25%">username</th>
            <th>name</th>
            <th width="25%">login_date</th>
            <th width="5%"></th>
        </tr>
    </thead>
    <tbody>
        <?php if ($aryUser): ?>
            <?php foreach ($aryUser as $intUserKey => $objUserItem): ?>
                <tr>
                    <td><?= ($intUserKey + 1) ?></td>
                    <td>
                        <?= $this->Html->link($objUserItem->username, ['controller' => 'Users', 'action' => 'edit/' . $objUserItem->id]) ?>
                    </td>
                    <td><?= h($objUserItem->name) ?></td>
                    <td><?= h($objUserItem->login_date) ?></td>
                    <td>
                        <button type="button" class="btn btn-warning btn-circle">
                            <i class="fa fa-times"></i>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">ありませんでした</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
            </div>
        </div>
    </div>
</div>