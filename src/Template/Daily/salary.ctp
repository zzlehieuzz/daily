<?= $this->Html->script('daily/add.js') ?>
<?= $this->Html->script('daily/salary.js') ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <ul class="nav nav-pills btn-sm">
            <li>
                <a class="btn btn-default" href="<?= $this->Url->build('/daily/index') ?>">List</a>
            </li>
            <li>
                <a class="btn btn-default" href="<?= $this->Url->build('/daily/add') ?>">New</a>
            </li>
        </ul>
    </div>
    <?php if($arySalary && $objEntity): ?>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12">
                    <?= $this->Form->create($objEntity, ['url' => ['action' => 'salary/' . $dateYM], 'method' => 'post']); ?>
                    <div class="form-group">
                        <?= $this->Form->input('id', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'type' => 'select',
                            'div' => FALSE,
                            'class'=>'form-control',
                            'default' => isset($objEntity->id) ? $objEntity->id : '',
                            'options' => $arySalary,
                            'label' => FALSE]); ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('default_value', [
                            'type' => 'number',
                            'error' => FALSE,
                            'required' => FALSE,
                            'label' => FALSE,
                            'class' => 'form-control',
                            'placeholder' => 'Please enter default salary within 11 characters',
                            'maxlength' => 11]); ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('real_value', [
                            'type' => 'number',
                            'error' => FALSE,
                            'required' => FALSE,
                            'label' => FALSE,
                            'class' => 'form-control',
                            'placeholder' => 'Please enter salary within 11 characters',
                            'maxlength' => 11]); ?>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 text-right">
                            <button type="reset" class="btn btn-warning btn-sm btn-create">Reset</button>
                            <button type="submit" class="btn btn-primary btn-sm btn-create">Save</button>
                        </div>
                    </div>
                    <?= $this->Form->end(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<div id="hidden-url" class="display-none" load-url="<?= $this->Url->build('/daily/salary/'); ?>"></div>
