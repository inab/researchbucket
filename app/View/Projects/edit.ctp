<div class="projects form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Edit Project'); ?></h1>
			</div>
		</div>
	</div>



	<div class="row">
		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">

										<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete'), array('action' => 'delete', $this->Form->value('Project.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Project.id'))); ?></li>
										<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Projects'), array('action' => 'index'), array('escape' => false)); ?></li>
								</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Project', array('role' => 'form','type' => 'file')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('tagline', array('class' => 'form-control', 'placeholder' => 'Tagline'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('short_description', array('class' => 'form-control', 'placeholder' => 'Short Description'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('years', array('class' => 'form-control', 'placeholder' => 'Duration of the project'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('current_year', array('class' => 'form-control', 'placeholder' => 'Current year'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('description', array('class' => 'form-control', 'placeholder' => 'Description'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('logo', array('class' => 'form-control', 'placeholder' => 'Logo'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Project.image', array('type' => 'file','class' => 'form-control'));?>
				    <?php echo $this->Form->input('Project.image_dir', array('type' => 'hidden')); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('youtube', array('class' => 'form-control', 'placeholder' => 'Youtube Video ID'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
