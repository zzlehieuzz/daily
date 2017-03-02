<!DOCTYPE html>
<html lang="ja">
    <head>
        <title><?= $this->fetch('title'); ?></title>

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
        <div id="process-content" class="modal fade" data-backdrop="static" data-keyboard="false" role="dialog"></div>
    </body>
</html>
