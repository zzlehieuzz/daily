<div class="panel panel-default">
    <div class="panel-heading">
        <ul class="nav nav-pills btn-sm">
            <li>
                <a class="btn btn-primary" href="<?= $this->Url->build('/admin/profile') ?>">
                    <i class="fa fa-user-md fa-lg"></i>
                </a>
            </li>
            <li>
                <a class="btn btn-default" href="<?= $this->Url->build('/users/index') ?>">
                    <i class="fa fa-list fa-lg"></i>
                </a>
            </li>
            <li>
                <a class="btn btn-default" href="<?= $this->Url->build('/auth/logout') ?>">
                    <i class="fa fa-sign-out fa-lg"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12">
                <?= $this->Form->create($objEntity, ['url' => ['action' => 'profile'], 'class' => 'form-horizontal', 'method' => 'post']); ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">
                        <strong>Username</strong>
                    </label>
                    <label class="control-label text-left">
                        <strong>[ <?= $objEntity->username; ?> ]</strong>
                    </label>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <?= $this->Form->input('name', [
                            'error' => FALSE,
                            'required' => FALSE,
                            'label' => FALSE,
                            'class' => 'form-control',
                            'placeholder' => 'Please enter Name within 50 characters',
                            'maxlength' => 50
                        ]); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <?= $this->Form->input('password', [
                            'error' => FALSE,
                            'required' => FALSE,
                            'label' => FALSE,
                            'class' => 'form-control',
                            'placeholder' => 'New PW',
                            'maxlength' => 20
                        ]); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 text-right">
                        <button type="reset" class="btn btn-warning btn-sm btn-create">
                            <i class="fa fa-repeat fa-lg"></i>
                        </button>
                        <button type="submit" class="btn btn-primary btn-sm btn-create">
                            <i class="fa fa-save fa-lg"></i>
                        </button>
                    </div>
                </div>
                <?= $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
