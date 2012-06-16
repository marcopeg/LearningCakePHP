<div class="widget widget-table users index">
	<div class="widget-header">
		<h3><?php echo __('Users');?></h3>
	</div>
	<div class="widget-content">
		<table class="table table-striped table-bordered data-table">
		<thead>
		<tr>
				<th><?php echo $this->Paginator->sort('id');?></th>
				<th><?php echo $this->Paginator->sort('username');?></th>
				<th><?php echo $this->Paginator->sort('password');?></th>
				<th><?php echo $this->Paginator->sort('role');?></th>
				<th><?php echo $this->Paginator->sort('permissions');?></th>
				<th><?php echo $this->Paginator->sort('created');?></th>
				<th><?php echo $this->Paginator->sort('modified');?></th>
				<th class="actions"><?php echo __('Actions');?></th>
		</tr>
		</thead>
		<tbody>
		<?php
		foreach ($users as $user): ?>
		<tr>
			<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
			<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
			<td><?php echo h($user['User']['password']); ?>&nbsp;</td>
			<td><?php echo h($user['User']['role']); ?>&nbsp;</td>
			<td><?php echo h($user['User']['permissions']); ?>&nbsp;</td>
			<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
			<td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
		</tbody>
		</table>
		
		<!--
		<div class="pagination fg-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix">
			
			<div class="grid-12" style="background:red">
				<?php
			echo $this->Paginator->counter(array(
			'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
			));
			?>
			</div>
			
			<div class="grid-12" style="text-align:right;background:green">
			<?php
			echo $this->Paginator->prev( "&lt; " . __('previous'), array( 'escape'=>false ), null, array( 'tag'=>'a', 'class'=>'previous disabled'));
			
			echo $this->Paginator->numbers(array( 'separator'=>'', 'currentClass'=>'selected', 'currentLink'=>true ));
			
			echo $this->Paginator->next(__('next') . ' &gt;', array( 'escape'=>false ), null, array( 'tag'=>'a', 'class'=>'next disabled'));
			?>
			</div>
			
		</div>
		-->
	</div>
</div>


<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Replies'), array('controller' => 'replies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reply'), array('controller' => 'replies', 'action' => 'add')); ?> </li>
	</ul>
</div>


