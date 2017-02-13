<div id="edituser">
    <div class="blk_contentbox">
        <?php if ($action === 'add'): ?>
            <?= $this->Form->create($objEntityUser, ['url' => ['action' => $action], 'method' => 'post']); ?>
        <?php else: ?>
            <?= $this->Form->create($objEntityUser, ['url' => ['action' => $action], 'method' => 'post']); ?>
        <?php endif; ?>
        <table class="table table-bordered">
            <tr>
                <th width="16%" scope="row">ID</th>
                <td width="84%">
                    <?php if ($action === 'edit') : ?>
                        <?= $objEntityUser->username; ?>
                        <?= $this->Form->input('id', ['type' => 'hidden']); ?>
                    <?php else : ?>
                        <?= $this->Form->input('username', ['label' => FALSE, 'class' => 'form-control input-sm', 'placeholder' => 'ID', 'maxlength' => 20]); ?>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th scope="row">PW</th>
                <td>
                    <?= $this->Form->input('password', [
                        'error' => FALSE,
                        'required' => FALSE,
                        'label' => FALSE,
                        'class' => 'form-control input-sm',
                        'placeholder' => 'PW',
                        'maxlength' => 20
                    ]); ?>
                </td>
            </tr>
            <tr>
                <th scope="row">氏名</th>
                <td>
                    <?= $this->Form->input('name', [
                        'error' => FALSE,
                        'required' => FALSE,
                        'label' => FALSE,
                        'class' => 'form-control input-sm',
                        'placeholder' => '氏名',
                        'maxlength' => 20
                    ]); ?>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    <?php if ($action === 'edit'): ?>
                        <button type="button" class="btn btn-default" onclick="checkToDelete(this);">削除</button>
                    <?php endif; ?>
                    <button type="submit" class="btn btn-info">保存</button>
                </td>
            </tr>
        </table>
        <?= $this->Form->end(); ?>
        <?php if ($action === 'edit'): ?>
            <?= $this->Form->create($objEntityUser, ['url' => ['action' => 'delete'], 'id' => 'form-delete', 'method' => 'post']); ?>
            <?= $this->Form->end(); ?>
        <?php endif; ?>
    </div>
</div>