<?= $this->Html->script('daily/add.js') ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <ul class="nav nav-pills btn-sm">
            <li>
                <a class="btn btn-default" href="<?= $this->Url->build('/daily/index') ?>">Daily</a>
            </li>
            <li>
                <a class="btn btn-default" href="<?= $this->Url->build('/auth/logout') ?>">New</a>
            </li>
            <li>
                <a class="btn btn-primary" href="<?= $this->Url->build('/daily/salary') ?>">Salary</a>
            </li>
        </ul>
    </div>
    <?php if($arySalary): ?>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12">
                    <?= $this->Form->create($objEntity, ['url' => ['action' => 'salary'], 'method' => 'post']); ?>
                    <div class="form-group">
                        <?= $this->Form->input('id', array(
                            'templates' => ['inputContainer' => '{{content}}'],
                            'type' => 'select',
                            'div' => FALSE,
                            'class'=>'form-control',
                            'options' => $arySalary,
                            'label' => FALSE)); ?>
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
