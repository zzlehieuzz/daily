<div id="title-header">List user</div>
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
                    <td>X</td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">ありませんでした</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>