<div class="alert alert-<?php echo $message->type; ?>">
	<?php if (is_array($message->message)): ?>
	<ul>
		<?php foreach ($message->message as $value): ?>
		<li><?php echo $value; ?></li>
		<?php endforeach; ?>
	</ul>
	<?php else: ?>
		<?php echo $message->message; ?>
	<?php endif; ?>
</div>