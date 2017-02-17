<?= $this->Html->script('daily/add.js') ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <ul class="nav nav-pills btn-sm">
            <li>
                <a class="btn btn-default" href="<?= $this->Url->build('/daily/index') ?>">List</a>
            </li>
            <li>
                <a class="btn btn-primary" href="<?= $this->Url->build('/daily/add') ?>">New</a>
            </li>
            <li>
                <a class="btn btn-default" href="<?= $this->Url->build('/daily/salary') ?>">Salary</a>
            </li>
        </ul>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12">
                <?= $this->Form->create($objEntity, ['url' => ['action' => 'add'], 'method' => 'post']); ?>
                <div class="form-group">
                    <?= $this->Form->input('category_id', array(
                        'templates' => ['inputContainer' => '{{content}}'],
                        'type' => 'select',
                        'div' => FALSE,
                        'class'=>'form-control',
                        'options' => $aryCategory,
                        'label' => FALSE)); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('date_process', [
                        'error' => FALSE,
                        'required' => FALSE,
                        'label' => FALSE,
                        'class' => 'form-control',
                        'placeholder' => 'Please enter date within 10 characters',
                        'maxlength' => 10]); ?>
                </div>

                <div class="form-group">
                    <?= $this->Form->input('amount', [
                        'type' => 'number',
                        'error' => FALSE,
                        'required' => FALSE,
                        'label' => FALSE,
                        'class' => 'form-control',
                        'placeholder' => 'Please enter amount within 11 characters',
                        'maxlength' => 11]); ?>
                </div>

                <div class="form-group">
                    <?= $this->Form->input('description', [
                        'type' => 'textarea',
                        'rows' => 3,
                        'escape' => false,
                        'error' => FALSE,
                        'required' => FALSE,
                        'label' => FALSE,
                        'class' => 'form-control',
                        'placeholder' => 'Please enter description within 200 characters',
                        'maxlength' => 200]); ?>
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
</div>
