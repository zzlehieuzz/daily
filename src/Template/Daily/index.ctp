<div class="row">
    <?php if ($aryData): ?>
        <?php foreach ($aryData as $strDataKey => $objDataItem): ?>
            <div class="col-lg-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse_<?= $strDataKey ?>">
                            <?= $strDataKey ?>
                        </a>
                    </div>
                    <div id="collapse_<?= $strDataKey ?>" class="panel-body collapse in">
                        <?php $intAmount = 0; ?>
                        <?php foreach ($aryCategory as $aryCategoryKey => $aryCategoryItem): ?>
                            <div class="col-xs-7 text-right"><?= $aryCategoryItem ?></div>
                            <div class="col-xs-5 text-left">
                                <?php if (isset($objDataItem[$aryCategoryKey])): ?>
                                    <?= $this->Number->format($objDataItem[$aryCategoryKey], [
                                        'places' => 0,
                                        'before' => '¥ ',
                                        'escape' => false,
                                        'decimals' => '.',
                                        'thousands' => ','
                                    ]) ?>
                                    <?php $intAmount += $objDataItem[$aryCategoryKey]; ?>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                        <div class="col-xs-7 text-right"><strong>Total</strong></div>
                        <div class="col-xs-5 text-left">
                            <strong>
                                <?= $this->Number->format($intAmount, [
                                    'places' => 0,
                                    'before' => '¥ ',
                                    'escape' => false,
                                    'decimals' => '.',
                                    'thousands' => ','
                                ]) ?>
                            </strong>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a href="<?= $this->Url->build('/daily/edit/' . urlencode($strDataKey)); ?>">
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <span class="pull-left">View Details</span>
                            <div class="clearfix"></div>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
