<div class="replies index">
	<h2><?php echo __('Replies');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('post_id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('content');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($replies as $reply): ?>
	<tr>
		<td><?php echo h($reply['Reply']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($reply['Post']['title'], array('controller' => 'posts', 'action' => 'view', $reply['Post']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($reply['User']['username'], array('controller' => 'users', 'action' => 'view', $reply['User']['id'])); ?>
		</td>
		<td><?php echo h($reply['Reply']['content']); ?>&nbsp;</td>
		<td><?php echo h($reply['Reply']['created']); ?>&nbsp;</td>
		<td><?php echo h($reply['Reply']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $reply['Reply']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $reply['Reply']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $reply['Reply']['id']), null, __('Are you sure you want to delete # %s?', $reply['Reply']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Reply'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
