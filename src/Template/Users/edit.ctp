<div class="panel panel-default">
    <div class="panel-heading">
        <h3>Edit user</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <?= $this->element('../Users/_form', ['action' => 'edit', 'objEntityUser' => $objEntityUser]); ?>
        </div>
    </div>
</div>
