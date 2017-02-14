<?= $this->Html->script('daily/edit.js') ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3>Edit daily</h3>
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
                            <button type="button" class="btn btn-danger btn-sm" onclick="checkToDelete(this);">Remove</button>
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        </div>
                    </div>
                <?= $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th width="25%">date</th>
            <th>category</th>
            <th>amount</th>
        </tr>
    </thead>
    <tbody>
        <?php if($aryData): ?>
            <?php foreach ($aryData as $aryDataKey => $aryDataItem): ?>
                <tr class="daily-row" row-id="<?= $aryDataItem->id ?>">
                    <td><?= h($aryDataItem->date_process) ?></td>
                    <td align="right"><?= $aryCategory[$aryDataItem->category_id] ?></td>
                    <td>
                        <?= $this->Number->format($aryDataItem->amount, [
                            'places' => 0,
                            'before' => '¥ ',
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
    process-edit-url="<?= $this->Url->build('/daily/processEdit'); ?>"
></div>