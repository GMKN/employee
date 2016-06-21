<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Departments'), array('action' => 'index')); ?></li>
	</ul>
</div>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Add Department</h3>
	</div>
	<div class="panel-body">
		<?php echo $this->Form->create('Department'); ?>
			<fieldset>
				<legend><?php echo __('Add Department'); ?></legend>
			<?php
				echo $this->Form->input('name');
				echo $this->Form->input('office_phone');
				echo $this->Form->input('employee_id');
			?>
			</fieldset>
		<?php echo $this->Form->end(__('Submit')); ?>
	</div>
</div>
