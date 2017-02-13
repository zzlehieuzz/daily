<div id="title-header">Profile</div>

<div class="row">
    <div class="col-xs-12">
        <?= $this->Form->create($objUser, ['url' => ['action' => 'profile'], 'method' => 'post']); ?>
            <div class="form-group">
                <label>氏名</label>
                <?= $this->Form->input('name', [
                    'error' => FALSE,
                    'required' => FALSE,
                    'label' => FALSE,
                    'class' => 'form-control input-sm',
                    'placeholder' => '氏名',
                    'maxlength' => 20
                ]); ?>
            </div>
            <div class="form-group">
                <label>PW</label>
                <?= $this->Form->input('password', [
                    'error' => FALSE,
                    'required' => FALSE,
                    'label' => FALSE,
                    'class' => 'form-control input-sm',
                    'placeholder' => 'PW',
                    'maxlength' => 20
                ]); ?>
            </div>
            <div class="form-group">
                <label>PW Confirm</label>
                <?= $this->Form->input('password', [
                    'error' => FALSE,
                    'required' => FALSE,
                    'label' => FALSE,
                    'class' => 'form-control input-sm',
                    'placeholder' => 'PW',
                    'maxlength' => 20
                ]); ?>
            </div>

            <div class="form-group text-right">
                <button type="button" class="btn btn-primary btn-lg btn-create">
                    <?= __('保存')?>
                </button>
            </div>
        <?= $this->Form->end(); ?>
    </div>
</div>


