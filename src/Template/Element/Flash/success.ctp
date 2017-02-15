<div class="alert alert-success">
    <?php if (is_array($message)) : ?>
        <?php foreach ($message as $item) : ?>
            <div><strong><?= h($item) ?></strong></div>
        <?php endforeach; ?>
    <?php else: ?>
        <div><strong><?= h($message) ?></strong></div>
    <?php endif; ?>
</div>