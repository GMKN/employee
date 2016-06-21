<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Department'), array('action' => 'edit', $department['Department']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Department'), array('action' => 'delete', $department['Department']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $department['Department']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Departments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('action' => 'add')); ?> </li>
	</ul>
</div>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Department</h3>
	</div>
	<div class="panel-body">
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($department['Department']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Name'); ?></dt>
			<dd>
				<?php echo h($department['Department']['name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Office Phone'); ?></dt>
			<dd>
				<?php echo h($department['Department']['office_phone']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Manager'); ?></dt>
			<dd>
				<?php echo h($department['Department']['employee_id']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
</div>
