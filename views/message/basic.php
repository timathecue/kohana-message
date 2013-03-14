<ul class="<?php echo $message->type; ?>">
<?php if (is_array($message->message)): ?>
	<?php foreach ($message->message as $value): ?>
	<li><?php echo $value; ?></li>
	<?php endforeach; ?>
<?php else: ?>
	<li><?php echo $message->message; ?></li>
<?php endif; ?>
</ul>