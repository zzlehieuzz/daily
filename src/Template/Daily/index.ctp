<div class="panel panel-default">
    <div class="panel-heading">
        <ul class="nav nav-pills btn-sm">
            <li>
                <a class="btn btn-primary" href="<?= $this->Url->build('/daily/index') ?>">List</a>
            </li>
            <li>
                <a class="btn btn-default" href="<?= $this->Url->build('/daily/add') ?>">New</a>
            </li>
            <li>
                <a class="btn btn-default" href="<?= $this->Url->build('/daily/salary') ?>">Salary</a>
            </li>
        </ul>
    </div>
    <div class="panel-body">
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
                            <div id="collapse_<?= $strDataKey ?>" class="panel-body collapse in" style="min-height: 180px">
                                <?php $intAmount = 0; ?>
                                <?php foreach ($aryCategory as $aryCategoryKey => $aryCategoryItem): ?>
                                    <?php if (isset($objDataItem[$aryCategoryKey])): ?>
                                        <div class="col-xs-7 text-right">
                                            <a href="<?= $this->Url->build('/daily/edit/' . urlencode($strDataKey) . '/' . urlencode($aryCategoryKey)); ?>">
                                                <?= $aryCategoryItem ?>
                                            </a>
                                        </div>
                                        <div class="col-xs-5 text-left">
                                            <?= $this->Number->format($objDataItem[$aryCategoryKey], [
                                                'places' => 0,
                                                'before' => \App\Libs\Constant::$C_USER_CURRENCY[$user['currency']] . ' ',
                                                'escape' => false,
                                                'decimals' => '.',
                                                'thousands' => ','
                                            ]) ?>
                                            <?php $intAmount += $objDataItem[$aryCategoryKey]; ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php if(isset($arySalary[$strDataKey]) && ($aryValue = $arySalary[$strDataKey])): ?>

                                    <div class="col-xs-7 text-right">
                                        <strong><i>[ D ]</i>
                                            <?= $this->Number->format($arySalary[$strDataKey]['default_value'], [
                                                'places' => 0,
                                                'before' => '',
                                                'escape' => false,
                                                'decimals' => '.',
                                                'thousands' => ','
                                            ]) ?>
                                        </strong>-
                                        <strong>
                                            <?= $this->Number->format($intAmount, [
                                                'places' => 0,
                                                'before' => '',
                                                'escape' => false,
                                                'decimals' => '.',
                                                'thousands' => ','
                                            ]) ?>
                                        </strong>
                                    </div>
                                    <div class="col-xs-5 text-left">
                                        <strong>
                                            <?= $this->Number->format(($arySalary[$strDataKey]['default_value'] - $intAmount), [
                                                'places' => 0,
                                                'before' => \App\Libs\Constant::$C_USER_CURRENCY[$user['currency']] . ' ',
                                                'escape' => false,
                                                'decimals' => '.',
                                                'thousands' => ','
                                            ]) ?>
                                        </strong>
                                    </div>

                                    <div class="col-xs-7 text-right">
                                        <strong><i>[ R ]</i>
                                            <?= $this->Number->format($arySalary[$strDataKey]['real_value'], [
                                                'places' => 0,
                                                'before' => '',
                                                'escape' => false,
                                                'decimals' => '.',
                                                'thousands' => ','
                                            ]) ?>
                                        </strong>-
                                        <strong>
                                            <?= $this->Number->format($intAmount, [
                                                'places' => 0,
                                                'before' => '',
                                                'escape' => false,
                                                'decimals' => '.',
                                                'thousands' => ','
                                            ]) ?>
                                        </strong>
                                    </div>
                                    <div class="col-xs-5 text-left">
                                        <strong>
                                            <?= $this->Number->format(($aryValue['real_value'] - $intAmount), [
                                                'places' => 0,
                                                'before' => \App\Libs\Constant::$C_USER_CURRENCY[$user['currency']] . ' ',
                                                'escape' => false,
                                                'decimals' => '.',
                                                'thousands' => ','
                                            ]) ?>
                                        </strong>
                                    </div>
                                <?php endif; ?>
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
    </div>
</div>
