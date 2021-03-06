<?php use App\Libs\Constant; ?>

<?= $this->assign('title', __('Sign in') . ' ' . Constant::C_TITLE ); ?>

<div class="login-panel panel panel-default">
    <div class="panel-heading">
        <h3><?= sprintf(__('Sign in to'), Constant::C_TITLE) ?></h3>
    </div>
    <div class="panel-body">
        <?= $this->Flash->render('success') ?>
        <?= $this->Flash->render('error') ?>
        <?= $this->Form->create() ?>
            <fieldset>
                <div class="form-group">
                    <input type="text" class="form-control" id="InputEmail" name="username" placeholder="<?= __('Nickname') ?>" maxlength="20">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="InputPassword" name="password" placeholder="<?= __('Password') ?>" maxlength="20">
                </div>
                <button type="submit" class="btn btn-lg btn-success btn-block"><?= __('Login') ?></button>
            </fieldset>
        <?= $this->Form->end() ?>
    </div>
</div>
