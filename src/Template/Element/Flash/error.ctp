<div class="alert alert-danger">
	<?php if (is_array($message)) : ?>
		<?php foreach ($message as $item) : ?>
			<?php if (is_array($item)) : ?>
				<?php foreach ($item as $item2) : ?>
					<?php if (is_array($item2)) : ?>
						<?php foreach ($item2 as $item3) : ?>
							<div><?= h($item3) ?></div>
						<?php endforeach; ?>
					<?php else: ?>
						<div><?= h($item2) ?></div>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php else: ?>
				<div><?= h($item) ?></div>
			<?php endif; ?>
		<?php endforeach; ?>
	<?php else: ?>
		<div><?= h($message) ?></div>
	<?php endif; ?>
</div>