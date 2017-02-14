<div class="panel panel-default">
    <div class="panel-heading">
        <h3>Add user</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <?= $this->element('../Users/_form', ['action' => 'add', 'objEntityUser' => $objEntityUser]); ?>
        </div>
    </div>
</div>
