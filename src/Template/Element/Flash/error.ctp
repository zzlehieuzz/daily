<div class="alert alert-danger">
    <?php if (is_array($message)) : ?>
        <?php foreach ($message as $item) : ?>
            <?php if (is_array($item)) : ?>
                <?php foreach ($item as $item2) : ?>
                    <?php if (is_array($item2)) : ?>
                        <?php foreach ($item2 as $item3) : ?>
                            <div onclick="this.classList.add('hidden');"><strong><?= h($item3) ?></strong></div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div onclick="this.classList.add('hidden');"><strong><?= h($item2) ?></strong></div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <div onclick="this.classList.add('hidden');"><strong><?= h($item) ?></strong></div>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php else: ?>
        <div onclick="this.classList.add('hidden');"><strong><?= h($message) ?></strong></div>
    <?php endif; ?>
</div>