<?php use App\Libs\Constant; ?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title><?= Constant::C_TITLE ?></title>

        <?= $this->element('_meta'); ?>
        <?= $this->element('_css_script'); ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>
        </div>
    </div>
    </body>
</html>
