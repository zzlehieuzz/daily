<div class="alert alert-success">
	<?php if (is_array($message)) : ?>
		<?php foreach ($message as $item) : ?>
			<div><?= h($item) ?></div>
		<?php endforeach; ?>
	<?php else: ?>
		<div><?= h($message) ?></div>
	<?php endif; ?>
</div>