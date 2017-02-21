<?= $this->Html->script('users/index.js') ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <ul class="nav nav-pills btn-sm">
            <li>
                <a class="btn btn-primary" href="<?= $this->Url->build('/users/index') ?>">
                    <i class="fa fa-list fa-lg"></i>
                </a>
            </li>
            <li>
                <a class="btn btn-default" href="<?= $this->Url->build('/users/add') ?>">
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
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th width="25%">username</th>
                        <th>name</th>
                        <th width="25%">login</th>
                        <th width="5%" class="text-center">
                            <i class="fa fa-th-list"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($aryUser): ?>
                        <?php foreach ($aryUser as $intUserKey => $objUserItem): ?>
                            <tr>
                                <td>
                                    <?= $this->Html->link($objUserItem->username, ['controller' => 'Users', 'action' => 'edit/' . $objUserItem->id]) ?>
                                </td>
                                <td><?= h($objUserItem->name) ?></td>
                                <td><?= h($objUserItem->login_date) ?></td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-circle s-popup-del" func="delUser(<?= $objUserItem->id ?>)">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">No data</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="hidden-url" class="hidden" delete-url="<?= $this->Url->build('/users/delete/'); ?>"></div>