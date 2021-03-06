<div class="col-xs-12">
    <?= $this->Form->create($objEntityUser, ['url' => ['action' => $action], 'class' => 'form-horizontal', 'method' => 'post']); ?>
        <div class="form-group">
            <?php if ($action === 'edit') : ?>
                <label class="col-sm-2 control-label">
                    <strong>Username</strong>
                </label>
                <label class="control-label text-left">
                    <strong>[ <?= $objEntityUser->username; ?> ]</strong>
                </label>
                <?= $this->Form->input('username', ['type' => 'hidden']); ?>
                <?= $this->Form->input('id', ['type' => 'hidden']); ?>
            <?php else : ?>
                <div class="col-sm-12">
                    <?= $this->Form->input('username', [
                        'label' => FALSE,
                        'required' => FALSE,
                        'error' => FALSE,
                        'class' => 'form-control',
                        'placeholder' => 'Please enter Username within 20 characters',
                        'maxlength' => 20]); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <?= $this->Form->input('name', [
                    'error' => FALSE,
                    'required' => FALSE,
                    'label' => FALSE,
                    'class' => 'form-control',
                    'placeholder' => 'Please enter name within 50 characters',
                    'maxlength' => 50
                ]); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <?= $this->Form->input('role', array(
                    'templates' => ['inputContainer' => '{{content}}'],
                    'type' => 'select',
                    'div' => FALSE,
                    'class'=>'form-control',
                    'options' => \App\Libs\Constant::$C_USER_ROLE,
                    'label' => FALSE)); ?>
            </div>
        </div>
        <?php if ($action === 'edit') : ?>
            <div class="form-group">
                <div class="col-sm-12">
                    <?= $this->Form->input('password', [
                        'error' => FALSE,
                        'required' => FALSE,
                        'label' => FALSE,
                        'class' => 'form-control',
                        'placeholder' => 'Please enter new PW within 20 characters',
                        'maxlength' => 20
                    ]); ?>
                </div>
            </div>
        <?php else : ?>
            <div class="form-group">
                <div class="col-sm-12">
                    <?= $this->Form->input('password', [
                        'error' => FALSE,
                        'required' => FALSE,
                        'label' => FALSE,
                        'class' => 'form-control',
                        'placeholder' => 'Please enter PW within 20 characters',
                        'maxlength' => 20
                    ]); ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="form-group">
            <div class="col-sm-12 text-right">
                <?php if ($action === 'edit'): ?>
                    <button type="button" class="btn btn-danger btn-sm" onclick="checkToDelete(this);">
                        <i class="fa fa-trash fa-lg"></i>
                    </button>
                <?php endif; ?>
                <button type="reset" class="btn btn-warning btn-sm btn-create">
                    <i class="fa fa-repeat fa-lg"></i>
                </button>
                <button type="submit" class="btn btn-primary btn-sm btn-create">
                    <i class="fa fa-save fa-lg"></i>
                </button>
            </div>
        </div>
    <?= $this->Form->end(); ?>
</div>