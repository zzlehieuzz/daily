<?= $this->Html->script('daily/add.js') ?>
<?= $this->Html->script('daily/edit.js') ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <ul class="nav nav-pills btn-sm">
            <li>
                <a class="btn btn-default" href="<?= $this->Url->build('/daily/index') ?>">
                    <i class="fa fa-list fa-lg"></i>
                </a>
            </li>
            <li>
                <a class="btn btn-default" href="<?= $this->Url->build('/daily/add') ?>">
                    <i class="fa fa-plus-square fa-lg"></i>
                </a>
            </li>
            <li>
                <a class="btn btn-primary" href="<?= $this->Url->build("/daily/edit/$strDateYM/$intCategory") ?>">
                    <i class="fa fa-pencil fa-lg"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12">
                <?= $this->Form->create($objEntity, ['url' => ['action' => 'edit/'.$strDateYM], 'id' => 'edit-daily', 'method' => 'post']); ?>
                    <?= $this->Form->input('id', [
                        'type' => 'hidden',
                        'error' => FALSE,
                        'required' => FALSE,
                        'value' => isset($objEntity->id) ? $objEntity->id : '',
                        'label' => FALSE]); ?>
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
                            'rows' => 2,
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
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-save fa-lg"></i>
                            </button>
                        </div>
                    </div>
                <?= $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th width="85">
                <button type="button" id="daily-load" class="btn btn-success btn-circle">
                    <i class="fa fa-link"></i>
                </button>
                <button type="button" id="daily-delete" class="btn btn-danger btn-circle">
                    <i class="fa fa-trash"></i>
                </button>
            </th>
            <th>category</th>
            <th>amount</th>
        </tr>
    </thead>
    <tbody>
        <?php if($aryData): ?>
            <?php $intAmount = array_sum(array_map(function($item) {
                return $item['amount'];
            }, $aryData)); ?>
            <tr class="alert alert-danger">
                <td align="right" colspan="2"><strong>Total</strong></td>
                <td colspan="1">
                    <strong>
                        <?= $this->Number->format($intAmount, [
                            'places' => 0,
                            'before' => \App\Libs\Constant::$C_USER_CURRENCY[$user['currency']] . ' ',
                            'escape' => false,
                            'decimals' => '.',
                            'thousands' => ','
                        ]) ?>
                    </strong>
                </td>
            </tr>
            <?php foreach ($aryData as $aryDataKey => $aryDataItem): ?>
                <tr class="daily-row" row-id="<?= $aryDataItem->id ?>">
                    <td><?= h($aryDataItem->date_process) ?></td>
                    <td align="right"><?= $aryCategory[$aryDataItem->category_id] ?></td>
                    <td>
                        <?= $this->Number->format($aryDataItem->amount, [
                            'places' => 0,
                            'before' => \App\Libs\Constant::$C_USER_CURRENCY[$user['currency']] . ' ',
                            'escape' => false,
                            'decimals' => '.',
                            'thousands' => ','
                        ]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">No data</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<div id="url" class="display-none"
    load-url="<?= $this->Url->build('/daily/loadToEdit'); ?>"
    delete-url="<?= $this->Url->build('/daily/delete'); ?>"
></div>