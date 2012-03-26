<div class="replies view">
<h2><?php  echo __('Reply');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($reply['Reply']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Post'); ?></dt>
		<dd>
			<?php echo $this->Html->link($reply['Post']['title'], array('controller' => 'posts', 'action' => 'view', $reply['Post']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($reply['User']['username'], array('controller' => 'users', 'action' => 'view', $reply['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($reply['Reply']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($reply['Reply']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($reply['Reply']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Reply'), array('action' => 'edit', $reply['Reply']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Reply'), array('action' => 'delete', $reply['Reply']['id']), null, __('Are you sure you want to delete # %s?', $reply['Reply']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Replies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reply'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
